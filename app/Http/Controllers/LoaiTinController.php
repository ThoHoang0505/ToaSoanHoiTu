<?php

namespace App\Http\Controllers;

use App\Models\BanTinHienTruong;
use Illuminate\Http\Request;
use App\Models\LoaiTin;
use App\Models\ChuyenMuc;

class LoaiTinController extends Controller
{
    public function index()
    {
        $loaitin = LoaiTin::with('chuyenMuc')->get(); 
        return view('quanly.loaitin.index', compact('loaitin'));
    }
    public function create()
    {
        $chuyenmuc = ChuyenMuc::all();
        return view('quanly.loaitin.create', compact('chuyenmuc'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'TenLT' => 'required|string|max:255',
            'MaCM_LT' => 'required|exists:chuyenmuc,MaCM',
        ]);
        LoaiTin::create([
            'TenLT' => $request->input('TenLT'),
            'MaCM_LT' => $request->input('MaCM_LT'),
        ]);

        return redirect()->route('quanly.loaitin.index')->with('success', 'Thêm loại tin thành công!');
    }
    public function edit($MaLT)
    {
        $loaitin = LoaiTin::where('MaLT', $MaLT)->firstOrFail();
        $chuyenmuc = ChuyenMuc::all();
        return view('quanly.loaitin.edit', compact('loaitin', 'chuyenmuc'));
    }
    public function update(Request $request, $MaLT)
    {
        $request->validate([
            'TenLT' => 'required|string|max:255',
            'MaCM_LT' => 'required|exists:chuyenmuc,MaCM',
        ]);
        $loaitin = LoaiTin::where('MaLT', $MaLT)->firstOrFail();
        $loaitin->update([
            'TenLT' => $request->input('TenLT'),
            'MaCM_LT' => $request->input('MaCM_LT'),
        ]);
        return redirect()->route('quanly.loaitin.index')->with('success', 'Cập nhật thành công!');
    }
    public function destroy($MaLT) 
    {
        $loaiTin = LoaiTin::where('MaLT', $MaLT)->firstOrFail();
        $demBanTin = BanTinHienTruong::where('LoaiBT_HT', $MaLT)->count();
        if ($demBanTin > 0) {
            return redirect()->route('quanly.loaitin.index')->with('error', 'Không thể xóa loại tin này vì có bản tin đang sử dụng!');
        }
        $loaiTin->delete();
        return redirect()->route('quanly.loaitin.index')->with('success', 'Xóa loại tin thành công!');
    }
}
