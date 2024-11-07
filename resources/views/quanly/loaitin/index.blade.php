@extends('quanly.index')
@section('content')
<div class="container mx-auto mt-8">
    <h2 class="text-2xl font-semibold mb-6">Danh Sách Loại Tin</h2>
    <div class="mb-4">
        <a href="{{ route('quanly.loaitin.create') }}" 
           class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-300">
            Thêm Loại Tin
        </a>
    </div>
    <div class="overflow-x-auto shadow-md rounded-lg">
        <table class="min-w-full bg-white">
            <thead>
                <tr class="bg-gray-800 text-white">
                    <th class="py-3 px-4 text-left">Mã Loại Tin</th>
                    <th class="py-3 px-4 text-left">Tên Loại Tin</th>
                    <th class="py-3 px-4 text-left">Chuyên Mục</th>
                    <th class="py-3 px-4 text-left">Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($loaitin as $lt)
                <tr class="border-b hover:bg-gray-100 transition duration-300">
                    <td class="py-3 px-4">{{ $lt->MaLT }}</td>
                    <td class="py-3 px-4">{{ $lt->TenLT }}</td>
                    <td class="py-3 px-4">
                        {{ $lt->chuyenMuc->TenCM ?? 'Chưa có chuyên mục' }}
                    </td>
                    <td class="py-3 px-4">
                        <a href="{{ route('quanly.loaitin.edit', ['MaLT' => $lt->MaLT]) }}" 
                           class="text-blue-500 hover:underline">Sửa</a>
                        <form action="{{ route('quanly.loaitin.destroy', ['MaLT' => $lt->MaLT]) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="text-red-500 hover:underline"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                Xóa
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
