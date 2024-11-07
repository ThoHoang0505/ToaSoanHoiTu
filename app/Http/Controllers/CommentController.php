<?php
namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $maBT)
    {
        $request->validate([
            'NoiDung' => 'required|string|max:255',
        ]);
        $comment = new Comment();
        $comment->MaBT_XB = $maBT;
        $comment->MaTK_DG = Auth::id();
        $comment->NoiDung = $request->NoiDung;
        $comment->TrangThai = 'Chờ Kiểm Duyệt';
        $comment->save();
        return redirect()->back()->with('success', 'Bình luận của bạn sẽ được kiểm duyệt và đăng tải.');
    }
    public function choKD()
    {
        if (Auth::user()->Quyen === 'Độc Giả') {
            return redirect()->route('login')->withErrors(['msg' => 'Bạn không có quyền truy cập.']);
        }
        $comments = Comment::with('user')
            ->where('TrangThai', 'Chờ Kiểm Duyệt')
            ->paginate(20);
        return view('quanly.kdbinhluan.index', compact('comments'));
    }    
    public function pheDuyet($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->TrangThai = 'Đã Kiểm Duyệt';
        $comment->save();
        return redirect()->back()->with('success', 'Bình luận đã được phê duyệt.');
    }
    public function xoa($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->TrangThai = 'Đã Xóa';
        $comment->save();
        return redirect()->back()->with('success', 'Đã xóa bình luận');
    }
}

