@extends('quanly.index')
@section('content')
<div class="container mx-auto mt-8">
    <h2 class="text-2xl font-semibold mb-6">Kiểm Duyệt Bình Luận</h2>
    @if($comments->isEmpty())
        <p class="text-gray-500">Không có bình luận nào đang chờ kiểm duyệt.</p>
    @else
        <div class="overflow-x-auto shadow-md rounded-lg">
            <table class="min-w-full bg-white">
                <thead>
                    <tr class="bg-gray-800 text-white">
                        <th class="py-3 px-4 text-left">Tên Tài Khoản</th>
                        <th class="py-3 px-4 text-left">Nội Dung</th>
                        <th class="py-3 px-4 text-left">Ngày Bình Luận</th>
                        <th class="py-3 px-4 text-left">Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comments as $comment)
                        <tr class="border-b">
                            <td class="py-3 px-4">{{ $comment->user->TenDangNhap ?? 'Người dùng ẩn danh' }}</td>
                            <td class="py-3 px-4">{{ $comment->NoiDung }}</td>
                            <td class="py-3 px-4">
                                {{ \Carbon\Carbon::parse($comment->created_at)->format('H:i d/m/Y') }}
                            </td>
                            <td class="py-3 px-4">
                                <form action="{{ route('comments.pheduyet', $comment->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-700 transition duration-300">
                                        Phê Duyệt
                                    </button>
                                </form>
                                <form action="{{ route('comments.xoa', $comment->id) }}" method="POST" class="inline ml-2">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700 transition duration-300">
                                        Xóa
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $comments->links('pagination::tailwind') }}
        </div>
    @endif
</div>
@endsection
