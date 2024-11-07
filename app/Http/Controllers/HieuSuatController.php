<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhanVien;
use Illuminate\Support\Facades\DB;

class HieuSuatController extends Controller
{
    public function hieuSuatPhongVien()
    {
        $phongVienHieuSuat = NhanVien::where('MaCV_NV', 2)
            ->leftJoin('bantinhientruong', 'nhanvien.MaNV', '=', 'bantinhientruong.MaNV_PV')
            ->select(
                'nhanvien.MaNV', 
                'nhanvien.TenNV',
                DB::raw('COUNT(bantinhientruong.MaBT_HT) as soBanTin'),
                DB::raw('SUM(CASE WHEN DATE(bantinhientruong.NgayDang_HT) = CURDATE() THEN 1 ELSE 0 END) as soBanTinTrongNgay'),
                DB::raw('SUM(CASE WHEN MONTH(bantinhientruong.NgayDang_HT) = MONTH(CURDATE()) AND YEAR(bantinhientruong.NgayDang_HT) = YEAR(CURDATE()) THEN 1 ELSE 0 END) as soBanTinTrongThang'),
                DB::raw('SUM(CASE WHEN bantinhientruong.TrangThai = "Đã Xuất Bản" THEN 1 ELSE 0 END) as soBanTinXuatBan')
            )
            ->groupBy('nhanvien.MaNV', 'nhanvien.TenNV')
            ->orderBy('soBanTin', 'desc')
            ->get();
        return view('quanly.hieusuat.phongvien', compact('phongVienHieuSuat'));
    }
    public function hieuSuatBienTapVien()
    {
        $bienTapVienHieuSuat = DB::table('nhanvien as nv')
            ->leftJoin('bantinbientap as btbt', 'nv.MaNV', '=', 'btbt.MaNV_BTV')
            ->select(
                'nv.MaNV',
                'nv.TenNV',
                DB::raw('COUNT(btbt.MaBT_BT) as soBanTinDaBienTap'),
                DB::raw('SUM(CASE WHEN DATE(btbt.NgayBienTap) = CURDATE() THEN 1 ELSE 0 END) as soBanTinTrongNgay'),
                DB::raw('SUM(CASE WHEN MONTH(btbt.NgayBienTap) = MONTH(CURDATE()) AND YEAR(btbt.NgayBienTap) = YEAR(CURDATE()) THEN 1 ELSE 0 END) as soBanTinTrongThang'),
                DB::raw('SUM(CASE WHEN btbt.TrangThai = "Đã Xuất Bản" THEN 1 ELSE 0 END) as soBanTinXuatBan')
            )
            ->where('nv.MaCV_NV', 3)
            ->groupBy('nv.MaNV', 'nv.TenNV')
            ->get();
        return view('quanly.hieusuat.bientapvien', compact('bienTapVienHieuSuat'));
    }
    public function hieuSuatKiemDuyetVien()
    {
        $kiemDuyetVienHieuSuat = DB::table('nhanvien as nv')
            ->leftJoin('bantinxuatban as btxb', 'nv.MaNV', '=', 'btxb.MaKDV')
            ->select(
                'nv.MaNV',
                'nv.TenNV',
                DB::raw('COUNT(btxb.MaBT_XB) as soBanTinDaKiemDuyet'),
                DB::raw('SUM(CASE WHEN DATE(btxb.NgayXuatBan) = CURDATE() THEN 1 ELSE 0 END) as soBanTinTrongNgay'),
                DB::raw('SUM(CASE WHEN MONTH(btxb.NgayXuatBan) = MONTH(CURDATE()) AND YEAR(btxb.NgayXuatBan) = YEAR(CURDATE()) THEN 1 ELSE 0 END) as soBanTinTrongThang')
            )
            ->where('nv.MaCV_NV', 4)
            ->groupBy('nv.MaNV', 'nv.TenNV')
            ->get();
        return view('quanly.hieusuat.kiemduyetvien', compact('kiemDuyetVienHieuSuat'));
    }
}
