@extends('quanly.index')
@section('content')
<div class="container mx-auto mt-8 px-6">
    <h2 class="text-2xl font-semibold mb-6 text-gray-800">Chi tiết nhân viên: {{ $nhanVien->TenNV }}</h2>
    <div id="errorMessages" class="mb-4 text-red-500 text-sm"></div>
    <form action="{{ route('quanly.nhanvien.update', $nhanVien->MaNV) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="TenNV" class="block text-sm font-medium text-gray-700">Tên nhân viên</label>
                <input type="text" id="TenNV" name="TenNV" value="{{ old('TenNV', $nhanVien->TenNV) }}" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('TenNV')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="DiaChi_NV" class="block text-sm font-medium text-gray-700">Địa chỉ</label>
                <input type="text" id="DiaChi_NV" name="DiaChi_NV" value="{{ old('DiaChi_NV', $nhanVien->DiaChi_NV) }}" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('DiaChi_NV')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="SoDT_NV" class="block text-sm font-medium text-gray-700">Số điện thoại</label>
                <input type="text" id="SoDT_NV" name="SoDT_NV" pattern="\d*" title="Vui lòng chỉ nhập số" value="{{ old('SoDT_NV', $nhanVien->SoDT_NV) }}" required maxlength="10" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('SoDT_NV')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="NgaySinh_NV" class="block text-sm font-medium text-gray-700">Ngày sinh</label>
                <input type="date" id="NgaySinh_NV" name="NgaySinh_NV" value="{{ old('NgaySinh_NV', $nhanVien->NgaySinh_NV) }}" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('NgaySinh_NV')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="Email_NV" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="Email_NV" name="Email_NV" value="{{ old('Email_NV', $nhanVien->Email_NV) }}" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('Email_NV')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="CCCD_NV" class="block text-sm font-medium text-gray-700">CCCD</label>
                <input type="text" id="CCCD_NV" name="CCCD_NV" pattern="\d*" title="Vui lòng chỉ nhập số" value="{{ old('CCCD_NV', $nhanVien->CCCD_NV) }}" required maxlength="13" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('CCCD_NV')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="GioiTinh_NV" class="block text-sm font-medium text-gray-700">Giới tính</label>
                <select id="GioiTinh_NV" name="GioiTinh_NV" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="Nam" {{ $nhanVien->GioiTinh_NV == 'Nam' ? 'selected' : '' }}>Nam</option>
                    <option value="Nữ" {{ $nhanVien->GioiTinh_NV == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                </select>
            </div>
            <div>
                <label for="Anh_NV" class="block text-sm font-medium text-gray-700">Ảnh nhân viên</label>
                <input type="file" id="Anh_NV" name="Anh_NV" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:border-0 file:text-sm file:font-semibold file:bg-blue-500 file:text-white hover:file:bg-blue-600">
                @if ($nhanVien->Anh_NV)
                    <div class="mt-2">
                        <img src="{{ asset($nhanVien->Anh_NV) }}" alt="Ảnh nhân viên" class="w-32 h-32 object-cover rounded-full border">
                    </div>
                @endif
            </div>
        </div>
        <div class="mt-6 flex justify-end space-x-4">
            <a href="{{ route('quanly.nhanvien') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition duration-300">Quay lại</a>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">Cập nhật</button>
        </div>
    </form>
</div>
@endsection