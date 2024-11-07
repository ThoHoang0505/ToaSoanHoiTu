@extends('quanly.index')
@section('content')
<div class="container mx-auto mt-8">
    <h2 class="text-2xl font-semibold mb-6">Hiệu Suất Kiểm Duyệt Viên</h2>
    <div class="overflow-x-auto shadow-md rounded-lg">
        <table class="min-w-full bg-white">
            <thead>
                <tr class="bg-gray-800 text-white">
                    <th class="py-3 px-4 text-left">Mã Nhân Viên</th>
                    <th class="py-3 px-4 text-left">Tên Nhân Viên</th>
                    <th class="py-3 px-4 text-left">Số Bản Tin Đã Kiểm Duyệt</th>
                    <th class="py-3 px-4 text-left">Số Bản Tin Trong Ngày</th>
                    <th class="py-3 px-4 text-left">Số Bản Tin Trong Tháng</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kiemDuyetVienHieuSuat as $kiemDuyetVien)
                    <tr class="border-b">
                        <td class="py-3 px-4">{{ $kiemDuyetVien->MaNV }}</td>
                        <td class="py-3 px-4">{{ $kiemDuyetVien->TenNV }}</td>
                        <td class="py-3 px-4">{{ $kiemDuyetVien->soBanTinDaKiemDuyet }}</td>
                        <td class="py-3 px-4">{{ $kiemDuyetVien->soBanTinTrongNgay }}</td>
                        <td class="py-3 px-4">{{ $kiemDuyetVien->soBanTinTrongThang }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-3 px-4 text-center">Không có dữ liệu</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
