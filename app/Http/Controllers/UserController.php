<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaiKhoan;
use App\Models\NhanVien;
use App\Models\ChucVu;
use App\Models\PhanQuyen;
use App\Models\Quyen;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        $chucVus = ChucVu::all();
        return view('admin.users.create', compact('chucVus'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'TenDangNhap' => 'required|string|max:255|unique:taikhoan',
            'MatKhau' => 'required|string',
            'MaCV_NV' => 'required|integer',
            'TenNV' => 'required|string|max:255',
            'DiaChi_NV' => 'required|string|max:255',
            'SoDT_NV' => 'required|string|size:10',
            'NgaySinh_NV' => 'required|date',
            'Email_NV' => 'required|email|unique:nhanvien',
            'CCCD_NV' => 'required|string|size:13',
            'GioiTinh_NV' => 'required|string|max:255',
            'Anh_NV' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);
        $chucVu = ChucVu::find($request->MaCV_NV);
        if (!$chucVu) {
            return redirect()->back()->withErrors(['MaCV_NV' => 'Chức vụ không hợp lệ.']);
        }
        $taikhoan = new TaiKhoan();
        $taikhoan->TenDangNhap = $request->TenDangNhap;
        $taikhoan->MatKhau = Hash::make($request->MatKhau);
        $taikhoan->Quyen = $chucVu->TenChucVu;
        $taikhoan->save();
        $nhanvien = new NhanVien();
        $nhanvien->MaTK_NV = $taikhoan->MaTK;
        $nhanvien->TenNV = $request->TenNV;
        $nhanvien->DiaChi_NV = $request->DiaChi_NV;
        $nhanvien->SoDT_NV = $request->SoDT_NV;
        $nhanvien->NgaySinh_NV = $request->NgaySinh_NV;
        $nhanvien->Email_NV = $request->Email_NV;
        $nhanvien->CCCD_NV = $request->CCCD_NV;
        $nhanvien->GioiTinh_NV = $request->GioiTinh_NV;
        $nhanvien->MaCV_NV = $request->MaCV_NV;
        if ($request->hasFile('Anh_NV')) {
            $file = $request->file('Anh_NV');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/nhanvien'), $fileName);
            $nhanvien->Anh_NV = 'images/nhanvien/' . $fileName;
        }
        $nhanvien->save();
        return redirect()->back()->with('success', 'Thêm tài khoản thành công!');
    }
    public function index(Request $request)
    {
        $query = $request->input('search');
        $users = TaiKhoan::when($query, function($queryBuilder) use ($query) {
            return $queryBuilder->where('TenDangNhap', 'LIKE', "%{$query}%");
        })
        ->where('Quyen', '!=', 'Độc Giả')
        ->get();
        $chucVus = ChucVu::all();
        return view('admin.users.edit', compact('users', 'chucVus'));
    }
    public function doiMatKhau(Request $request, $id)
    {
        $request->validate([
            'MatKhau' => 'required|string',
        ]);
        $taikhoan = TaiKhoan::findOrFail($id);
        $taikhoan->MatKhau = Hash::make($request->MatKhau);
        $taikhoan->save();
        return redirect()->route('users.index')->with('success', 'Cập nhật mật khẩu thành công!');
    }
    public function doiChucVu(Request $request, $id)
    {
        $request->validate([
            'Quyen' => 'required|integer|exists:chucvu,MaCV',
        ]);
        $taiKhoan = TaiKhoan::find($id);
        if (!$taiKhoan) {
            return redirect()->back()->withErrors(['error' => 'Tài khoản không tồn tại']);
        }
        $chucVu = ChucVu::find($request->Quyen);
        if (!$chucVu) {
            return redirect()->back()->withErrors(['error' => 'Chức vụ không hợp lệ']);
        }
        $taiKhoan->Quyen = $chucVu->TenChucVu;
        $taiKhoan->save();
        $nhanVien = NhanVien::where('MaTK_NV', $taiKhoan->MaTK)->first();
        if ($nhanVien) {
            $nhanVien->MaCV_NV = $chucVu->MaCV;
            $nhanVien->save();
        }
        return redirect()->route('users.index')->with('success', 'Chức vụ đã được cập nhật thành công!');
    }
    public function xemQuyen()
    {
        $chucVus = ChucVu::with('quyen')->get();
        $Quyen = Quyen::all(); 
        return view('admin.phanquyen.index', compact('chucVus', 'Quyen'));
    }
    public function themQuyen(Request $request)
    {
        $request->validate([
            'chucVuId' => 'required|exists:chucvu,MaCV',
            'quyenId' => 'required|exists:quyen,MaQuyen',
        ]);
        $kiemTra = PhanQuyen::where('ChucVu_PhanQuyen', $request->chucVuId)
                                       ->where('MaQuyen_PhanQuyen', $request->quyenId)
                                       ->first();
        if ($kiemTra) {
            return redirect()->back()->withErrors(['quyen' => 'Quyền này đã tồn tại cho chức vụ này.']);
        }
        $phanQuyen = new PhanQuyen();
        $phanQuyen->ChucVu_PhanQuyen = $request->chucVuId;
        $phanQuyen->MaQuyen_PhanQuyen = $request->quyenId;
        $phanQuyen->save();
        return redirect()->back()->with('success', 'Thêm quyền thành công!');
    }    
    public function xoaQuyen(Request $request)
    {
        $request->validate([
            'chucVuId' => 'required|exists:chucvu,MaCV',
            'quyenId' => 'required|exists:quyen,MaQuyen',
        ]);
        PhanQuyen::where('ChucVu_PhanQuyen', $request->chucVuId)
                  ->where('MaQuyen_PhanQuyen', $request->quyenId)
                  ->delete();
        return redirect()->back()->with('success', 'Xóa quyền thành công!');
    }
}
