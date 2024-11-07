@extends('layouts.app')

@section('content')
    <div class="flex justify-between p-6">
        <div class="flex-1 mx-10">
            <div class="container mx-auto mt-6">
                <h1 class="text-3xl font-bold mb-4">{{ $chuyenMuc->TenCM }}</h1>
                <p class="text-gray-700 mb-4">{{ $chuyenMuc->MoTa }}</p> 
                
                <h2 class="text-2xl font-semibold mb-4">Danh sách bản tin</h2>
                @if($bantins->isEmpty())
                    <p class="text-red-500">Không có bản tin nào trong chuyên mục này.</p>
                @else
                    <ul class="list-none pl-0">
                        @foreach($bantins as $bantin)
                        <a href="{{ route('bantin.show', $bantin->MaBT_XB) }}" class="block text-black-600">
                            <li class="flex mb-4 bg-white rounded-lg shadow-md p-4">
                                @if($bantin->AnhDaiDien_XB)
                                    <img src="{{ asset($bantin->AnhDaiDien_XB) }}" class="w-32 h-32 object-cover rounded-lg mr-4">
                                @endif
                                <div class="flex-1">
                                    <h2 class="text-xl font-semibold">
                                        {{ \Illuminate\Support\Str::limit($bantin->TieuDeBT_XB, 70, '...') }}
                                    </h2>
                                    <p class="text-gray-600">{{ \Illuminate\Support\Str::limit(strip_tags($bantin->NoiDungBT_XB), 150) }}</p>
                                    <p class="text-gray-500 text-sm">Tác giả: {{ $bantin->TenPhongVien_XB ?? 'Chưa có thông tin' }}</p>
                                    <p class="text-sm text-gray-500 mb-2">
                                        <span class="font-bold">
                                            {{ $bantin->loaiTin ? $bantin->loaiTin->chuyenMuc->TenCM : 'Chưa có loại tin' }} - 
                                            {{ $bantin->loaiTin ? $bantin->loaiTin->TenLT : 'Chưa có loại tin' }}
                                        </span> - 
                                        <span>{{ \Carbon\Carbon::parse($bantin->NgayXuatBan)->format('d/m/Y H:i') }}</span>
                                    </p>
                                </div>
                            </li>
                        </a>                        
                        @endforeach
                    </ul>
                    <div class="mt-4">
                        {{ $bantins->links() }}
                    </div>
                @endif
            </div>
        </div>
        
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var dropdownButton = document.getElementById('dropdownButton');
            var dropdownMenu = document.getElementById('dropdownMenu');
            
            dropdownButton.addEventListener('click', function () {
                dropdownMenu.classList.toggle('hidden');
            });
            window.addEventListener('click', function (e) {
                if (!dropdownButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
                    dropdownMenu.classList.add('hidden');
                }
            });
        });
    </script>
@endsection

