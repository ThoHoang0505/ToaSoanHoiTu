@extends('admin.index')
@section('title', 'Thêm Mới Tài Khoản')
@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4">Thêm Mới Tài Khoản</h1>
        @if ($errors->any())
            <div class="mb-4">
                <ul class="bg-red-100 text-red-700 p-3 rounded">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="mb-4">
                <div class="bg-green-100 text-green-700 p-3 rounded">
                    {{ session('success') }}
                </div>
            </div>
        @endif
        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="TenDangNhap" class="block text-gray-700">Tên Đăng Nhập:</label>
                <input type="text" name="TenDangNhap" id="TenDangNhap" required class="mt-1 p-2 border border-gray-300 rounded w-full">
            </div>
            <div class="mb-4">
                <label for="MatKhau" class="block text-gray-700">Mật Khẩu:</label>
                <input type="password" name="MatKhau" id="MatKhau" required class="mt-1 p-2 border border-gray-300 rounded w-full">
            </div>
            <h2 class="text-xl font-semibold mb-2">Thông Tin Nhân Viên</h2>
            <div class="mb-4">
                <label for="TenNV" class="block text-gray-700">Tên Nhân Viên:</label>
                <input type="text" name="TenNV" id="TenNV" required class="mt-1 p-2 border border-gray-300 rounded w-full">
            </div>
            <div class="mb-4">
                <label for="MaCV_NV" class="block text-gray-700">Chức Vụ:</label>
                <select name="MaCV_NV" id="MaCV_NV" required class="mt-1 p-2 border border-gray-300 rounded w-full">
                    @foreach ($chucVus as $chucVu)
                        <option value="{{ $chucVu->MaCV }}">{{ $chucVu->TenChucVu }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="DiaChi_NV" class="block text-gray-700">Địa Chỉ:</label>
                <input type="text" name="DiaChi_NV" id="DiaChi_NV" required class="mt-1 p-2 border border-gray-300 rounded w-full">
            </div>
            <div class="mb-4">
                <label for="SoDT_NV" class="block text-gray-700">Số Điện Thoại:</label>
                <input type="text" name="SoDT_NV" id="SoDT_NV" required maxlength="10" class="mt-1 p-2 border border-gray-300 rounded w-full">
            </div>
            <div class="mb-4">
                <label for="NgaySinh_NV" class="block text-gray-700">Ngày Sinh:</label>
                <input type="date" name="NgaySinh_NV" id="NgaySinh_NV" required class="mt-1 p-2 border border-gray-300 rounded w-full">
            </div>
            <div class="mb-4">
                <label for="Email_NV" class="block text-gray-700">Email:</label>
                <input type="email" name="Email_NV" id="Email_NV" required class="mt-1 p-2 border border-gray-300 rounded w-full">
            </div>
            <div class="mb-4">
                <label for="CCCD_NV" class="block text-gray-700">CCCD:</label>
                <input type="text" name="CCCD_NV" id="CCCD_NV" required maxlength="13" class="mt-1 p-2 border border-gray-300 rounded w-full">
            </div>
            <div class="mb-4">
                <label for="GioiTinh_NV" class="block text-gray-700">Giới Tính:</label>
                <select name="GioiTinh_NV" id="GioiTinh_NV" required class="mt-1 p-2 border border-gray-300 rounded w-full">
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="Anh_NV" class="block text-gray-700">Ảnh Nhân Viên:</label>
                <input type="file" name="Anh_NV" id="Anh_NV" class="mt-1 p-2 border border-gray-300 rounded w-full">
            </div>
            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Thêm Mới</button>
        </form>
    </div>
@endsection
