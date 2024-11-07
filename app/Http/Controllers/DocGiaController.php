<?php

namespace App\Http\Controllers;

use App\Models\TaiKhoan;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DocGiaController extends Controller
{
    public function edit()
    {
        if (Auth::user()->Quyen !== 'Độc Giả') {
            return redirect()->route('login')->withErrors(['msg' => 'Đây là trang của độc giả.']);
        }
        $docGia = Auth::user()->docgia;
        if (!$docGia) {
            return redirect()->route('account.edit')->with('error', 'Không tìm thấy thông tin độc giả.');
        }
        return view('auth.tkdocgia', compact('docGia'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'TenDG' => 'required|string|max:255',
            'Email' => 'required|email|max:255',
            'NgaySinh' => 'nullable|date',
            'SDT' => 'nullable|string|max:10',
            'DiaChi' => 'nullable|string|max:255',
            'GioiTinh' => 'nullable|in:Nam,Nữ,Khác',
            'password' => 'nullable|string|confirmed',
        ]);
        $docGia = Auth::user()->docgia;
        $data = $request->only('TenDG', 'Email', 'NgaySinh', 'SDT', 'DiaChi', 'GioiTinh');
        $docGia->update($data);
        if ($request->filled('password')) {
            $taikhoan = $docGia->taikhoan;
            $taikhoan->MatKhau = Hash::make($request->password);
            $taikhoan->save();
        }
        return redirect()->route('account.edit')->with('success', 'Cập nhật thông tin thành công.');
    }
}
