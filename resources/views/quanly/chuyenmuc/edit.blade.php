@extends('quanly.index')

@section('content')
<div class="container mx-auto">
    <h2 class="text-2xl font-semibold mb-6">Cập Nhật Chuyên Mục</h2>
    <form action="{{ route('quanly.chuyenmuc.update', $chuyenmucedit->MaCM) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="TenCM" class="block text-gray-700">Tên Chuyên Mục:</label>
            <input type="text" id="TenCM" name="TenCM" value="{{ old('TenCM', $chuyenmucedit->TenCM) }}" class="w-full border rounded px-4 py-2" required>
        </div>
        @if($chuyenmucedit->Icon)
            <div class="mb-4">
                <p class="text-gray-700">Icon hiện tại:</p>
                <img src="{{ asset($chuyenmucedit->Icon) }}" alt="Icon hiện tại" class="w-16 h-16">
            </div>
        @endif
        <div class="mb-4">
            <label for="Icon" class="block text-gray-700">Icon mới:</label>
            <input type="file" id="Icon" name="Icon" class="w-full border rounded px-4 py-2">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Cập Nhật</button>
    </form>
</div>
@endsection
