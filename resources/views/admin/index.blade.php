<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Trang Quản Trị')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <div class="w-64 bg-gradient-to-b from-gray-900 to-gray-800 text-white shadow-lg p-5">
            <h2 class="text-2xl font-semibold mb-6">Quản Trị Viên</h2>
            <ul>
                <li class="mb-4">
                    <a href="{{ route('admin.index')}}" class="block py-2 px-4 rounded hover:bg-gray-700 transition duration-300">Dashboard</a>
                </li>
                <li class="mb-4">
                    <span class="text-lg font-semibold">Quản Lý Tài Khoản</span>
                    <ul class="ml-4">
                        <li class="mb-2">
                            <a href="{{ route('users.create') }}" class="block py-2 px-4 rounded hover:bg-gray-700 transition duration-300">Thêm Mới Tài Khoản</a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('users.index') }}" class="block py-2 px-4 rounded hover:bg-gray-700 transition duration-300">Chỉnh Sửa Tài Khoản</a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('admin.quyen') }}" class="block py-2 px-4 rounded hover:bg-gray-700 transition duration-300">Phân Quyền</a>
                        </li>
                    </ul>
                </li>
                <li class="mb-4">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-red-500 hover:text-red-300 transition duration-300">Đăng Xuất</button>
                    </form>
                </li>
            </ul>
        </div>
        <div class="flex-1 p-10 overflow-y-auto bg-white shadow-lg">
            @yield('content')
        </div>
    </div>
</body>
</html>
