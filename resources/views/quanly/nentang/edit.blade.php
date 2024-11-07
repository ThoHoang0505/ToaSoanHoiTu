@extends('quanly.index')
@section('content')
<div class="p-6 bg-white shadow-lg rounded-lg">
    <h2 class="text-2xl font-semibold mb-6">Chỉnh Sửa Nền Tảng</h2>
    <form action="{{ route('quanly.nentang.update', $nenTang->MaNT) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="TenNenTang" class="block text-gray-700">Tên Nền Tảng:</label>
            <input type="text" name="TenNenTang" id="TenNenTang" value="{{ $nenTang->TenNenTang }}" class="border rounded-lg px-4 py-2 w-full" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Cập Nhật</button>
        <a href="{{ route('quanly.nentang.index') }}" class="text-gray-500 hover:text-gray-700 ml-4">Hủy</a>
    </form>
</div>
@endsection
