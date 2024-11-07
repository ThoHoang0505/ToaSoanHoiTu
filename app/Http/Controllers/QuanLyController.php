<?php

namespace App\Http\Controllers;

use App\Models\NhanVien;
use App\Models\TaiKhoan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class QuanLyController extends Controller
{
    public function index()
    {
        if (Auth::user()->Quyen === 'Độc Giả' || Auth::user()->Quyen === 'Admin') {
            return redirect()->route('login')->withErrors(['msg' => 'Bạn không có quyền truy cập.']);
        }
        $soLuongYeuCauBienTapLai = $this->demYeuCau();
        return view('quanly.index', compact('soLuongYeuCauBienTapLai'));
    }
    public function quanLyNhanVien(Request $request)
    {
        $userId = Auth::id();
        $search = $request->input('search');
        $query = DB::table('nhanvien')
            ->join('taikhoan', 'nhanvien.MaTK_NV', '=', 'taikhoan.MaTK')
            ->join('chucvu', 'nhanvien.MaCV_NV', '=', 'chucvu.MaCV')
            ->select('nhanvien.MaNV', 'nhanvien.TenNV', 'nhanvien.NgaySinh_NV', 'nhanvien.Email_NV', 'chucvu.TenChucVu', 'taikhoan.TenDangNhap')
            ->orderBy('nhanvien.MaNV', 'asc');
        if (!empty($search)) {
            $query->where('nhanvien.TenNV', 'like', '%' . $search . '%');
        }
        $nhanVienList = $query->paginate(10);
        return view('quanly.nhanvien.quanlynhanvien', compact('nhanVienList', 'search'));
    }        
    public function show($id)
    {
        $nhanVien = NhanVien::findOrFail($id);
        return view('quanly.nhanvien.chitietnhanvien', compact('nhanVien'));
    }
    public function edit($id)
    {
    $nhanVien = NhanVien::findOrFail($id);
    return view('quanly.nhanvien.edit', compact('nhanVien'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'TenNV' => 'required|string|max:255',
            'DiaChi_NV' => 'required|string|max:255',
            'SoDT_NV' => 'required|string|size:10',
            'NgaySinh_NV' => 'required|date',
            'Email_NV' => 'required|email|unique:nhanvien,Email_NV,' . $id . ',MaNV',
            'CCCD_NV' => 'required|string|size:13',
            'GioiTinh_NV' => 'required|string|max:255',
            'Anh_NV' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $nhanVien = NhanVien::findOrFail($id);
        $nhanVien->TenNV = $request->input('TenNV');
        $nhanVien->DiaChi_NV = $request->input('DiaChi_NV');
        $nhanVien->SoDT_NV = $request->input('SoDT_NV');
        $nhanVien->NgaySinh_NV = $request->input('NgaySinh_NV');
        $nhanVien->Email_NV = $request->input('Email_NV');
        $nhanVien->CCCD_NV = $request->input('CCCD_NV');
        $nhanVien->GioiTinh_NV = $request->input('GioiTinh_NV');
        if ($request->hasFile('Anh_NV')) {
            $file = $request->file('Anh_NV');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/nhanvien'), $fileName);
            $nhanVien->Anh_NV = 'images/nhanvien/' . $fileName;
        }
        $nhanVien->save();
        return redirect()->route('nhanvien.show', $id)->with('success', 'Cập nhật thông tin thành công!');
    }
    public function demYeuCau()
    {
        $userId = Auth::id();
        $maNV = DB::table('nhanvien')
            ->where('MaTK_NV', $userId)
            ->value('MaNV');
        $soLuongYeuCauBienTapLai = DB::table('bantinbientap')
            ->where('MaNV_BTV', $maNV)
            ->where('TrangThai', 'Yêu Cầu Biên Tập Lại')
            ->count();
        return $soLuongYeuCauBienTapLai;
    }
}
