@extends('quanly.index')
@section('content')
<style type="text/css">
    .ck-editor__editable_inline {
        height: 400px;
    }
</style>
<h2 class="text-2xl font-semibold mb-4">{{ $bantin->TieuDeBT_BT }}</h2>
<h3 class="text-xl font-semibold mb-4">
    {{ $bantin->loaitin->chuyenMuc->TenCM }} - {{ $bantin->loaitin->TenLT }}
</h3>
@if($bantin->AnhDaiDien_BT)
    <img src="{{ asset($bantin->AnhDaiDien_BT) }}" alt="Ảnh Đại Diện" class="w-full h-48 object-cover rounded-lg mb-4">
@endif
<p class="text-gray-600">Ngày Biên Tập: {{ $bantin->NgayBienTap }}</p>
<p class="text-gray-600">Phóng Viên: {{ $bantin->TenPhongVien }}</p>
<p class="text-gray-600">Biên Tập Viên: {{ $bantin->TenBienTapVien }}</p>
<p class="text-gray-600">Phiên Bản Biên Tập: {{ $bantin->PhienBan }}</p>
<h3 class="text-lg font-semibold mt-4">Nội Dung</h3>
<form id="editForm" action="{{ route('kiemduyet.yeuCauBT', $bantin->MaBT_BT) }}" method="POST" class="mb-4">
    @csrf
    @method('PUT')
    <textarea name="NoiDungBT_BT" id="editor" class="w-full h-48 p-2 border border-gray-300 rounded-lg" required>{{ $bantin->NoiDungBT_BT }}</textarea>
</form>
<div class="mt-4 flex space-x-4">
    <button type="submit" form="editForm" class="bg-yellow-500 text-white px-4 py-2 rounded-lg">Yêu Cầu Biên Tập Lại</button>
    <form action="{{ route('kiemduyet.dangTaiBT', $bantin->MaBT_BT) }}" method="POST">
        @csrf
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg">Đăng Tải Bản Tin</button>
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
