<?php

namespace App\Http\Controllers;

use App\Models\BantinXuatBan;
use App\Models\LoaiTin;
use App\Models\ChuyenMuc;
use App\Models\Comment;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\Html;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BantinXuatBanController extends Controller
{
    public function show($MaBT_XB)
    {
        $bantins = BantinXuatBan::with(['comments.user', 'loaiTin.chuyenMuc'])->findOrFail($MaBT_XB);
        $bantins->LuotXem++;
        $bantins->save();
        $currentChuyenMuc = $bantins->loaiTin->chuyenMuc;
        $comments = $bantins->comments()
                    ->where('TrangThai', 'Đã Kiểm Duyệt')
                    ->orderBy('created_at', 'desc')
                    ->paginate(5);
        $loaitin = LoaiTin::all(); 
        $relatedBantins = BantinXuatBan::with('loaiTin')
            ->where('LoaiBT_XB', $bantins->LoaiBT_XB)
            ->where('MaBT_XB', '!=', $bantins->MaBT_XB)
            ->inRandomOrder()
            ->take(3)
            ->get();
        if ($relatedBantins->count() < 3) {
            $additionalBantins = BantinXuatBan::with('loaiTin')
                ->where('MaBT_XB', '!=', $bantins->MaBT_XB)
                ->where('LoaiBT_XB', $bantins->LoaiBT_XB)
                ->orWhereHas('loaiTin', function($query) use ($currentChuyenMuc) {
                    $query->where('MaCM_LT', $currentChuyenMuc->MaCM);
                })
                ->inRandomOrder()
                ->take(3 - $relatedBantins->count())
                ->get();
            $relatedBantins = $relatedBantins->merge($additionalBantins);
        }
        if ($relatedBantins->count() < 3) {
            $additionalBantins = BantinXuatBan::with('loaiTin')
                ->where('MaBT_XB', '!=', $bantins->MaBT_XB)
                ->orderByRaw('RAND()')
                ->take(3 - $relatedBantins->count())
                ->get();
            $relatedBantins = $relatedBantins->merge($additionalBantins);
        }
        return view('bantin.show', compact('bantins', 'comments', 'loaitin', 'relatedBantins', 'currentChuyenMuc')); 
    }
    public function theoDoiXB()
    {
        $bantins = BantinXuatBan::with('loaiTin')->orderBy('NgayXuatBan', 'desc')->get();
        return view('quanly.kiemduyet.theodoi', compact('bantins'));
    }
    public function xuatBanWord($MaBT_XB)
    {
        set_time_limit(300);
        $bantin = BantinXuatBan::with('loaiTin')->findOrFail($MaBT_XB);
        $html_content = $this->xuLyAnh($bantin->NoiDungBT_XB);
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        $section->addTitle(htmlspecialchars($bantin->TieuDeBT_XB), 1);
        $ngayXuatBanFormatted = Carbon::parse($bantin->NgayXuatBan)->format('d/m/Y');
        $section->addText('Ngày xuất bản: ' . htmlspecialchars($ngayXuatBanFormatted));
        if ($bantin->loaiTin) {
            $section->addText('Loại tin: ' . htmlspecialchars($bantin->loaiTin->chuyenMuc->TenCM) . ' - ' . htmlspecialchars($bantin->loaiTin->TenLT));
        }
        if ($bantin->AnhDaiDien_XB) {
            $imagePath = public_path($bantin->AnhDaiDien_XB);
            if (file_exists($imagePath) && is_readable($imagePath)) {
                [$rongGoc, $daiGoc] = getimagesize($imagePath);
                $rongMoi = 500;
                $daiMoi = ($daiGoc / $rongGoc) * $rongMoi;
                $section->addImage($imagePath, [
                    'width' => $rongMoi,
                    'height' => $daiMoi,
                    'wrappingStyle' => 'inline',
                ]);
            }
        }
        Html::addHtml($section, $html_content);
        $section->addTextBreak(2);
        $section->addTitle('Thông tin tác giả', 2);
        if ($bantin->TenPhongVien_XB) {
            $section->addText('Phóng viên: ' . htmlspecialchars($bantin->TenPhongVien_XB));
        }
        if ($bantin->TenBienTapVien_XB) {
            $section->addText('Biên tập viên: ' . htmlspecialchars($bantin->TenBienTapVien_XB));
        }
        if ($bantin->TenKiemDuyetVien) {
            $section->addText('Kiểm duyệt viên: ' . htmlspecialchars($bantin->TenKiemDuyetVien));
        }
        $fileName = 'bantin_' . $bantin->MaBT_XB . '.docx';
        $temp_file = tempnam(sys_get_temp_dir(), 'bantin_') . '.docx';
        $phpWord->save($temp_file, 'Word2007');
        if (file_exists($temp_file)) {
            return Response::download($temp_file, $fileName)->deleteFileAfterSend(true);
        } else {
            return response()->json(['error' => 'Không thể tạo file'], 500);
        }
    }
    private function xuLyAnh($html)
    {
        return preg_replace_callback(
            '/<img[^>]+src=["\'](.*?)["\'][^>]*>/is',
            function ($matches) {
                $imageUrl = $matches[1];
                $localPath = public_path(parse_url($imageUrl, PHP_URL_PATH));
                if (file_exists($localPath) && is_readable($localPath)) {
                    [$rongGoc, $daiGoc] = getimagesize($localPath);
                    $rongMoi = 500;
                    $daiMoi = ($daiGoc / $rongGoc) * $rongMoi;
                    return '<img src="' . $localPath . '" width="' . $rongMoi . '" height="' . $daiMoi . '" />';
                } else {
                    return '<p>Không thể tải ảnh.</p>';
                }
            },
            $html
        );
    }
    public function showByLoaiTin($MaLT)
    {
        $bantins = BantinXuatBan::with('loaiTin')
            ->where('LoaiBT_XB', $MaLT)
            ->orderBy('NgayXuatBan', 'desc')
            ->paginate(5);
        $loaitin = LoaiTin::all();
        $currentLoaiTin = LoaiTin::findOrFail($MaLT);
        $currentChuyenMuc = $currentLoaiTin->chuyenMuc;

        return view('bantin.index', compact('bantins', 'loaitin', 'currentLoaiTin', 'currentChuyenMuc'));
    }
    public function search(Request $request)
    {
        $query = $request->input('q');
        $bantins = BantinXuatBan::where('TieuDeBT_XB', 'LIKE', "%{$query}%")
            ->take(5)
            ->get(['MaBT_XB', 'TieuDeBT_XB']);
        $totalCount = BantinXuatBan::where('TieuDeBT_XB', 'LIKE', "%{$query}%")->count();
        return response()->json([
            'bantins' => $bantins,
            'totalCount' => $totalCount,
        ]);
    }
    public function postToFacebook($MaBT_XB)
    {
        $bantin = BantinXuatBan::findOrFail($MaBT_XB);
        $accessToken = env('FACEBOOK_ACCESS_TOKEN');
        $pageId = env('FACEBOOK_PAGE_ID');
        $htmlContent = $bantin->NoiDungBT_XB;
        $textContent = $this->locFigure($htmlContent);
        $detailUrl = route('bantin.show', ['MaBT_XB' => $MaBT_XB]);
        $message = "{$bantin->TieuDeBT_XB}\n\n{$textContent}\n\nXem chi tiết bản tin: {$detailUrl}";
        $postData = [
            'message' => $message,
            'access_token' => $accessToken,
        ];
        $response = Http::post("https://graph.facebook.com/{$pageId}/feed", $postData);
        if ($response->successful()) {
            return back()->with('success', 'Bản tin đã được đăng lên Facebook!');
        } else {
            $error = $response->json('error.message') ?? 'Lỗi không xác định';
            return back()->with('error', "Không thể đăng bản tin. Lỗi: {$error}");
        }
    }
    private function locFigure($htmlContent)
    {
        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML('<?xml encoding="UTF-8">' . $htmlContent);
        libxml_clear_errors();
        $figures = $dom->getElementsByTagName('figure');
        while ($figures->length > 0) {
            $figures->item(0)->parentNode->removeChild($figures->item(0));
        }
        return trim($dom->textContent);
    }
    public function showbyChuyenMuc($MaCM)
    {
    $chuyenMuc = ChuyenMuc::with('loaiTin')->findOrFail($MaCM);
        $bantins = BantinXuatBan::with('loaiTin')
            ->whereHas('loaiTin', function($query) use ($MaCM) {
                $query->where('MaCM_LT', $MaCM); 
            })
            ->orderBy('NgayXuatBan', 'desc')
            ->paginate(5);
        $currentChuyenMuc = $chuyenMuc;
        return view('chuyenmuc.show', compact('chuyenMuc', 'bantins', 'currentChuyenMuc')); 
    }
    public function searchPage(Request $request)
    {
        $query = $request->input('q');
        $bantins = BantinXuatBan::query();
        if ($query) {
            $bantins = $bantins->where('TieuDeBT_XB', 'LIKE', "%{$query}%")
                ->orderBy('NgayXuatBan', 'desc')
                ->paginate(5);
        } else {
            $bantins = $bantins->paginate(5);
        }
        return view('search', compact('bantins', 'query'));
    }
    public function thongKe()
    {
        if (Auth::user()->Quyen === 'Admin' || Auth::user()->Quyen === 'Độc Giả') {
            return redirect()->route('login')->withErrors(['msg' => 'Bạn không có quyền truy cập.']);
        }
        $bantins = BantinXuatBan::with('comments')->orderBy('NgayXuatBan')->get();
        $data = [];
        $totalViews = 0;
        $totalComments = 0;
        $startDate = Carbon::parse($bantins->first()->NgayXuatBan)->startOfDay();
        $endDate = Carbon::now()->endOfDay();
        $dateRange = [];
        for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
            $dateRange[] = $date->format('Y-m-d');
        }
        foreach ($bantins as $bantin) {
            $date = Carbon::parse($bantin->NgayXuatBan)->format('Y-m-d');
            $views = $bantin->LuotXem;
            $commentsCount = $bantin->comments->count();
            $totalViews += $views;
            $totalComments += $commentsCount;
            if (isset($data[$date])) {
                $data[$date]['views'] += $views;
                $data[$date]['comments'] += $commentsCount;
            } else {
                $data[$date] = [
                    'date' => $date,
                    'views' => $views,
                    'comments' => $commentsCount,
                ];
            }
        }
        foreach ($dateRange as $date) {
            if (!isset($data[$date])) {
                $data[$date] = [
                    'date' => $date,
                    'views' => 0,
                    'comments' => 0,
                ];
            }
        }
        $chartData = array_values($data);
        return view('quanly.thongke.dashboard', compact('chartData', 'totalViews', 'totalComments'));
    }
}
