<?php

namespace App\Http\Controllers;

use App\Models\LoaiTin;
use App\Models\BanTinHienTruong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BantinXuatBan;

class BanTinHienTruongController extends Controller
{
    public function create()
    {
        $loaitins = LoaiTin::with('chuyenMuc')->get()->groupBy('MaCM_LT');
        return view('quanly.bantinhientruong.create', compact('loaitins'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'TieuDeBT_HT' => 'required|string|max:255',
            'LoaiBT_HT' => 'required|exists:loaitin,MaLT',
            'NoiDungBT_HT' => 'required',
            'AnhDaiDien_HT' => 'required|image|mimes:jpeg,png,jpg,gif'
        ]);
        if ($request->hasFile('AnhDaiDien_HT')) {
            $imageName = time() . '.' . $request->AnhDaiDien_HT->extension();
            $request->AnhDaiDien_HT->move(public_path('images/thumbnail'), $imageName);
        }
        $bantinhientruong = new BanTinHienTruong();
        $bantinhientruong->TieuDeBT_HT = $request->TieuDeBT_HT;
        $bantinhientruong->LoaiBT_HT = $request->LoaiBT_HT;
        $bantinhientruong->NoiDungBT_HT = $request->NoiDungBT_HT;
        $bantinhientruong->AnhDaiDien_HT = 'images/thumbnail/' . $imageName;
        $bantinhientruong->NgayDang_HT = now();
        $bantinhientruong->TenPhongVien = Auth::user()->nhanvien->TenNV;
        $bantinhientruong->MaNV_PV = Auth::user()->nhanvien->MaNV;
        $bantinhientruong->TrangThai = 'Chờ Biên Tập';
        $bantinhientruong->save();
        /*BanTinHienTruong::create([
            'TieuDeBT_HT' => $request->TieuDeBT_HT,
            'LoaiBT_HT' => $request->LoaiBT_HT,
            'NoiDungBT_HT' => $request->NoiDungBT_HT,
            'AnhDaiDien_HT' => 'images/thumbnail/' . $imageName,
            'NgayDang_HT' => now(),
            'TenPhongVien' => Auth::user()->nhanvien->TenNV,
            'MaNV_PV' => Auth::user()->nhanvien->MaNV,
            'TrangThai' => 'Chờ Biên Tập'
        ]);*/
        return redirect()->route('quanly.bantin.dangtai')->with('success', 'Bản tin hiện trường đã được đăng tải.');
    }    
    public function showUserBantin()
    {
        $maNV = Auth::user()->nhanvien->MaNV;
        $bantins = BanTinHienTruong::where('MaNV_PV', $maNV)
            ->with('loaitin')
            ->orderBy('NgayDang_HT', 'desc')
            ->get();
    
        return view('quanly.bantinhientruong.bantin_cua_ban', compact('bantins'));
    }
    public function edit($id)
    {
        $bantins = BanTinHienTruong::findOrFail($id);
        $loaitins = LoaiTin::with('chuyenMuc')->get()->groupBy('MaCM_LT');
        return view('quanly.bantinhientruong.edit', compact('bantins', 'loaitins'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'TieuDeBT_HT' => 'required|string|max:255',
            'LoaiBT_HT' => 'required|exists:loaitin,MaLT',
            'NoiDungBT_HT' => 'required',
            'AnhDaiDien_HT' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $bantins = BanTinHienTruong::findOrFail($id);
        if ($request->hasFile('AnhDaiDien_HT')) {
            $imageName = time() . '.' . $request->AnhDaiDien_HT->extension();
            $request->AnhDaiDien_HT->move(public_path('images/thumbnail'), $imageName);
            $bantins->AnhDaiDien_HT = 'images/thumbnail/' . $imageName;
        }
        $bantins->update([
            'TieuDeBT_HT' => $request->TieuDeBT_HT,
            'LoaiBT_HT' => $request->LoaiBT_HT,
            'NoiDungBT_HT' => $request->NoiDungBT_HT,
            'AnhDaiDien_HT' => $bantins->AnhDaiDien_HT,
        ]);
        return redirect()->route('bantin.cua_ban')->with('success', 'Bản tin hiện trường đã được cập nhật.');
    }
    public function khoBanTinHienTruong()
    {
        $bantins = BanTinHienTruong::where('TrangThai', 'Chờ Biên Tập')
            ->orderBy('NgayDang_HT', 'desc')
            ->get();
        return view('quanly.bientap.kho_bantinhientruong', compact('bantins'));
    }
}

