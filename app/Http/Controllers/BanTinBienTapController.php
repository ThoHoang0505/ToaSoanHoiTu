<?php
namespace App\Http\Controllers;

use App\Models\BanTinBienTap;
use App\Models\BanTinHienTruong;
use App\Models\LoaiTin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BanTinBienTapController extends Controller
{
    public function edit($id)
    {
        $bantin = BanTinHienTruong::findOrFail($id);
        $loaitins = LoaiTin::with('chuyenMuc')->get()->groupBy('MaCM_LT');
        return view('quanly.bientap.edit', compact('bantin', 'loaitins'));
    }
    public function update(Request $request, $id)
    {
        $bantinHT = BanTinHienTruong::find($id);
        if (!$bantinHT) {
            return redirect()->back()->with('error', 'Bản tin không tồn tại.');
        }
        $bantinBienTap = new BanTinBienTap();
        $bantinBienTap->TieuDeBT_BT = $request->TieuDeBT_BT;
        $bantinBienTap->LoaiBT_BT = $request->LoaiBT_BT;
        $bantinBienTap->NoiDungBT_BT = $request->NoiDungBT_BT;
        if ($request->hasFile('AnhDaiDien_BT')) {
            $file = $request->file('AnhDaiDien_BT');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/thumbnail'), $filename);
            $bantinBienTap->AnhDaiDien_BT = 'images/thumbnail/' . $filename;
        } else {
            $bantinBienTap->AnhDaiDien_BT = $bantinHT->AnhDaiDien_HT;
        }
        $bantinBienTap->TenPhongVien = $bantinHT->TenPhongVien;
        $bantinBienTap->TenBienTapVien = Auth::user()->nhanvien->TenNV;
        $bantinBienTap->MaNV_BTV = Auth::user()->nhanvien->MaNV;
        $bantinBienTap->MaBTHT = $bantinHT->MaBT_HT;
        $bantinBienTap->TrangThai = 'Chờ Kiểm Duyệt';
        $bantinBienTap->PhienBan = 1;
        $bantinBienTap->NgayBienTap = now();
        $bantinBienTap->save();
        $bantinHT->TrangThai = 'Đang Biên Tập';
        $bantinHT->save();
        return redirect()->route('quanly.bantin.kho')->with('success', 'Biên tập bản tin thành công.');
    }    
    public function index()
    {
        $userId = Auth::user()->nhanvien->MaNV;
        $banTinBT = BanTinBienTap::where('MaNV_BTV', $userId)
            ->orderBy('NgayBienTap', 'desc')
            ->get();
        return view('quanly.bientap.bantin_cua_ban', compact('banTinBT'));
    }
    public function editBanTinBienTap($id)
    {
        $bantin = BanTinBienTap::findOrFail($id);
        $loaitins = LoaiTin::with('chuyenMuc')->get()->groupBy('MaCM_LT');
        return view('quanly.bientap.edit_bientap', compact('bantin', 'loaitins'));
    }
    public function updateBantinBienTap(Request $request, $id)
    {
        $bantinBienTap = BanTinBienTap::findOrFail($id);
        $bantinBienTap->TieuDeBT_BT = $request->TieuDeBT_BT;
        $bantinBienTap->LoaiBT_BT = $request->LoaiBT_BT;
        $bantinBienTap->NoiDungBT_BT = $request->NoiDungBT_BT;
        if ($request->hasFile('AnhDaiDien_BT')) {
            $file = $request->file('AnhDaiDien_BT');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/thumbnail'), $filename);
            $bantinBienTap->AnhDaiDien_BT = 'images/thumbnail/' . $filename;
        }
        $bantinBienTap->PhienBan += 1;
        $bantinBienTap->TrangThai = 'Chờ Kiểm Duyệt';
        $bantinBienTap->NgayBienTap = now();
        $bantinBienTap->save();
        return redirect()->route('bientap.index')->with('success', 'Bản tin đã được biên tập lại thành công.');
    }
}

