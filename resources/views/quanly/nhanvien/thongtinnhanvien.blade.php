@extends('quanly.index')

@section('content')
    <div class="max-w-lg mx-auto bg-white p-6 rounded shadow-lg">
        <h2 class="text-2xl font-semibold mb-4">Cập Nhật Thông Tin Cá Nhân</h2>
        @if($errors->any())
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('update') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Tên Nhân Viên</label>
                <input type="text" name="TenNV" value="{{ old('TenNV', $nhanvien->TenNV) }}" class="w-full p-2 border rounded">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Địa Chỉ</label>
                <input type="text" name="DiaChi_NV" value="{{ old('DiaChi_NV', $nhanvien->DiaChi_NV) }}" class="w-full p-2 border rounded">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Số Điện Thoại</label>
                <input type="text" name="SoDT_NV" value="{{ old('SoDT_NV', $nhanvien->SoDT_NV) }}" class="w-full p-2 border rounded" maxlength="10">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Ngày Sinh</label>
                <input type="date" name="NgaySinh_NV" value="{{ old('NgaySinh_NV', $nhanvien->NgaySinh_NV) }}" class="w-full p-2 border rounded">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Email</label>
                <input type="email" name="Email_NV" value="{{ old('Email_NV', $nhanvien->Email_NV) }}" class="w-full p-2 border rounded">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">CCCD</label>
                <input type="text" name="CCCD_NV" value="{{ old('CCCD_NV', $nhanvien->CCCD_NV) }}" class="w-full p-2 border rounded" maxlength="13">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Mật khẩu mới</label>
                <input type="password" name="password" class="w-full p-2 border rounded">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Xác nhận mật khẩu mới</label>
                <input type="password" name="password_confirmation" class="w-full p-2 border rounded">
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded">Cập Nhật</button>
        </form>
    </div>
@endsection
