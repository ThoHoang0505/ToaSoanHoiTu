@extends('quanly.index')
@section('content')
<div class="container mx-auto mt-8">
    <h2 class="text-2xl font-semibold mb-6">Danh Sách Bộ Phận</h2>
    <div class="mb-4">
        <a href="{{ route('quanly.bophan.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">Thêm Bộ Phận</a>
    </div>
    <div class="overflow-x-auto shadow-md rounded-lg">
        <table class="min-w-full bg-white">
            <thead>
                <tr class="bg-gray-800 text-white">
                    <th class="py-3 px-4 text-left">Mã Bộ Phận</th>
                    <th class="py-3 px-4 text-left">Tên Bộ Phận</th>
                    <th class="py-3 px-4 text-left">Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bophan as $bp)
                <tr class="border-b">
                    <td class="py-3 px-4">{{ $bp->MaBP }}</td>
                    <td class="py-3 px-4">{{ $bp->TenBP }}</td>
                    <td class="py-3 px-4">
                        <a href="{{ route('quanly.bophan.edit', $bp->MaBP) }}" class="text-blue-500 hover:underline">Sửa</a>
                        <form action="{{ route('quanly.bophan.destroy', $bp->MaBP) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
