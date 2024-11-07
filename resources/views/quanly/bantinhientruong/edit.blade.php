@extends('quanly.index')
@section('content')
<style type="text/css">
    .ck-editor__editable_inline {
        height: 400px;
    }
</style>
<div class="container mx-auto mt-8">
    <h2 class="text-2xl font-semibold mb-6">Chỉnh Sửa Bản Tin Hiện Trường</h2>
    <form action="{{ route('bantinhientruong.update', $bantins->MaBT_HT) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="TieuDeBT_HT" class="block text-gray-700 font-medium">Tiêu Đề Bản Tin:</label>
            <input type="text" name="TieuDeBT_HT" id="TieuDeBT_HT" class="w-full px-4 py-2 border rounded" value="{{ $bantins->TieuDeBT_HT }}" required>
        </div>
        <div class="mb-4">
            <label for="LoaiBT_HT" class="block text-gray-700 font-medium">Loại Bản Tin:</label>
            <select name="LoaiBT_HT" id="LoaiBT_HT" class="w-full px-4 py-2 border rounded" required>
                @foreach($loaitins as $maCM => $loaiTinGroup)
                    <optgroup label="{{ $loaiTinGroup[0]->chuyenMuc->TenCM }}">
                        @foreach($loaiTinGroup as $loaitin)
                            <option value="{{ $loaitin->MaLT }}" {{ $bantins->LoaiBT_HT == $loaitin->MaLT ? 'selected' : '' }}>
                                {{ $loaitin->TenLT }}
                            </option>
                        @endforeach
                    </optgroup>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="NoiDungBT_HT" class="block text-gray-700 font-medium">Nội Dung:</label>
            <textarea name="NoiDungBT_HT" id="editor" class="w-full px-4 py-2 border rounded">{{ $bantins->NoiDungBT_HT }}</textarea>
        </div>
        <div class="mb-4">
            <label for="AnhDaiDien_HT" class="block text-gray-700 font-medium">Ảnh Đại Diện:</label>
            <input type="file" name="AnhDaiDien_HT" id="AnhDaiDien_HT" class="w-full px-4 py-2 border rounded">
            <img src="{{ asset($bantins->AnhDaiDien_HT) }}" alt="Thumbnail" class="mt-2 w-32 h-32 object-cover">
        </div>

        <div class="mb-6">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Cập Nhật</button>
        </div>
    </form>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            ckfinder: {
                uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}"
            }
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
