@extends('quanly.index')

@section('content')
<div class="p-6 bg-white shadow-lg rounded-lg">
    <h2 class="text-2xl font-semibold mb-6">Quản Lý Nhuận Bút</h2>
    <table class="min-w-full bg-gray-100 text-left border border-gray-200 rounded-lg">
        <thead>
            <tr class="bg-gray-800 text-white">
                <th class="px-4 py-2">Mã Bản Tin</th>
                <th class="px-4 py-2">Tiêu Đề Bài Tin</th>
                <th class="px-4 py-2">Phóng Viên (Mã NV)</th>
                <th class="px-4 py-2">Biên Tập Viên (Mã NV)</th>
                <th class="px-4 py-2">Nhuận Bút Phóng Viên</th>
                <th class="px-4 py-2">Nhuận Bút Biên Tập Viên</th>
                <th class="px-4 py-2">Ngày Thanh Toán</th>
                <th class="px-4 py-2">Tình Trạng Thanh Toán</th>
                <th class="px-4 py-2">Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($nhuanButList as $nhuanBut)
            <tr class="hover:bg-gray-200 transition duration-200">
                <td class="border px-4 py-2">{{ $nhuanBut->MaBT_XB }}</td>
                <td class="border px-4 py-2">{{ $nhuanBut->TieuDeBT_XB }}</td>
                <td class="border px-4 py-2">{{ $nhuanBut->TenPhongVien }} ({{ $nhuanBut->MaPhongVien }})</td>
                <td class="border px-4 py-2">{{ $nhuanBut->TenBienTapVien }} ({{ $nhuanBut->MaBienTapVien }})</td>
                <td class="border px-4 py-2">{{ number_format($nhuanBut->NhuanButPhongVien) }} VND</td>
                <td class="border px-4 py-2">{{ number_format($nhuanBut->NhuanButBienTapVien) }} VND</td>
                <td class="border px-4 py-2">{{ $nhuanBut->NgayThanhToan ?? 'Chưa Thanh Toán' }}</td>
                <td class="border px-4 py-2">{{ $nhuanBut->TinhTrangThanhToan ?? 'Chưa Thanh Toán' }}</td>
                <td class="border px-4 py-2">
                    @if(!$nhuanBut->TinhTrangThanhToan)
                    <form action="{{ route('nhuanbut.update', $nhuanBut->MaBT_XB) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Đã Thanh Toán</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
