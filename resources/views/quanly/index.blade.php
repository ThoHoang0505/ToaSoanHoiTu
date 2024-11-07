<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.3.0/raphael.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
</head>
<body class="bg-gray-100 min-h-screen flex">
<div class="flex flex-1">
<div class="w-64 bg-gray-900 text-white shadow-lg flex flex-col">
        <div class="p-6">
            <h2 class="text-2xl font-semibold">Tòa Soạn Hội Tụ</h2>
        </div>
        <ul class="mt-6 space-y-2 flex-1 overflow-y-auto ">
            @if(Auth::user()->Quyen !== 'Độc Giả')
                @php
                     $userId = Auth::id();
                        $quyenNhanVien = DB::table('taikhoan as tk')
                            ->join('nhanvien as nv', 'tk.MaTK', '=', 'nv.MaTK_NV')
                            ->join('chucvu as cv', 'nv.MaCV_NV', '=', 'cv.MaCV')
                            ->join('phanquyen as pq', 'cv.MaCV', '=', 'pq.ChucVu_PhanQuyen')
                            ->join('quyen as q', 'pq.MaQuyen_PhanQuyen', '=', 'q.MaQuyen')
                            ->where('tk.MaTK', Auth::user()->MaTK)
                            ->where('q.TenQuyen', 'Quản Lý Nhân Viên')
                            ->exists();
                        $quyenDanhMuc = DB::table('taikhoan as tk')
                            ->join('nhanvien as nv', 'tk.MaTK', '=', 'nv.MaTK_NV')
                            ->join('chucvu as cv', 'nv.MaCV_NV', '=', 'cv.MaCV')
                            ->join('phanquyen as pq', 'cv.MaCV', '=', 'pq.ChucVu_PhanQuyen')
                            ->join('quyen as q', 'pq.MaQuyen_PhanQuyen', '=', 'q.MaQuyen')
                            ->where('tk.MaTK', Auth::user()->MaTK)
                            ->where('q.TenQuyen', 'Quản Lý Danh Mục')
                            ->exists();
                        $quyenDangTin = DB::table('taikhoan as tk')
                            ->join('nhanvien as nv', 'tk.MaTK', '=', 'nv.MaTK_NV')
                            ->join('chucvu as cv', 'nv.MaCV_NV', '=', 'cv.MaCV')
                            ->join('phanquyen as pq', 'cv.MaCV', '=', 'pq.ChucVu_PhanQuyen')
                            ->join('quyen as q', 'pq.MaQuyen_PhanQuyen', '=', 'q.MaQuyen')
                            ->where('tk.MaTK', Auth::user()->MaTK)
                            ->where('q.TenQuyen', 'Đăng Tải Bản Tin Hiện Trường')
                            ->exists();
                        $quyenBienSoan = DB::table('taikhoan as tk')
                            ->join('nhanvien as nv', 'tk.MaTK', '=', 'nv.MaTK_NV')
                            ->join('chucvu as cv', 'nv.MaCV_NV', '=', 'cv.MaCV')
                            ->join('phanquyen as pq', 'cv.MaCV', '=', 'pq.ChucVu_PhanQuyen')
                            ->join('quyen as q', 'pq.MaQuyen_PhanQuyen', '=', 'q.MaQuyen')
                            ->where('tk.MaTK', Auth::user()->MaTK)
                            ->where('q.TenQuyen', 'Biên Soạn')
                            ->exists();
                        $quyenKiemDuyet = DB::table('taikhoan as tk')
                            ->join('nhanvien as nv', 'tk.MaTK', '=', 'nv.MaTK_NV')
                            ->join('chucvu as cv', 'nv.MaCV_NV', '=', 'cv.MaCV')
                            ->join('phanquyen as pq', 'cv.MaCV', '=', 'pq.ChucVu_PhanQuyen')
                            ->join('quyen as q', 'pq.MaQuyen_PhanQuyen', '=', 'q.MaQuyen')
                            ->where('tk.MaTK', Auth::user()->MaTK)
                            ->where('q.TenQuyen', 'Kiểm Duyệt')
                            ->exists();
                        $quyenHieuSuat = DB::table('taikhoan as tk')
                            ->join('nhanvien as nv', 'tk.MaTK', '=', 'nv.MaTK_NV')
                            ->join('chucvu as cv', 'nv.MaCV_NV', '=', 'cv.MaCV')
                            ->join('phanquyen as pq', 'cv.MaCV', '=', 'pq.ChucVu_PhanQuyen')
                            ->join('quyen as q', 'pq.MaQuyen_PhanQuyen', '=', 'q.MaQuyen')
                            ->where('tk.MaTK', Auth::user()->MaTK)
                            ->where('q.TenQuyen', 'Theo Dõi Hiệu Suất')
                            ->exists();    
                        $quyenNhuanBut = DB::table('taikhoan as tk')
                            ->join('nhanvien as nv', 'tk.MaTK', '=', 'nv.MaTK_NV')
                            ->join('chucvu as cv', 'nv.MaCV_NV', '=', 'cv.MaCV')
                            ->join('phanquyen as pq', 'cv.MaCV', '=', 'pq.ChucVu_PhanQuyen')
                            ->join('quyen as q', 'pq.MaQuyen_PhanQuyen', '=', 'q.MaQuyen')
                            ->where('tk.MaTK', Auth::user()->MaTK)
                            ->where('q.TenQuyen', 'Quản Lý Nhuận Bút')
                            ->exists();    
                        $quyenKDComment = DB::table('taikhoan as tk')
                            ->join('nhanvien as nv', 'tk.MaTK', '=', 'nv.MaTK_NV')
                            ->join('chucvu as cv', 'nv.MaCV_NV', '=', 'cv.MaCV')
                            ->join('phanquyen as pq', 'cv.MaCV', '=', 'pq.ChucVu_PhanQuyen')
                            ->join('quyen as q', 'pq.MaQuyen_PhanQuyen', '=', 'q.MaQuyen')
                            ->where('tk.MaTK', Auth::user()->MaTK)
                            ->where('q.TenQuyen', 'Kiểm Duyệt Bình Luận')
                            ->exists();    
                @endphp
                <li>
                    <a href="{{ route('thongke') }}" class="block px-4 py-2 rounded hover:bg-gray-700 transition duration-300">Dashboard</a>
                </li>                
                @if($quyenNhanVien)
                    <li>
                        <a href="{{ route('quanly.nhanvien') }}" 
                           class="block px-4 py-2 rounded hover:bg-gray-700 transition duration-300">
                           Quản Lý Nhân Viên
                        </a>
                    </li>
                @endif
                @if($quyenNhuanBut)
                    <li class="mt-6">
                        <a href="{{ route('quanly.nhuanbut') }}" class="block px-4 py-2 rounded hover:bg-gray-700 transition duration-300">Quản Lý Nhuận Bút</a>
                    </li>
                @endif
                @if($quyenHieuSuat)
                    <li>
                        <div class="px-4 py-2 rounded hover:bg-gray-700 transition duration-300">
                            <span class="block">Hiệu Suất Nhân Viên</span>
                            <ul class="ml-4 mt-2 space-y-2">
                                <li>
                                    <a href="{{ route('hieusuat.phongvien') }}" 
                                        class="block px-4 py-2 rounded hover:bg-gray-700 transition duration-300">
                                        Hiệu Suất Phóng Viên
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('hieusuat.bientapvien') }}" 
                                        class="block px-4 py-2 rounded hover:bg-gray-700 transition duration-300">
                                        Hiệu Suất Biên Tập Viên
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('hieusuat.kiemduyetvien') }}" 
                                        class="block px-4 py-2 rounded hover:bg-gray-700 transition duration-300">
                                        Hiệu Suất Kiểm Duyệt Viên
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
                @if($quyenDanhMuc)
                    <li>
                        <div class="px-4 py-2 rounded hover:bg-gray-700 transition duration-300">
                            <span class="block">Quản Lý Danh Mục</span>
                            <ul class="ml-4 mt-2 space-y-2">
                                <li>
                                    <a href="{{ route('quanly.chuyenmuc.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700 transition duration-300">Chuyên Mục</a>
                                </li>
                                <li>
                                    <a href="{{ route('quanly.loaitin.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700 transition duration-300">Danh Mục Loại Tin</a>
                                </li>
                                <li>
                                    <a href="{{ route('quanly.nentang.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700 transition duration-300">Danh Mục Nền Tảng</a>
                                </li>
                                <li>
                                    <a href="{{ route('quanly.bophan.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700 transition duration-300">Danh Mục Bộ Phận</a>
                                </li>
                                <li>
                                    <a href="{{ route('quanly.chucvu.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700 transition duration-300">Danh Mục Chức Vụ</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
                @if($quyenDangTin)
                    <li>
                        <a href="{{ route('quanly.bantin.dangtai') }}" class="block px-4 py-2 rounded hover:bg-gray-700 transition duration-300">Đăng Tải Bản Tin</a>
                    </li>                    
                    <li>
                        <a href="{{ route('bantin.cua_ban') }}" class="block px-4 py-2 rounded hover:bg-gray-700 transition duration-300">Bản Tin Của Bạn</a>
                    </li>
                @endif
                @if($quyenBienSoan)
                    <li>
                        <a href="{{ route('quanly.bantin.kho') }}" class="block px-4 py-2 rounded hover:bg-gray-700 transition duration-300">Kho Tin Hiện Trường</a>
                    </li>                   
                    <li>
                        <a href="{{ route('bientap.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700 transition duration-300">
                            Bản Tin Biên Tập Của Bạn
                            @if(isset($soLuongYeuCauBienTapLai) && $soLuongYeuCauBienTapLai > 0)
                                <span class="ml-2 bg-red-500 text-white text-sm px-2 py-1 rounded-full">
                                    {{ $soLuongYeuCauBienTapLai }}
                                </span>
                            @endif
                        </a>
                    </li>                    
                @endif
                @if($quyenKiemDuyet)
                    <li>
                        <a href="{{ route('kiemduyet.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700 transition duration-300">Bản Tin Chờ Kiểm Duyệt</a>
                    </li>                    
                    <li>
                        <a href="{{ route('kiemduyet.theodoi') }}" class="block px-4 py-2 rounded hover:bg-gray-700 transition duration-300">Bản Tin Đã Xuất Bản</a>
                    </li>
                @endif
                @if($quyenKDComment)                   
                    <li>
                        <a href="{{ route('comments.chokd')}}" class="block px-4 py-2 rounded hover:bg-gray-700 transition duration-300">Kiểm Duyệt Bình Luận</a>
                    </li>
                @endif
            @endif
        </ul>
    </div>
    <div class="flex-1 p-6 bg-white shadow-lg overflow-y-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-semibold text-gray-800">Trang Quản Lý</h1>
            <div class="relative">
                <button id="dropdownToggle" class="flex items-center focus:outline-none">
                    <span class="mr-2 text-lg text-gray-700">Xin chào, {{ Auth::user()->nhanvien->TenNV }}</span>
                    <img src="{{ asset(Auth::user()->nhanvien->Anh_NV) }}" alt="avatar" class="w-10 h-10 rounded-full">
                </button>
                <div id="dropdownMenu" class="absolute right-0 z-10 hidden bg-white shadow-lg rounded mt-2 overflow-hidden border border-gray-200">
                    <a href="{{ route('thongtinnv') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200 transition duration-300">Quản Lý Thông Tin</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-red-600 hover:text-white transition duration-300">Đăng Xuất</button>
                    </form>
                </div>
            </div>
        </div>
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 mb-4 rounded">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="bg-red-500 text-white p-4 mb-4 rounded">{{ session('error') }}</div>
        @endif
        @yield('content')
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dropdownToggle = document.getElementById('dropdownToggle');
            const dropdownMenu = document.getElementById('dropdownMenu');
            dropdownToggle.addEventListener('click', function () {
                dropdownMenu.classList.toggle('hidden');
            });
            window.addEventListener('click', function(event) {
                if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html>
