<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký Tài Khoản</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto max-w-md bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-6 text-center">Đăng Ký Tài Khoản Độc Giả</h1>
        <form action="{{ route('register.post') }}" method="POST">
            @if ($errors->any())
                <div class="bg-red-500 text-white p-4 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @csrf
            <div class="mb-4">
                <label for="TenDG" class="block text-gray-700">Tên Độc Giả</label>
                <input type="text" name="TenDG" id="TenDG" class="w-full border rounded-lg p-3" required>
            </div>
            <div class="mb-4">
                <label for="TenDangNhap" class="block text-gray-700">Tên Đăng Nhập</label>
                <input type="text" name="TenDangNhap" id="TenDangNhap" class="w-full border rounded-lg p-3" required>
            </div>
            <div class="mb-4">
                <label for="Email" class="block text-gray-700">Email</label>
                <input type="email" name="Email" id="Email" class="w-full border rounded-lg p-3" required>
            </div>
            <div class="mb-4">
                <label for="NgaySinh" class="block text-gray-700">Ngày Sinh</label>
                <input type="date" name="NgaySinh" id="NgaySinh" class="w-full border rounded-lg p-3" required>
            </div>
            <div class="mb-4">
                <label for="SDT" class="block text-gray-700">Số Điện Thoại</label>
                <input type="text" name="SDT" id="SDT" class="w-full border rounded-lg p-3" required maxlength="10">
            </div>
            <div class="mb-4">
                <label for="DiaChi" class="block text-gray-700">Địa Chỉ</label>
                <input type="text" name="DiaChi" id="DiaChi" class="w-full border rounded-lg p-3" required>
            </div>
            <div class="mb-4">
                <label for="GioiTinh" class="block text-gray-700">Giới Tính</label>
                <select name="GioiTinh" id="GioiTinh" class="w-full border rounded-lg p-3" required>
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                    <option value="Khác">Khác</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Mật Khẩu</label>
                <input type="password" name="password" id="password" class="w-full border rounded-lg p-3" required>
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700">Xác Nhận Mật Khẩu</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="w-full border rounded-lg p-3" required>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white p-3 rounded-lg hover:bg-blue-700 transition duration-300">Đăng Ký</button>
        </form>
        <div class="mt-6 text-center">
            <p class="text-gray-600">Đã có tài khoản? <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Đăng nhập</a></p>
            <p class="text-gray-600"><a href="{{ route('welcome') }}" class="text-blue-500 hover:underline">Quay về trang chủ</a></p>
        </div>
    </div>
</body>
</html>
