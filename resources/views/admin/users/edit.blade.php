@extends('admin.index')
@section('title', 'Danh Sách Tài Khoản')
@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-semibold mb-6">Danh Sách Tài Khoản</h1>
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mb-4">
            <form action="{{ route('users.index') }}" method="GET" class="flex">
                <input type="text" id="searchInput" name="search" placeholder="Tìm kiếm theo tên đăng nhập" class="border p-2 w-full rounded-lg" value="{{ request('search') }}">
            </form>
        </div>
        <div class="overflow-x-auto shadow-md rounded-lg">
            <table class="min-w-full bg-white">
                <thead>
                    <tr class="bg-gray-800 text-white">
                        <th class="py-3 px-4 text-left">Mã Tài Khoản</th>
                        <th class="py-3 px-4 text-left">Tên Đăng Nhập</th>
                        <th class="py-3 px-4 text-left">Chức Vụ</th>
                        <th class="py-3 px-4 text-left">Mật Khẩu</th>
                        <th class="py-3 px-4 text-left">Đổi Chức Vụ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr class="border-b hover:bg-gray-100 transition duration-150">
                            <td class="py-3 px-4">{{ $user->MaTK }}</td>
                            <td class="py-3 px-4 username">{{ $user->TenDangNhap }}</td>
                            <td class="py-3 px-4" id="roleDisplay{{ $user->MaTK }}">{{ $user->Quyen }}</td>
                            <td class="py-3 px-4">
                                <button type="button" class="bg-yellow-500 text-white py-1 px-2 rounded-lg text-sm font-semibold hover:bg-yellow-600 transition duration-200" onclick="togglePasswordForm('passwordForm{{ $user->MaTK }}')">*****</button>
                                <form id="passwordForm{{ $user->MaTK }}" action="{{ route('users.doiMatKhau', $user->MaTK) }}" method="POST" class="hidden mt-2">
                                    @csrf
                                    <input type="text" name="MatKhau" placeholder="Nhập mật khẩu mới" required class="border p-2 rounded-lg w-full">
                                    <button type="submit" class="bg-blue-500 text-white py-1 px-4 rounded-lg text-sm font-semibold hover:bg-blue-600 transition duration-200">Cập nhật</button>
                                </form>
                            </td>
                            <td class="py-3 px-4 flex space-x-2">
                                <form action="{{ route('users.doiChucVu', $user->MaTK) }}" method="POST" class="inline">
                                    @csrf
                                    <select name="Quyen" class="border p-2 rounded-lg" onchange="this.form.submit()">
                                        @foreach($chucVus as $chucVu)
                                            <option value="{{ $chucVu->MaCV }}" {{ $user->Quyen == $chucVu->TenChucVu ? 'selected' : '' }}>{{ $chucVu->TenChucVu }}</option>
                                        @endforeach
                                    </select>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function togglePasswordForm(formId) {
            const form = document.getElementById(formId);
            form.classList.toggle('hidden');
        }
    </script>
@endsection
