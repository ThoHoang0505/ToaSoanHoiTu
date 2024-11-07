@extends('quanly.index')
@section('content')
<div class="p-6 bg-white shadow-lg rounded-lg">
    <h2 class="text-2xl font-semibold mb-6">Danh Sách Nền Tảng</h2>
    <div class="mb-4">
        <a href="{{ route('quanly.nentang.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Thêm Nền Tảng</a>
    </div>
    <table class="min-w-full bg-gray-100 text-left border border-gray-200 rounded-lg">
        <thead>
            <tr class="bg-gray-800 text-white">
                <th class="px-4 py-2">Mã Nền Tảng</th>
                <th class="px-4 py-2">Tên Nền Tảng</th>
                <th class="px-4 py-2">Hành Động</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($nenTangList as $nenTang)
            <tr class="hover:bg-gray-200 transition duration-200">
                <td class="border px-4 py-2">{{ $nenTang->MaNT }}</td>
                <td class="border px-4 py-2">{{ $nenTang->TenNenTang }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('quanly.nentang.edit', $nenTang->MaNT) }}" class="text-blue-500 hover:text-blue-700">Sửa</a>
                    <form action="{{ route('quanly.nentang.destroy', $nenTang->MaNT) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
