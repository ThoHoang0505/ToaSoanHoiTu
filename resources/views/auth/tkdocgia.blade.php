<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật thông tin độc giả</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="max-w-lg mx-auto mt-10">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-md mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg shadow-md mb-4" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold mb-6 text-center text-gray-800">Cập nhật thông tin độc giả</h2>
            <form action="{{ route('account.update') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="TenDG" class="block text-sm font-medium text-gray-700">Tên độc giả</label>
                    <input type="text" name="TenDG" id="TenDG" value="{{ old('TenDG', $docGia->TenDG) }}" class="mt-1 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="Email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="Email" id="Email" value="{{ old('Email', $docGia->Email) }}" class="mt-1 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="NgaySinh" class="block text-sm font-medium text-gray-700">Ngày sinh</label>
                    <input type="date" name="NgaySinh" id="NgaySinh" value="{{ old('NgaySinh', $docGia->NgaySinh) }}" class="mt-1 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label for="SDT" class="block text-sm font-medium text-gray-700">Số điện thoại</label>
                    <input type="text" name="SDT" id="SDT" value="{{ old('SDT', $docGia->SDT) }}" class="mt-1 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500" maxlength="10">
                </div>
                <div class="mb-4">
                    <label for="DiaChi" class="block text-sm font-medium text-gray-700">Địa chỉ</label>
                    <input type="text" name="DiaChi" id="DiaChi" value="{{ old('DiaChi', $docGia->DiaChi) }}" class="mt-1 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label for="GioiTinh" class="block text-sm font-medium text-gray-700">Giới tính</label>
                    <select name="GioiTinh" id="GioiTinh" class="mt-1 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Chọn giới tính</option>
                        <option value="Nam" {{ old('GioiTinh', $docGia->GioiTinh) == 'Nam' ? 'selected' : '' }}>Nam</option>
                        <option value="Nữ" {{ old('GioiTinh', $docGia->GioiTinh) == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                        <option value="Khác" {{ old('GioiTinh', $docGia->GioiTinh) == 'Khác' ? 'selected' : '' }}>Khác</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Mật khẩu mới</label>
                    <input type="password" name="password" id="password" class="mt-1 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Xác nhận mật khẩu</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 p-3 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-300">Cập nhật</button>
            </form>
            <div class="mt-4 text-center">
                <a href="{{ route('welcome') }}" class="text-blue-500 hover:text-blue-600">Quay lại trang chủ</a>
            </div>
        </div>
    </div>
</body>
</html>
