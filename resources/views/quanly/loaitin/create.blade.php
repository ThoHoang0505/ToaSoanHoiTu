@extends('quanly.index')
@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-semibold mb-6 text-gray-800">Thêm Loại Tin</h2>
    <form action="{{ route('quanly.loaitin.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
        @csrf
        <div class="mb-4">
            <label for="TenLT" class="block text-gray-700 text-sm font-bold mb-2">Tên Loại Tin:</label>
            <input type="text" id="TenLT" name="TenLT" 
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                   placeholder="Nhập tên loại tin" required>
        </div>
        <div class="mb-4">
            <label for="MaCM_LT" class="block text-gray-700 text-sm font-bold mb-2">Chuyên Mục:</label>
            <select id="MaCM_LT" name="MaCM_LT" class="border border-gray-300 rounded px-3 py-2 w-full" required>
                <option value="">Chọn chuyên mục</option>
                @foreach($chuyenmuc as $cm)
                    <option value="{{ $cm->MaCM }}">{{ $cm->TenCM }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300">Thêm</button>
        </div>
    </form>
</div>
@endsection
