@extends('admin.templates.layout')

@section('content')
<main class="min-h-screen bg-[#f3e3cf] p-4 md:ml-64 h-auto pt-20">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 justify-center mb-5">
        <div class="flex justify-between p-5 bg-white rounded-lg shadow text-zinc-800">
            <div>
                <ion-icon name="time-outline" class="text-6xl text-teal-500 mb-2"></ion-icon>
                <h1 class="text-sm font-semibold">Order Waiting</h1>
            </div>
            <h1 class="text-5xl my-auto">
                {{ $waiting }}
            </h1>
        </div>
        <div class="flex justify-between p-5 bg-white rounded-lg shadow text-zinc-800">
            <div>
                <ion-icon name="checkmark-done-outline" class="text-6xl text-blue-500 mb-2"></ion-icon>
                <h1 class="text-sm font-semibold">Order Confirmed</h1>
            </div>
            <h1 class="text-5xl my-auto">
                {{ $confirmed }}
            </h1>
        </div>
        <div class="flex justify-between p-5 bg-white rounded-lg shadow text-zinc-800">
            <div>
                <ion-icon name="close-circle-outline" class="text-6xl text-red-500 mb-2"></ion-icon>
                <h1 class="text-sm font-semibold">Order Canceled</h1>
            </div>
            <h1 class="text-5xl my-auto">
                {{ $canceled }}
            </h1>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2">
        <div class="bg-white p-10 rounded-lg shadow">
            <h1 class="text-2xl">Pie Chart Orders</h1>
            <div class="flex justify-center mt-8">
                <canvas id="orderStatusChart" width="300" height="300"></canvas>
            </div>
        </div>
    </div>
    
    @foreach ($notif as $item)    
    <div id="toast-notification" class="fixed bottom-2 md:bottom-10 right-2 md:right-10 w-full max-w-xs text-gray-900 bg-white rounded-lg overflow-hidden shadow-xl border" role="alert">
        <div class="bg-[#c4ad92] p-2 flex items-center">
            <span class="mb-1 text-sm font-semibold text-white">New order</span>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white justify-center items-center flex-shrink-0 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8" data-dismiss-target="#toast-notification" aria-label="Close">
                <ion-icon name="close"></ion-icon>
            </button>
        </div>
        <div class="flex items-center p-4">
            <div class="ms-3 text-sm font-normal">
                <div class="text-sm font-semibold text-gray-900">{{ $item->name }}</div>
                <div class="text-sm font-normal mb-2">{{ $item->product->name }}({{ $item->warna }}) - {{ $item->banyak_payet }}</div> 
                <span class="text-xs font-medium text-blue-600">{{ date_format(date_create($item->tanggal_pengambilan), 'd M Y') }}</span>   
            </div>
        </div>
    </div>
    @endforeach
</main>

<!-- Include Chart.js library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var orderStatusData = {
            labels: ['Order Waiting', 'Order Confirmed', 'Order Canceled'],
            datasets: [{
                data: [{{ $waiting }}, {{ $confirmed }}, {{ $canceled }}],
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                hoverBackgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
            }]
        };

        var ctx = document.getElementById('orderStatusChart').getContext('2d');
        var orderStatusChart = new Chart(ctx, {
            type: 'pie',
            data: orderStatusData,
        });
    });
</script>

@endsection