<?php

namespace App\Http\Controllers;

use App\Models\Bophan;
use App\Models\ChucVu;
use App\Models\NhanVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChucVuController extends Controller
{
    public function index()
    {
        $chucvus = ChucVu::with('boPhan')->get();
        return view('quanly.chucvu.index', compact('chucvus'));
    }
    public function create()
    {
        $boPhans = BoPhan::all();
        return view('quanly.chucvu.create', compact('boPhans')); 
    }
    public function store(Request $request)
    {
        $request->validate([
            'TenChucVu' => 'required',
            'MaBP_CV' => 'required',
        ]);
        ChucVu::create($request->all());
        return redirect()->route('quanly.chucvu.index')->with('success', 'Chức vụ đã được thêm.');
    }
    public function edit($MaCV)
    {
        $chucvu = ChucVu::findOrFail($MaCV);
        $bophan = Bophan::all();
        return view('quanly.chucvu.edit', compact('chucvu', 'bophan'));
    }
    public function update(Request $request, $MaCV)
    {
        $request->validate([
            'TenChucVu' => 'required|string|max:255',
            'MaBP_CV' => 'required|exists:bophan,MaBP',
        ]);
        $chucvu = ChucVu::findOrFail($MaCV);
        $chucvu->update($request->all());
        return redirect()->route('quanly.chucvu.index')->with('success', 'Cập nhật chức vụ thành công.');
    }
    public function destroy($MaCV)
    {
        $chucvu = ChucVu::findOrFail($MaCV);
        $nhanVienCount = NhanVien::where('MaCV_NV', $MaCV)->count();
        if ($nhanVienCount > 0) {
            return redirect()->route('quanly.chucvu.index')->with('error', 'Không thể xóa chức vụ vì có nhân viên đang thuộc chức vụ này.');
        }
        $phanQuyenCount = DB::table('phanquyen')->where('ChucVu_PhanQuyen', $MaCV)->count();
        if ($phanQuyenCount > 0) {
            return redirect()->route('quanly.chucvu.index')->with('error', 'Không thể xóa chức vụ vì chức vụ này đang được sử dụng trong phân quyền.');
        }
        $chucvu->delete();
        return redirect()->route('quanly.chucvu.index')->with('success', 'Chức vụ đã được xóa.');
    }
}
