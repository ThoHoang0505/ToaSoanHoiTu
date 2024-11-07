@extends('quanly.index')
@section('content')
    <h2 class="text-2xl font-semibold mb-4">Theo Dõi Bản Tin Xuất Bản</h2>
    @if($bantins->isEmpty())
        <p class="text-gray-600">Không có bản tin nào được xuất bản.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($bantins as $bantin)
                <div class="bg-white shadow-md rounded-lg p-4 border border-gray-300">
                    @if($bantin->AnhDaiDien_XB)
                        <img src="{{ asset($bantin->AnhDaiDien_XB) }}" alt="Ảnh Đại Diện" class="w-full h-32 object-cover rounded-lg mb-2">
                    @endif
                    <h3 class="text-xl font-semibold">{{ $bantin->TieuDeBT_XB }}</h3>
                    <p class="text-gray-600"><strong>Ngày Xuất Bản:</strong> {{ $bantin->NgayXuatBan }}</p>
                    <p class="text-gray-600"><strong>Phóng Viên:</strong> {{ $bantin->TenPhongVien_XB }}</p>
                    <p class="text-gray-600"><strong>Biên Tập Viên:</strong> {{ $bantin->TenBienTapVien_XB }}</p>
                    <p class="text-gray-600"><strong>Lượt Xem:</strong> {{ $bantin->LuotXem }}</p>
                    <div class="flex space-x-2 mt-4">
                        <a href="{{ route('bantin.show', $bantin->MaBT_XB) }}" 
                           target="_blank" 
                           class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-600">
                            Xem Trên Web
                        </a>
                        <a href="{{ route('bantin.xuatBanWord', $bantin->MaBT_XB) }}" 
                            class="bg-green-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-green-600">
                            Xuất Bản Báo Giấy
                         </a>
                         <a href="{{ route('bantin.postToFacebook', $bantin->MaBT_XB) }}" 
                            class="bg-purple-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-purple-600">
                             Xuất Bản Facebook
                         </a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
