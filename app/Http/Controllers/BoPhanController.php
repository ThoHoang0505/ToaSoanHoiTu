<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bophan;
use App\Models\Chucvu;

class BoPhanController extends Controller
{
    public function index()
    {
        $bophan = Bophan::all();
        return view('quanly.bophan.index', compact('bophan'));
    }
    public function create()
    {
        return view('quanly.bophan.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'TenBP' => 'required|string|max:255',
        ]);
        Bophan::create([
            'TenBP' => $request->input('TenBP'),
        ]);
        return redirect()->route('quanly.bophan.index')->with('success', 'Thêm bộ phận thành công!');
    }
    public function edit($MaBP)
    {
        $bophan = Bophan::where('MaBP', $MaBP)->firstOrFail();
        return view('quanly.bophan.edit', compact('bophan'));
    }
    public function update(Request $request, $MaBP)
    {
        $request->validate([
            'TenBP' => 'required|string|max:255',
        ]);
        $bophan = Bophan::where('MaBP', $MaBP)->firstOrFail();
        $bophan->TenBP = $request->input('TenBP');
        $bophan->save();
        return redirect()->route('quanly.bophan.index')->with('success', 'Cập nhật bộ phận thành công!');
    }
    public function destroy($MaBP)
    {
        $chucvuCount = Chucvu::where('MaBP_CV', $MaBP)->count();
        if ($chucvuCount > 0) {
            return redirect()->route('quanly.bophan.index')->with('error', 'Không thể xóa bộ phận vì còn các chức vụ liên quan.');
        }
        $bophan = Bophan::where('MaBP', $MaBP)->firstOrFail();
        $bophan->delete();
        return redirect()->route('quanly.bophan.index')->with('success', 'Xóa bộ phận thành công!');
    }
}
