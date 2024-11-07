<link href="https://fonts.googleapis.com/css2?family=Noto+Serif:wght@400;700&display=swap" rel="stylesheet">
<style>
    body {
        background-color: #f9fafb;
        font-family: 'Noto Serif', serif;
    }
</style>
<div class="flex justify-between p-6">
    <div class="flex-1 mx-10">
        <div class="container mx-auto flex justify-center space-x-8">
            @if($bantins->isNotEmpty())
                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-blue-700 mb-6">Bản Tin Nổi Bật</h2>
                    @php
                        $topBantins = $bantins->sortByDesc('LuotXem')->take(3);
                    @endphp
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <a href="{{ route('bantin.show', ['MaBT_XB' => $topBantins->first()->MaBT_XB]) }}" 
                            class="col-span-1 md:col-span-2 p-6 rounded-lg bg-white shadow-md">
                            <h2 class="text-2xl font-bold mb-3">{{ $topBantins->first()->TieuDeBT_XB }}</h2>
                            <p class="mb-4">
                                <span class="font-bold">{{ $topBantins->first()->loaiTin ? $topBantins->first()->loaiTin->chuyenMuc->TenCM : 'Chưa có chuyên mục' }} 
                                - {{ $topBantins->first()->loaiTin ? $topBantins->first()->loaiTin->TenLT : 'Chưa có loại tin' }}</span> 
                                - <span>{{ \Carbon\Carbon::parse($topBantins->first()->NgayXuatBan)->format('d/m/Y H:i') }}</span>
                            </p>
                            @if($topBantins->first()->AnhDaiDien_XB)
                                <img src="{{ asset($topBantins->first()->AnhDaiDien_XB) }}" class="w-full h-96 object-cover rounded-lg mb-4">
                            @endif
                            <div class="prose line-clamp-3 text-gray-700">
                                {!! preg_match('/<h2>(.*?)<\/h2>/', $topBantins->first()->NoiDungBT_XB, $matches) ? $matches[1] : strip_tags(\Illuminate\Support\Str::limit($topBantins->first()->NoiDungBT_XB, 150)) !!}
                            </div>
                        </a>
                        <div class="md:col-span-1 flex flex-col">
                            @foreach($topBantins->slice(1) as $bantin)
                                <a href="{{ route('bantin.show', ['MaBT_XB' => $bantin->MaBT_XB]) }}" 
                                   class="p-6 rounded-lg bg-white shadow-md mb-1">
                                    <h2 class="text-xl font-semibold mb-2">{{ $bantin->TieuDeBT_XB }}</h2>
                                    <p class="mb-4">
                                        <span class="font-bold">{{ $bantin->loaiTin ? $bantin->loaiTin->chuyenMuc->TenCM : 'Chưa có chuyên mục' }} 
                                        - {{ $bantin->loaiTin ? $bantin->loaiTin->TenLT : 'Chưa có loại tin' }}</span> 
                                        - <span>{{ \Carbon\Carbon::parse($bantin->NgayXuatBan)->format('d/m/Y H:i') }}</span>
                                    </p>
                                    @if($bantin->AnhDaiDien_XB)
                                        <img src="{{ asset($bantin->AnhDaiDien_XB) }}" class="w-full h-48 object-cover rounded-lg mb-4">
                                    @endif
                                    <div class="prose line-clamp-3 text-gray-700">
                                        {!! preg_match('/<h2>(.*?)<\/h2>/', $bantin->NoiDungBT_XB, $matches) ? $matches[1] : strip_tags(\Illuminate\Support\Str::limit($bantin->NoiDungBT_XB, 150)) !!}
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <br>
                    <h2 class="text-3xl font-bold text-blue-700 mb-6">Bản Tin Theo Chuyên Mục</h2>
                    @php
                        $chuyenMucs = $bantins->groupBy('loaiTin.chuyenMuc.TenCM');
                    @endphp
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach($chuyenMucs as $tenChuyenMuc => $tinTucs)
                            <div>
                                <h3 class="text-2xl font-semibold text-green-800 mb-4 flex items-center">
                                    @if($tinTucs->first()->loaiTin && $tinTucs->first()->loaiTin->chuyenMuc->Icon)
                                        <img src="{{ asset($tinTucs->first()->loaiTin->chuyenMuc->Icon) }}" alt="Icon chuyên mục" class="w-8 h-8 mr-2">
                                    @endif
                                    <a href="{{ route('chuyenmuc.show', ['MaCM' => $tinTucs->first()->loaiTin->chuyenMuc->MaCM]) }}" class="hover:text-blue-700 transition-colors duration-300">
                                        {{ $tenChuyenMuc ?? 'Chưa có chuyên mục' }}
                                    </a>
                                </h3>
                                <div class="space-y-1">
                                    @foreach($tinTucs->take(3) as $bantin)
                                        <a href="{{ route('bantin.show', ['MaBT_XB' => $bantin->MaBT_XB]) }}" 
                                        class="block bg-white p-4 rounded-lg shadow-md hover:shadow-lg mb-1 tin-tuc-item">
                                            <h4 class="text-lg font-medium mb-1 font-bold" title="{{ $bantin->TieuDeBT_XB }}">{{ \Illuminate\Support\Str::limit($bantin->TieuDeBT_XB, 65, '...') }}</h4>
                                            <p class="text-sm text-gray-500 mb-2">
                                                <span class="font-bold">{{ $bantin->loaiTin ? $bantin->loaiTin->chuyenMuc->TenCM : 'Chưa có chuyên mục' }} 
                                                - {{ $bantin->loaiTin ? $bantin->loaiTin->TenLT : 'Chưa có loại tin' }}</span> - 
                                                <span>{{ \Carbon\Carbon::parse($bantin->NgayXuatBan)->format('d/m/Y H:i') }}</span>
                                            </p>
                                            @if($bantin->AnhDaiDien_XB)
                                                <img src="{{ asset($bantin->AnhDaiDien_XB) }}" class="w-full h-40 object-cover rounded-lg mb-4">
                                            @endif
                                            <div class="prose line-clamp-3 text-gray-700">
                                                {!! preg_match('/<h2>(.*?)<\/h2>/', $bantin->NoiDungBT_XB, $matches) ? 
                                                    strip_tags(\Illuminate\Support\Str::limit($matches[1], 70, '...')) : 
                                                    strip_tags(\Illuminate\Support\Str::limit($bantin->NoiDungBT_XB, 70)) !!}
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>                    
                </div>
            @endif
        </div>
    </div>
</div>
<style>
    .tin-tuc-item {
        height: 350px; 
    }
    .tin-tuc-item img {
        height: 150px; 
    }
    .tin-tuc-item div {
        overflow: hidden;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var dropdownButton = document.getElementById('dropdownButton');
        var dropdownMenu = document.getElementById('dropdownMenu');
        dropdownButton.addEventListener('click', function() {
            dropdownMenu.classList.toggle('hidden');
        });
        window.addEventListener('click', function(e) {
            if (!dropdownButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    });
</script>
