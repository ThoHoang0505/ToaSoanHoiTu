@extends('admin.index')
@section('content')
<div class="container mx-auto mt-5">
    <h2 class="text-2xl font-semibold mb-4">Quản Lý Quyền</h2>
    @if ($errors->any())
        <div class="mb-4">
            <ul class="bg-red-200 text-red-800 p-3 rounded">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="mb-4 bg-green-200 text-green-800 p-3 rounded">
            {{ session('success') }}
        </div>
    @endif
    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
        <thead>
            <tr class="bg-gray-800 text-white">
                <th class="px-4 py-2">Chức vụ</th>
                <th class="px-4 py-2">Quyền</th>
                <th class="px-4 py-2">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($chucVus as $chucVu)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $chucVu->TenChucVu }}</td>
                    <td class="px-4 py-2">
                        <ul class="danhsachquyen" data-chuc-vu-id="{{ $chucVu->MaCV }}">
                            @foreach($chucVu->quyen as $quyen)
                                <li class="inline-flex items-center bg-blue-500 text-white rounded-full px-2 py-1 mr-2" data-quyen-id="{{ $quyen->MaQuyen }}">
                                    {{ $quyen->TenQuyen }}
                                    <form action="/phanquyen/xoa-quyen" method="POST" class="inline">
                                        @csrf
                                        <input type="hidden" name="chucVuId" value="{{ $chucVu->MaCV }}">
                                        <input type="hidden" name="quyenId" value="{{ $quyen->MaQuyen }}">
                                        <button type="submit" class="ml-2 text-red-500">X</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    </td>
                    <td class="px-4 py-2">
                        <form action="/phanquyen/them-quyen" method="POST">
                            @csrf
                            <select class="form-control" name="quyenId">
                                <option value="">Chọn quyền để thêm</option>
                                @foreach($Quyen as $quyen)
                                    <option value="{{ $quyen->MaQuyen }}">{{ $quyen->TenQuyen }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" name="chucVuId" value="{{ $chucVu->MaCV }}">
                            <button type="submit" class="mt-2 bg-blue-500 text-white rounded-lg px-4 py-2 hover:bg-blue-600">Thêm Quyền</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
