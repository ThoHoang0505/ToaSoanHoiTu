<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tòa Soạn Hội Tụ</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <style>
        body {
            background-color: #f9fafb;
            font-family: 'Noto Serif', serif;
        }
        .article-image {
            transition: transform 0.3s ease-in-out;
        }
        .article-image:hover {
            transform: scale(1.05);
        }
        .border-b-2 {
            border-bottom-width: 2px;
        }
        .border-blue-600 {
            border-color: #2563eb;
        }
        .active-category {
            text-decoration: underline; 
        }
        .submenu {
            position: absolute; 
            z-index: 10; 
            width: auto; 
            min-width: 200px; 
        }
        .menu-item {
            position: relative;
        }
        .menu-item .submenu {
            display: none; 
            position: absolute;
            top: 100%; 
            left: 0;
            background-color: #ffffff; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
            z-index: 10;
            min-width: 200px;
            border: 1px solid #ddd; 
        }
        .menu-item:hover .submenu {
            display: block; 
        }
        .menu-item a {
            padding: 10px 15px; 
            display: block; 
            color: #333; 
            text-decoration: none; 
        }
        .menu-item a:hover {
            background-color: #f1f1f1; 
        }
        .submenu a {
            padding: 10px 15px; 
            color: #333;
        }
        .submenu a:hover {
            background-color: #f1f1f1; 
        }
    </style>
</head>
<body class="bg-gray-100 p-6">
<nav class="bg-white shadow-md">
    <div class="container mx-auto flex flex-col md:flex-row justify-between items-center p-4">
        <a href="{{ route('welcome') }}">
            <img src="{{ asset('images/logo/logo-removebg-preview.png') }}" alt="" class="w-48 md:w-56 h-auto">
        </a>
        <form action="{{ route('search.page') }}" method="GET" class="w-full md:w-1/3 relative mt-4 md:mt-0" id="searchForm">
            <input type="text" name="q" id="searchInput" placeholder="Tìm kiếm bài viết..." 
            class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="submit" class="ml-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Tìm kiếm
            </button>
            <div id="searchResults" class="absolute z-10 bg-white shadow-lg rounded-lg mt-1 hidden"></div>
        </form>
        <nav class="flex items-center space-x-4 mt-4 md:mt-0">
            @if(Auth::check() && Auth::user()->Quyen == 'Độc Giả')
                <div class="relative inline-block text-left">
                    <button id="dropdownButton" class="flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 space-x-2">
                        <span>Xin chào, <span class="font-semibold">{{ Auth::user()->docgia->TenDG }}</span>!</span>
                        <span class="transform transition-transform duration-300 ease-in-out" id="arrow">
                            &#9662;
                        </span>
                    </button>
                    <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-56 bg-white rounded-md shadow-lg">
                        <a href="{{ route('account.edit') }}" class="block px-4 py-2 text-sm hover:bg-gray-100">Cập Nhật Tài Khoản</a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm hover:bg-gray-100">Đăng Xuất</button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Đăng Nhập</a>
                <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Đăng Ký</a>
            @endif
        </nav>
    </div>
</nav>
<nav class="bg-gray-200 py-3">
    <div class="container mx-auto flex flex-col md:flex-row justify-center space-x-0 md:space-x-8 relative">
        <a href="{{ route('welcome') }}" class="hover:text-blue-600 font-semibold {{ request()->is('/') ? 'border-b-2 border-blue-600' : '' }} py-2">
            <i class="fas fa-home mr-2"></i>
            Trang Chủ
        </a>        
        @foreach($chuyenmuc as $chuyenMuc)
            <div class="relative menu-item group">
                <a href="{{ route('chuyenmuc.show', $chuyenMuc->MaCM) }}" class="hover:text-blue-600 font-semibold {{ isset($currentChuyenMuc) && $currentChuyenMuc->MaCM == $chuyenMuc->MaCM ? 'border-b-2 border-blue-600' : '' }} py-2" onclick="toggleSubmenu(event, '{{ $chuyenMuc->MaCM }}', this)">
                    {{ $chuyenMuc->TenCM }}
                </a>
                <div id="submenu-{{ $chuyenMuc->MaCM }}" class="submenu bg-white shadow-lg mt-2 hidden">
                    @php
                        $loaiTinList = $chuyenMuc->loaiTin;
                    @endphp
                    @if($loaiTinList && $loaiTinList->count() > 0)
                        @foreach($loaiTinList as $loaiTin)
                            <a href="{{ route('loaitin.show', $loaiTin->MaLT) }}" class="block px-4 py-2 hover:bg-gray-100">
                                {{ $loaiTin->TenLT }}
                            </a>
                        @endforeach
                    @else
                        <span class="block px-4 py-2">Không có loại tin nào</span>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</nav>
<script>
    $(document).ready(function() {
        $('#searchInput').on('input', function() {
            const query = $(this).val();
            if (query.length > 0) {
                $.ajax({
                    url: '{{ route('search') }}',
                    method: 'GET',
                    data: { q: query },
                    success: function(data) {
                        $('#searchResults').empty().removeClass('hidden');
                        if (data.bantins.length > 0) {
                            data.bantins.forEach(function(item) {
                                $('#searchResults').append(`
                                    <a href="/bantin/${item.MaBT_XB}" class="block px-4 py-2 hover:bg-gray-100">${item.TieuDeBT_XB}</a>
                                `);
                            });
                            if (data.totalCount > 5) {
                                $('#searchResults').append('<div class="px-4 py-2 text-gray-500">...</div>');
                            }
                        } else {
                            $('#searchResults').append('<div class="px-4 py-2 text-gray-500">Không tìm thấy bài viết nào.</div>');
                        }
                    },
                    error: function() {
                        $('#searchResults').empty().removeClass('hidden').append('<div class="px-4 py-2 text-red-500">Có lỗi xảy ra.</div>');
                    }
                });
            } else {
                $('#searchResults').empty().addClass('hidden');
            }
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        const menuItems = document.querySelectorAll('.menu-item');
        menuItems.forEach(item => {
            let timeout;
            item.addEventListener('mouseenter', function() {
                const submenu = this.querySelector('.submenu');
                clearTimeout(timeout); 
                if (submenu) submenu.style.display = 'block';
            });
            item.addEventListener('mouseleave', function() {
                const submenu = this.querySelector('.submenu');
                timeout = setTimeout(function() {
                    if (submenu) submenu.style.display = 'none';
                }, 20); 
            });
        });
    });
</script>
</body>
</html>
