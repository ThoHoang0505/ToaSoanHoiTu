<?php

namespace App\Http\Controllers;

use App\Models\ChuyenMuc;
use App\Models\LoaiTin;
use Illuminate\Http\Request;

class ChuyenMucController extends Controller
{
    public function index()
    {
        $chuyenmuc = ChuyenMuc::all();
        return view('quanly.chuyenmuc.index', compact('chuyenmuc'));
    }
    public function create()
    {
        return view('quanly.chuyenmuc.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'TenCM' => 'required|string|max:255',
            'Icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $iconPath = null;
        if ($request->hasFile('Icon')) {
            $iconPath = $request->file('Icon')->move(public_path('images/icon'), $request->file('Icon')->getClientOriginalName());
            $iconPath = 'images/icon/' . $request->file('Icon')->getClientOriginalName();
        }
        ChuyenMuc::create([
            'TenCM' => $request->input('TenCM'),
            'Icon' => $iconPath,
        ]);
        return redirect()->route('quanly.chuyenmuc.index')->with('success', 'Thêm chuyên mục thành công!');
    }
    public function edit($MaCM)
    {
        $chuyenmucedit = ChuyenMuc::where('MaCM', $MaCM)->firstOrFail();
        return view('quanly.chuyenmuc.edit', compact('chuyenmucedit'));
    }
    public function update(Request $request, $MaCM)
    {
        $request->validate([
            'TenCM' => 'required|string|max:255',
            'Icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $chuyenmuc = ChuyenMuc::findOrFail($MaCM);
        if ($request->hasFile('Icon')) {
            $imagePath = 'images/icon/' . $request->file('Icon')->getClientOriginalName();
            $request->file('Icon')->move(public_path('images/icon'), $imagePath);
            $chuyenmuc->Icon = $imagePath;
        }
        $chuyenmuc->TenCM = $request->input('TenCM');
        $chuyenmuc->save();
        return redirect()->route('quanly.chuyenmuc.index')->with('success', 'Cập nhật chuyên mục thành công!');
    }
    public function destroy($MaCM)
    {
        $chuyenmuc = ChuyenMuc::findOrFail($MaCM);
        $countLoaiTin = LoaiTin::where('MaCM_LT', $MaCM)->count();
        if ($countLoaiTin > 0) {
            return redirect()->route('quanly.chuyenmuc.index')->with('error', 'Không thể xóa chuyên mục này vì có loại tin đang sử dụng!');
        }
        $chuyenmuc->delete();
        return redirect()->route('quanly.chuyenmuc.index')->with('success', 'Xóa chuyên mục thành công!');
    }    
    
}
