@extends('quanly.index')
@section('content')
<style type="text/css">
    .ck-editor__editable_inline {
        height: 400px;
    }
</style>
<div class="mt-4">
    <h2 class="text-2xl font-semibold mb-4">Biên Tập Bản Tin</h2>
    <form action="{{ route('bientap.update', $bantin->MaBT_HT) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Tiêu Đề</label>
            <input type="text" name="TieuDeBT_BT" value="{{ $bantin->TieuDeBT_HT }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Loại Tin</label>
            <select name="LoaiBT_BT" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
                @foreach($loaitins as $maCM => $loaiTinGroup)
                    <optgroup label="{{ $loaiTinGroup[0]->chuyenMuc->TenCM }}">
                        @foreach($loaiTinGroup as $loaitin)
                            <option value="{{ $loaitin->MaLT }}" {{ $bantin->LoaiBT_HT == $loaitin->MaLT ? 'selected' : '' }}>
                                {{ $loaitin->TenLT }}
                            </option>
                        @endforeach
                    </optgroup>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Nội Dung</label>
            <textarea name="NoiDungBT_BT" id="editor" class="mt-1 block w-full ckeditor">{{ $bantin->NoiDungBT_HT }}</textarea>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Ảnh Đại Diện</label>
            <input type="file" name="AnhDaiDien_BT" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
            @if($bantin->AnhDaiDien_HT)
                <div class="mt-2">
                    <img src="{{ asset($bantin->AnhDaiDien_HT) }}" alt="Ảnh Đại Diện" class="w-32 h-32 object-cover border border-gray-300 rounded-md">
                </div>
            @endif
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Biên Tập</button>
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
