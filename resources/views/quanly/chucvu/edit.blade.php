@extends('quanly.index')
@section('content')
<div class="container mx-auto mt-8">
    <h2 class="text-2xl font-semibold mb-6">Cập Nhật Chức Vụ</h2>
    <form action="{{ route('quanly.chucvu.update', ['MaCV' => $chucvu->MaCV]) }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="TenChucVu" class="block text-sm font-medium text-gray-700">Tên Chức Vụ:</label>
            <input type="text" id="TenChucVu" name="TenChucVu" value="{{ $chucvu->TenChucVu }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>
        <div class="mb-4">
            <label for="MaBP_CV" class="block text-sm font-medium text-gray-700">Bộ Phận:</label>
            <select id="MaBP_CV" name="MaBP_CV" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                @foreach($bophan as $bp)
                    <option value="{{ $bp->MaBP }}" {{ $bp->MaBP == $chucvu->MaBP_CV ? 'selected' : '' }}>
                        {{ $bp->TenBP }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">Cập Nhật</button>
    </form>
</div>
@endsection
