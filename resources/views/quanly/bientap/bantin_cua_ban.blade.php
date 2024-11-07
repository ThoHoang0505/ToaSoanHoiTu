@extends('quanly.index')
@section('content')
    <h2 class="text-2xl font-semibold mb-4">Bản Tin Biên Tập Của Bạn</h2>
    @php
        $yeuCauBienTapLai = $banTinBT->where('TrangThai', 'Yêu Cầu Biên Tập Lại');
        $choKiemDuyet = $banTinBT->where('TrangThai', 'Chờ Kiểm Duyệt');
        $daXuatBan = $banTinBT->where('TrangThai', 'Đã Xuất Bản');
    @endphp
    @if($yeuCauBienTapLai->isNotEmpty())
        <h3 class="text-xl font-semibold mb-4">Yêu cầu biên tập lại</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            @foreach($yeuCauBienTapLai as $btins)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img class="w-full h-48 object-cover" src="{{ asset($btins->AnhDaiDien_BT) }}" alt="Ảnh đại diện" class="w-full h-32 object-cover rounded-lg mb-2">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold mb-2">{{ $btins->TieuDeBT_BT }}</h3>
                        <p class="text-gray-600 mb-2"><strong>Phóng viên:</strong> {{ $btins->TenPhongVien }}</p>
                        <p class="text-gray-600 mb-2"><strong>Phiên bản:</strong> {{ $btins->PhienBan }}</p>
                        <p class="text-gray-500 text-sm mt-2">
                            @php
                                preg_match('/<h2>(.*?)<\/h2>/', $btins->NoiDungBT_BT, $matches);
                                $h2Content = !empty($matches) ? strip_tags($matches[1]) : 'Bản tin hiện chưa có nội dung';
                            @endphp
                            <strong>{{ $h2Content }}</strong>
                        </p>
                        <p class="text-gray-600 mb-2"><strong>Ngày biên tập:</strong> {{ $btins->NgayBienTap }}</p>
                        <p class="text-gray-600 mb-2"><strong>Trạng thái:</strong> {{ $btins->TrangThai }}</p>
                        <a href="{{ route('bientap.editBanTinBienTap', $btins->MaBT_BT) }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded">
                            Biên Tập
                        </a>                        
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    @if($daXuatBan->isNotEmpty())
        <h3 class="text-xl font-semibold mb-4">Đã Xuất Bản</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            @foreach($daXuatBan as $btins)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img class="w-full h-48 object-cover" src="{{ asset($btins->AnhDaiDien_BT) }}" alt="Ảnh đại diện" class="w-full h-32 object-cover rounded-lg mb-2">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold mb-2">{{ $btins->TieuDeBT_BT }}</h3>
                        <p class="text-gray-600 mb-2"><strong>Phóng viên:</strong> {{ $btins->TenPhongVien }}</p>
                        <p class="text-gray-600 mb-2"><strong>Phiên bản:</strong> {{ $btins->PhienBan }}</p>
                        <p class="text-gray-500 text-sm mt-2">
                            @php
                                preg_match('/<h2>(.*?)<\/h2>/', $btins->NoiDungBT_BT, $matches);
                                $h2Content = !empty($matches) ? strip_tags($matches[1]) : 'Bản tin hiện chưa có nội dung';
                            @endphp
                            <strong>{{ $h2Content }}</strong>
                        </p>
                        <p class="text-gray-600 mb-2"><strong>Ngày biên tập:</strong> {{ $btins->NgayBienTap }}</p>
                        <p class="text-gray-600 mb-2"><strong>Trạng thái:</strong> {{ $btins->TrangThai }}</p>                      
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    @if($choKiemDuyet->isNotEmpty())
        <h3 class="text-xl font-semibold mb-4">Chờ Kiểm Duyệt</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($choKiemDuyet as $btins)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img class="w-full h-48 object-cover" src="{{ asset($btins->AnhDaiDien_BT) }}" alt="Ảnh đại diện" class="w-full h-32 object-cover rounded-lg mb-2">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold mb-2">{{ $btins->TieuDeBT_BT }}</h3>
                        <p class="text-gray-600 mb-2"><strong>Phóng viên:</strong> {{ $btins->TenPhongVien }}</p>
                        <p class="text-gray-600 mb-2"><strong>Phiên bản:</strong> {{ $btins->PhienBan }}</p>
                        <p class="text-gray-500 text-sm mt-2">
                            @php
                                preg_match('/<h2>(.*?)<\/h2>/', $btins->NoiDungBT_BT, $matches);
                                $h2Content = !empty($matches) ? strip_tags($matches[1]) : 'Bản tin hiện chưa có nội dung';
                            @endphp
                            <strong>{{ $h2Content }}</strong>
                        </p>
                        <p class="text-gray-600 mb-2"><strong>Ngày biên tập:</strong> {{ $btins->NgayBienTap }}</p>
                        <p class="text-gray-600 mb-2"><strong>Trạng thái:</strong> {{ $btins->TrangThai }}</p>
                        <a href="{{ route('bientap.editBanTinBienTap', $btins->MaBT_BT) }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded">
                            Biên Tập
                        </a>                        
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
