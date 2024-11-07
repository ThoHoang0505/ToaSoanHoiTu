@extends('quanly.index')
@section('content')
<div class="container mx-auto">
    <h2 class="text-2xl font-semibold mb-6">Thêm Chức Vụ</h2>
    <form action="{{ route('quanly.chucvu.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="TenChucVu" class="block">Tên Chức Vụ:</label>
            <input type="text" id="TenChucVu" name="TenChucVu" class="border border-gray-300 rounded px-3 py-2 w-full" required>
        </div>
        <div class="mb-4">
            <label for="MaBP_CV" class="block">Bộ Phận:</label>
            <select id="MaBP_CV" name="MaBP_CV" class="border border-gray-300 rounded px-3 py-2 w-full" required>
                <option value="">Chọn Bộ Phận</option>
                @foreach($boPhans as $boPhan)
                    <option value="{{ $boPhan->MaBP }}">{{ $boPhan->TenBP }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Thêm</button>
    </form>
</div>
@endsection
