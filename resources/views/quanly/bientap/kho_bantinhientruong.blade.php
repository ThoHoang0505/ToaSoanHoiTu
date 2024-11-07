@extends('quanly.index')
@section('content')
<div class="mt-4">
    <h2 class="text-2xl font-semibold mb-4">Kho Bản Tin Hiện Trường</h2>
    @if($bantins->isEmpty())
        <p class="text-gray-700">Không có bản tin nào chờ biên tập.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            @foreach($bantins as $bantin)
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <img src="{{ asset($bantin->AnhDaiDien_HT) }}" alt="Thumbnail" class="w-full h-48 object-cover rounded-lg mb-2">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold">{{ $bantin->TieuDeBT_HT }}</h3>
                        <p class="text-gray-500 text-sm mt-2">
                            Loại Tin: <strong>
                                {{ optional($bantin->loaitin->chuyenMuc)->TenCM . ' - ' . ($bantin->loaitin->TenLT ?? 'Không xác định') }}
                            </strong>
                        </p>
                        <p class="text-gray-500 text-sm mt-2">
                            Phóng Viên: <strong>{{ $bantin->TenPhongVien }}</strong>
                        </p>
                        <p class="text-gray-500 text-sm mt-2">
                            Trạng Thái: <strong>{{ $bantin->TrangThai }}</strong>
                        </p>
                        <p class="text-gray-500 text-sm mt-4">{{ \Carbon\Carbon::parse($bantin->NgayDang_HT)->format('d/m/Y H:i') }}</p>
                        <div class="mt-4">
                            <a href="{{ route('bientap.edit', $bantin->MaBT_HT) }}" class="bg-blue-500 text-white px-4 py-2 rounded mt-4 inline-block">
                                Biên Tập
                            </a>                            
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
