<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h1 class="text-2xl font-semibold text-center mb-6">Đăng Nhập</h1>
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4 text-center">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="TenDangNhap" class="block text-gray-700 font-semibold mb-2">Tên Đăng Nhập:</label>
                <input type="text" name="TenDangNhap" id="TenDangNhap" required
                       class="border border-gray-300 p-2 rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700 font-semibold mb-2">Mật Khẩu:</label>
                <input type="password" name="password" id="password" required
                       class="border border-gray-300 p-2 rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>
            <button type="submit" class="bg-blue-500 text-white font-semibold py-2 rounded w-full hover:bg-blue-600 transition duration-200">Đăng Nhập</button>
        </form>
        <div class="mt-4 text-center">
            <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Đăng ký tài khoản</a>
        </div>
        <div class="mt-2 text-center">
            <a href="{{ route('welcome') }}" class="text-blue-500 hover:underline">Quay về trang chủ</a>
        </div>
    </div>
</body>
</html>
