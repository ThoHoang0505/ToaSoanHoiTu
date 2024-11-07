<?php

namespace App\Http\Controllers;

use App\Models\NenTang;
use Illuminate\Http\Request;

class NenTangController extends Controller
{
    public function index()
    {
        $nenTangList = NenTang::all();
        return view('quanly.nentang.index', compact('nenTangList'));
    }
    public function create()
    {
        return view('quanly.nentang.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'TenNenTang' => 'required|string|max:255',
        ]);
        NenTang::create($request->all());
        return redirect()->route('quanly.nentang.index')->with('success', 'Nền tảng đã được thêm thành công.');
    }
    public function edit($MaNT)
    {
        $nenTang = NenTang::findOrFail($MaNT);
        return view('quanly.nentang.edit', compact('nenTang'));
    }
    public function update(Request $request, $MaNT)
    {
        $request->validate([
            'TenNenTang' => 'required|string|max:255',
        ]);
        $nenTang = NenTang::findOrFail($MaNT);
        $nenTang->update($request->all());
        return redirect()->route('quanly.nentang.index')->with('success', 'Nền tảng đã được cập nhật thành công.');
    }
    public function destroy($MaNT)
    {
        $nenTang = NenTang::findOrFail($MaNT);
        $nenTang->delete();
        return redirect()->route('quanly.nentang.index')->with('success', 'Nền tảng đã được xóa thành công.');
    }
}
