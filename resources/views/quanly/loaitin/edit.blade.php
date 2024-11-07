@extends('quanly.index')
@section('content')
<div class="container mx-auto">
    <h1 class="text-3xl font-bold mb-6">Sửa Loại Tin</h1>
    <form action="{{ route('quanly.loaitin.update', ['MaLT' => $loaitin->MaLT]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="TenLT" class="block text-gray-700 text-sm font-bold mb-2">Tên Loại Tin:</label>
            <input 
                type="text" 
                id="TenLT" 
                name="TenLT" 
                value="{{ old('TenLT', $loaitin->TenLT) }}" 
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                required>
        </div>
        <div class="mb-4">
            <label for="MaCM_LT" class="block text-gray-700 text-sm font-bold mb-2">Chuyên Mục:</label>
            <select id="MaCM_LT" name="MaCM_LT" class="border border-gray-300 rounded px-3 py-2 w-full" required>
                <option value="">Chọn chuyên mục</option>
                @foreach($chuyenmuc as $cm)
                    <option value="{{ $cm->MaCM }}" 
                        {{ $cm->MaCM == $loaitin->MaCM_LT ? 'selected' : '' }}>
                        {{ $cm->TenCM }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Cập Nhật
            </button>
        </div>
    </form>
</div>
@endsection
