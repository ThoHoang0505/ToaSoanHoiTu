<?php

namespace App\Http\Controllers;

use App\Models\BantinXuatBan;
use App\Models\LoaiTin;
use App\Models\ChuyenMuc;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $bantins = BantinXuatBan::with('loaiTin')->orderBy('NgayXuatBan', 'desc')->get();
        $chuyenmuc = ChuyenMuc::with('loaiTin')->get();
        return view('welcome', compact('bantins', 'chuyenmuc'));
    } 
}