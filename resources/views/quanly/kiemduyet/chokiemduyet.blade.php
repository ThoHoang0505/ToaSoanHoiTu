@extends('quanly.index')
@section('content')
    <h2 class="text-2xl font-semibold mb-4">Bản Tin Chờ Kiểm Duyệt</h2>
    @if($bantinChoKiemDuyet->isEmpty())
        <p class="text-gray-600">Không có bản tin nào chờ kiểm duyệt.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($bantinChoKiemDuyet as $bantin)
                <div class="bg-white shadow-md rounded-lg p-4 border border-gray-300">
                    @if($bantin->AnhDaiDien_BT)
                        <img src="{{ asset($bantin->AnhDaiDien_BT) }}" alt="Ảnh Đại Diện" class="w-full h-32 object-cover rounded-lg mb-2">
                    @endif
                    <h3 class="text-xl font-semibold">{{ $bantin->TieuDeBT_BT }}</h3>
                    <p class="text-gray-600"><strong>Ngày Biên Tập:</strong> {{ $bantin->NgayBienTap }}</p>
                    <p class="text-gray-600"><strong>Tình Trạng:</strong> {{ $bantin->TrangThai }}</p>
                    <p class="text-gray-600"><strong>Biên Tập Viên:</strong> {{ $bantin->TenPhongVien }}</p>
                    <p class="text-gray-600"><strong>Phóng Viên:</strong> {{ $bantin->TenBienTapVien }}</p>
                    <p class="text-gray-600"><strong>Phiên Bản Biên Tập:</strong> {{ $bantin->PhienBan }}</p>
                    <a href="{{ route('kiemduyet.show', $bantin->MaBT_BT) }}" class="mt-2 inline-block text-blue-500 hover:underline">Xem Chi Tiết</a>
                </div>
            @endforeach
        </div>
    @endif
@endsection
