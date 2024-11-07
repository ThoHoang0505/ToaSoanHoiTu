<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BanTinBienTap;
use App\Models\BantinXuatBan;
use App\Models\BanTinHienTruong;
use App\Models\LoaiTin;
use Illuminate\Support\Facades\Auth;

class KiemDuyetController extends Controller
{
    public function index()
    {
        $bantinChoKiemDuyet = BanTinBienTap::where('TrangThai', 'Chờ Kiểm Duyệt')
            ->orderBy('NgayBienTap', 'desc')
            ->get();
        return view('quanly.kiemduyet.chokiemduyet', compact('bantinChoKiemDuyet'));
    }
    public function show($id)
    {
        $bantin = BanTinBienTap::findOrFail($id);
        return view('quanly.kiemduyet.kiemduyet', compact('bantin'));
    }
    public function yeuCauBT(Request $request, $id)
    {
        $loaitins = LoaiTin::all();
        $bantinBienTap = BantinBienTap::find($id);
        if (!$bantinBienTap) {
            return redirect()->back()->with('error', 'Bản tin không tồn tại.');
        }
        $bantinBienTap->NoiDungBT_BT = $request->NoiDungBT_BT;
        $bantinBienTap->TrangThai = 'Yêu Cầu Biên Tập Lại';
        $bantinBienTap->save();
        return redirect()->route('kiemduyet.index')->with('success', 'Yêu cầu biên tập lại thành công.');
    }
    public function dangTaiBT(Request $request, $id)
    {
        $bantinBienTap = BantinBienTap::find($id);
        if (!$bantinBienTap) {
            return redirect()->back()->with('error', 'Bản tin không tồn tại.');
        }
        $bantinXuatBan = new BantinXuatBan();
        $bantinXuatBan->TieuDeBT_XB = $bantinBienTap->TieuDeBT_BT;
        $bantinXuatBan->LoaiBT_XB = $bantinBienTap->LoaiBT_BT;
        $bantinXuatBan->NoiDungBT_XB = $bantinBienTap->NoiDungBT_BT;
        $bantinXuatBan->AnhDaiDien_XB = $bantinBienTap->AnhDaiDien_BT;
        $bantinXuatBan->NgayXuatBan = now();
        $bantinXuatBan->TenPhongVien_XB = $bantinBienTap->TenPhongVien; 
        $bantinXuatBan->TenBienTapVien_XB = $bantinBienTap->TenBienTapVien; 
        $nhanVien = Auth::user()->nhanvien;
        $bantinXuatBan->TenKiemDuyetVien = $nhanVien->TenNV;
        $bantinXuatBan->MaKDV = $nhanVien->MaNV;
        $bantinXuatBan->MaBTHT_XB = $bantinBienTap->MaBTHT;
        $bantinXuatBan->MaBTBT_XB = $bantinBienTap->MaBT_BT;
        $bantinXuatBan->LuotXem = 0;
        $bantinXuatBan->save();
        $bantinHienTruong = BantinHienTruong::find($bantinBienTap->MaBTHT);
        if ($bantinHienTruong) {
            $bantinHienTruong->TrangThai = 'Đã Xuất Bản';
            $bantinHienTruong->save();
        }
        $bantinBienTap->TrangThai = 'Đã Xuất Bản';
        $bantinBienTap->save();
        return redirect()->route('kiemduyet.index')->with('success', 'Đăng tải bản tin thành công.');
    }       
}
