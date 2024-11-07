@extends('quanly.index')
@section('content')
<div class="p-6 bg-white shadow-lg rounded-lg">
    <h2 class="text-2xl font-semibold mb-6">Danh Sách Nhân Viên</h2>
    <form action="{{ route('quanly.nhanvien') }}" method="GET">
        <div class="mb-4">
            <input type="text" name="search" id="search" placeholder="Tìm kiếm theo tên nhân viên" value="{{ request()->get('search') }}" class="border rounded-lg px-4 py-2 w-full" />
        </div>
    </form>
    <table class="min-w-full bg-gray-100 text-left border border-gray-200 rounded-lg" id="employeeTable">
        <thead>
            <tr class="bg-gray-800 text-white">
                <th class="px-4 py-2">Mã NV</th>
                <th class="px-4 py-2">Tên Nhân Viên</th>
                <th class="px-4 py-2">Ngày Sinh</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Chức Vụ</th>
                <th class="px-4 py-2">Tên Đăng Nhập</th>
                <th class="px-4 py-2">Hành Động</th>
            </tr>
        </thead>
        <tbody>
        @if($nhanVienList->count() > 0)
            @foreach ($nhanVienList as $nhanVien)
                <tr class="hover:bg-gray-200 transition duration-200">
                    <td class="border px-4 py-2">{{ $nhanVien->MaNV }}</td>
                    <td class="border px-4 py-2">{{ $nhanVien->TenNV }}</td>
                    <td class="border px-4 py-2">{{ $nhanVien->NgaySinh_NV }}</td>
                    <td class="border px-4 py-2">{{ $nhanVien->Email_NV }}</td>
                    <td class="border px-4 py-2">{{ $nhanVien->TenChucVu }}</td>
                    <td class="border px-4 py-2">{{ $nhanVien->TenDangNhap }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('nhanvien.show', $nhanVien->MaNV) }}" class="text-blue-500 hover:text-blue-700">Xem Chi Tiết</a>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="7" class="border px-4 py-2 text-center">Không tìm thấy nhân viên</td>
            </tr>
        @endif
        </tbody>
    </table>
    <div class="mt-4">
        {{ $nhanVienList->appends(request()->query())->links() }}
    </div>
</div>
@endsection
