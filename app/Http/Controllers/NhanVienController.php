<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class NhanVienController extends Controller{
    public function thongTinNV()
    {
        if (Auth::user()->Quyen === 'Admin' || Auth::user()->Quyen === 'Độc Giả') {
            return redirect()->route('login')->withErrors(['msg' => 'Bạn không có quyền truy cập.']);
        }
        $nhanvien = Auth::user()->nhanvien;
        return view('quanly.nhanvien.thongtinnhanvien', compact('nhanvien'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'TenNV' => 'required|string|max:255',
            'DiaChi_NV' => 'required|string|max:255',
            'SoDT_NV' => 'required|digits:10',
            'NgaySinh_NV' => 'required|date',
            'Email_NV' => 'required|email|max:255',
            'CCCD_NV' => 'required|digits:13',
            'password' => 'nullable|string|confirmed',
        ]);
        $nhanvien = Auth::user()->nhanvien;
        $nhanvien->update($request->only('TenNV', 'DiaChi_NV', 'SoDT_NV', 'NgaySinh_NV', 'Email_NV', 'CCCD_NV'));
        if ($request->filled('password')) {
            $taikhoan = $nhanvien->taikhoan;
            $taikhoan->MatKhau = Hash::make($request->password);
            $taikhoan->save();
        }
        return redirect()->route('quanly.index')->with('success', 'Thông tin và mật khẩu đã được cập nhật thành công.');
    }    
}

