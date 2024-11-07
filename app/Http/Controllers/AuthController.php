<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\TaiKhoan;
use App\Models\DocGia;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'TenDangNhap' => 'required|string',
            'password' => 'required|string',
        ]);
        $TenDangNhap = $request->input('TenDangNhap');
        $MatKhau = $request->input('password');
        $taiKhoan = TaiKhoan::where('TenDangNhap', $TenDangNhap)->first();
        if ($taiKhoan && Hash::check($MatKhau, $taiKhoan->MatKhau)) {
            Auth::login($taiKhoan);
            if ($taiKhoan->Quyen === 'Admin') {
                return redirect()->route('admin.index');
            } elseif ($taiKhoan->Quyen === 'Độc Giả') {
                return redirect()->route('welcome');
            } else {
                return redirect()->route('quanly.index');
            }
        }
        return redirect()->back()->withErrors(['TenDangNhap' => 'Tên đăng nhập hoặc mật khẩu không đúng']);
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }
    public function showRegisterForm()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'TenDG' => 'required|string|max:255',
            'TenDangNhap' => 'required|string|max:255|unique:taikhoan,TenDangNhap',
            'Email' => 'required|string|email|max:255|unique:docgia,Email',
            'NgaySinh' => 'required|date',
            'SDT' => 'required|string|max:15',
            'DiaChi' => 'required|string|max:255',
            'GioiTinh' => 'required|string|in:Nam,Nữ,Khác',
            'password' => 'required|string|confirmed',
        ]);
        try {
            $taiKhoan = TaiKhoan::create([
                'TenDangNhap' => $request->TenDangNhap,
                'MatKhau' => Hash::make($request->password),
                'Quyen' => 'Độc Giả',
            ]);
            $docGia = DocGia::create([
                'TenDG' => $request->TenDG,
                'Email' => $request->Email,
                'NgaySinh' => $request->NgaySinh,
                'SDT' => $request->SDT,
                'DiaChi' => $request->DiaChi,
                'GioiTinh' => $request->GioiTinh,
                'MatKhau' => Hash::make($request->password),
                'MaTK_DG' => $taiKhoan->MaTK,
            ]);
            return redirect()->route('login')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Có lỗi xảy ra: ' . $e->getMessage()]);
        }
    }
}
