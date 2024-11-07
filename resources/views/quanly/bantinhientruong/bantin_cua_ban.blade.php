@extends('quanly.index')
@section('content')
<div class="mt-4">
    <h2 class="text-2xl font-semibold mb-4">Bản Tin Của Bạn</h2>
    @php
        $bantinDaXuatBan = $bantins->filter(function($bantin) {
            return $bantin->TrangThai == 'Đã Xuất Bản';
        });
        $bantinKhac = $bantins->filter(function($bantin) {
            return $bantin->TrangThai != 'Đã Xuất Bản';
        });
    @endphp
    <div class="mt-8">
        <h2 class="text-2xl font-semibold mb-4">Bản Tin Đã Xuất Bản</h2>
        @if($bantinDaXuatBan->isEmpty())
            <p class="text-gray-700">Không có bản tin nào đã xuất bản.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                @foreach($bantinDaXuatBan as $bantin)
                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        <img src="{{ asset($bantin->AnhDaiDien_HT) }}" alt="Thumbnail" class="w-full h-48 object-cover rounded-lg mb-2">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold">
                                {{ $bantin->TieuDeBT_HT }}
                            </h3>
                            <p class="text-gray-500 text-sm mt-2">
                                @php
                                    preg_match('/<h2>(.*?)<\/h2>/', $bantin->NoiDungBT_HT, $matches);
                                    $h2Content = !empty($matches) ? strip_tags($matches[1]) : 'Bản tin hiện chưa có nội dung';
                                @endphp
                                <strong>{{ $h2Content }}</strong>
                            </p>
                            <p class="text-gray-500 text-sm mt-2">
                                Loại Tin: <strong>{{ $bantin->loaitin->chuyenMuc->TenCM }} - {{ $bantin->loaitin->TenLT ?? 'Không xác định' }}</strong>
                            </p>
                            <p class="text-gray-500 text-sm mt-2">
                                Trạng Thái: <strong>{{ $bantin->TrangThai ?? 'Không xác định' }}</strong>
                            </p>
                            <p class="text-gray-500 text-sm mt-4">{{ \Carbon\Carbon::parse($bantin->NgayDang_HT)->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    <div class="mt-8">
        <h2 class="text-2xl font-semibold mb-4">Bản Tin Chờ Biên Tập Và Xuất Bản</h2>
        @if($bantinKhac->isEmpty())
            <p class="text-gray-700">Không có bản tin nào khác.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                @foreach($bantinKhac as $bantin)
                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        <img src="{{ asset($bantin->AnhDaiDien_HT) }}" alt="Thumbnail" class="w-full h-48 object-cover rounded-lg mb-2">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold">
                                {{ $bantin->TieuDeBT_HT }}
                            </h3>
                            <p class="text-gray-500 text-sm mt-2">
                                @php
                                    preg_match('/<h2>(.*?)<\/h2>/', $bantin->NoiDungBT_HT, $matches);
                                    $h2Content = !empty($matches) ? strip_tags($matches[1]) : 'Bản tin hiện chưa có nội dung';
                                @endphp
                                <strong>{{ $h2Content }}</strong>
                            </p>
                            <p class="text-gray-500 text-sm mt-2">
                                Loại Tin: <strong>{{ $bantin->loaitin->chuyenMuc->TenCM }} - {{ $bantin->loaitin->TenLT ?? 'Không xác định' }}</strong>
                            </p>
                            <p class="text-gray-500 text-sm mt-2">
                                Trạng Thái: <strong>{{ $bantin->TrangThai ?? 'Không xác định' }}</strong>
                            </p>
                            <p class="text-gray-500 text-sm mt-4">{{ \Carbon\Carbon::parse($bantin->NgayDang_HT)->format('d/m/Y H:i') }}</p>
                            <a href="{{ route('bantinhientruong.edit', $bantin->MaBT_HT) }}" class="text-blue-500 hover:underline">Chỉnh sửa</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
