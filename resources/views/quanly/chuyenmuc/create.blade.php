@extends('quanly.index')

@section('content')
<div class="container mx-auto">
    <h2 class="text-2xl font-semibold mb-6">Thêm Chuyên Mục</h2>
    <form action="{{ route('quanly.chuyenmuc.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="TenCM" class="block text-gray-700">Tên Chuyên Mục:</label>
            <input type="text" id="TenCM" name="TenCM" class="w-full border rounded px-4 py-2" required>
        </div>
        <div class="mb-4">
            <label for="Icon" class="block text-gray-700">Icon:</label>
            <input type="file" id="Icon" name="Icon" class="w-full border rounded px-4 py-2">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Thêm</button>
    </form>
</div>
@endsection
