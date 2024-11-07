@extends('quanly.index')

@section('content')
<div class="mt-6">
    <h2 class="text-2xl font-semibold">Thống Kê</h2>
    <div id="myChart" style="height: 250px;"></div>
    <div class="mt-4">
        <p>Tổng số lượt xem bản tin: <strong>{{ $totalViews }}</strong></p>
        <p>Tổng số bình luận: <strong>{{ $totalComments }}</strong></p>
    </div>
</div>

<script>
    $(document).ready(function() {
        const chartData = @json($chartData);
        const morrisData = chartData.map(item => ({
            date: item.date,
            views: item.views,
            comments: item.comments
        }));
        new Morris.Line({
            element: 'myChart',
            data: morrisData,
            xkey: 'date',
            ykeys: ['views', 'comments'],
            labels: ['Lượt Xem', 'Bình Luận'],
            lineColors: ['#0b62a4', '#7a92a3'],
            resize: true
        });
    });
</script>
@endsection
