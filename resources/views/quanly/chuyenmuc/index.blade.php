@extends('quanly.index')

@section('content')
<div class="container mx-auto mt-8">
    <h2 class="text-2xl font-semibold mb-6">Danh Sách Chuyên Mục</h2>
    <div class="mb-4">
        <a href="{{ route('quanly.chuyenmuc.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Thêm Chuyên Mục</a>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-3 px-4 text-left">Mã Chuyên Mục</th>
                    <th class="py-3 px-4 text-left">Tên Chuyên Mục</th>
                    <th class="py-3 px-4 text-left">Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($chuyenmuc as $cm)
                <tr class="border-b hover:bg-gray-100">
                    <td class="py-3 px-4">{{ $cm->MaCM }}</td>
                    <td class="py-3 px-4">{{ $cm->TenCM }}</td>
                    <td class="py-3 px-4">
                        <a href="{{ route('quanly.chuyenmuc.edit', $cm->MaCM) }}" class="text-blue-500 hover:underline">Sửa</a>
                        <form action="{{ route('quanly.chuyenmuc.destroy', $cm->MaCM) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
