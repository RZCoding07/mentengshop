@extends('admin.templates.layout')

@section('content')
<style>
    .dataTables_wrapper .dataTables_length select {
        border: 1px solid #aaa;
        border-radius: 3px;
        background-color: transparent;
        color: inherit;
        margin-bottom: 10px !important;
    }
    .dataTables_wrapper .dataTables_length select:not([size]) {
        padding-right: 2rem !important;
    }
    .dataTable_filter {
        margin-bottom: 10px !important;
    }
    a.paginate_button {
        width: ;
        border-radius: 10px !important;
    }
</style>
<main class="min-h-screen bg-[#f3e3cf] p-4 md:ml-64 h-auto pt-20">
    <div class="shadow bg-white p-5 rounded-lg">
        <div class="mb-10 flex justify-between">
            <div>
                <h1 class="text-3xl font-semibold">Data Orders</h1>
                <p>Manage Data Orders</p>
            </div>
            <div>
                <a href="{{ route('dashboard-orders-add') }}">
                    <button type="button" class="flex items-center gap-1 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">
                        <ion-icon name="add" class="text-xl"></ion-icon>
                        Order
                    </button>
                </a>
            </div>
        </div>
        <ul class="mb-7 flex gap-2">
            <li>
                <input type="radio" id="menunggu" name="status" value="Menunggu" class="hidden peer" checked required>
                <label for="menunggu" class="inline-flex items-center justify-between text-sm px-2 py-2 text-gray-500 bg-white border border-gray-200 rounded-full cursor-pointer peer-checked:font-medium peer-checked:bg-gray-500 peer-checked:text-white hover:text-gray-600 hover:bg-gray-100">                           
                    <div class="block">
                        <div class="w-full">Menunggu Konfirmasi</div>
                    </div>
                </label>
            </li>
            <li>
                <input type="radio" id="terkonfirmasi" name="status" value="Terkonfirmasi" class="hidden peer" required>
                <label for="terkonfirmasi" class="inline-flex items-center justify-between text-sm px-2 py-2 text-gray-500 bg-white border border-gray-200 rounded-full cursor-pointer peer-checked:font-medium peer-checked:bg-green-600 peer-checked:text-white hover:text-gray-600 hover:bg-gray-100">                           
                    <div class="block">
                        <div class="w-full">Sudah Konfirmasi</div>
                    </div>
                </label>
            </li>
            <li>
                <input type="radio" id="canceled" name="status" value="Canceled" class="hidden peer" required>
                <label for="canceled" class="inline-flex items-center justify-between text-sm px-2 py-2 text-gray-500 bg-white border border-gray-200 rounded-full cursor-pointer peer-checked:font-medium peer-checked:bg-red-600 peer-checked:text-white hover:text-gray-600 hover:bg-gray-100">                           
                    <div class="block">
                        <div class="w-full">Canceled</div>
                    </div>
                </label>
            </li>
        </ul>
        
        <div class="dataTerkonfirmasi overflow-x-auto">
            <table class="border border-gray-400 rounded-lg overflow-hidden dataTable" id="dataTable">
                <thead class="bg-slate-800 text-white">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No.Telp</th>
                    <th>Model</th>
                    <th>Warna</th>
                    <th>Banyak</th>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr class="border-b">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->telp }}</td>
                            <td>{{ $order->product->name }}</td>
                            <td>{{ ucfirst($order->warna) }}</td>
                            <td>{{ $order->banyak_payet }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="dataMenunggu overflow-x-auto">
            <table class="border border-gray-400 rounded-lg overflow-hidden dataTable" id="dataTable">
                <thead class="bg-slate-800 text-white">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No.Telp</th>
                    <th>Model</th>
                    <th>Warna</th>
                    <th>Banyak</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($menunggu as $order)
                        <tr class="border-b whitespace-nowrap">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->telp }}</td>
                            <td>{{ $order->product->name }}</td>
                            <td>{{ ucfirst($order->warna) }}</td>
                            <td>{{ $order->banyak_payet }}</td>
                            <td class="flex gap-1">
                                <button type="button" order-id="{{ $order->id }}" class="confirm-btn flex items-center gap-1 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">
                                    Confirm
                                </button>
                                <button type="button" order-id="{{ $order->id }}" class="cancel-btn flex items-center gap-1 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">
                                    Cancel
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="dataCanceled overflow-x-auto">
            <table class="border border-gray-400 rounded-lg overflow-hidden dataTable" id="dataTable">
                <thead class="bg-slate-800 text-white">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No.Telp</th>
                    <th>Model</th>
                    <th>Warna</th>
                    <th>Banyak</th>
                </thead>
                <tbody>
                    @foreach ($order_canceled as $order)
                        <tr class="border-b whitespace-nowrap">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->telp }}</td>
                            <td>{{ $order->product->name }}</td>
                            <td>{{ ucfirst($order->warna) }}</td>
                            <td>{{ $order->banyak_payet }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('.dataMenunggu').show();
        $('.dataCanceled').hide();
        $('.dataTerkonfirmasi').hide();

        $('input[name="status"]').change(function() {
            var selectedValue = $('input[name="status"]:checked').val();

            $('.dataMenunggu').hide();
            $('.dataCanceled').hide();
            $('.dataTerkonfirmasi').hide();

            $('.data' + selectedValue).show();
        });
    });
</script>

<script>
    $(document).ready(function () {
        function handleOrderAction(orderId, action) {
            $.ajax({
                url: `/api/orders/${orderId}/${action}`,
                method: 'PUT',
                success: function (response) {
                    Swal.fire({
                        title: 'Success!', 
                        text: response.message, 
                        icon: 'success',
                        timer: 2000,
                        timerProgressBar: true,
                        showConfirmButton: false,
                    }).then(function () {
                        window.location.reload();
                    });
                },
                error: function (error) {
                    Swal.fire('Error', error.responseJSON.message, 'error');
                }
            });
        }

        $('.dataMenunggu').on('click', '.confirm-btn', function () {
            var orderId = $(this).attr('order-id');
            Swal.fire({
                title: 'Are you sure?',
                text: 'You are about to confirm this order.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, confirm it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    handleOrderAction(orderId, 'confirm');
                }
            });
        });

        $('.dataMenunggu').on('click', '.cancel-btn', function () {
            var orderId = $(this).attr('order-id');
            Swal.fire({
                title: 'Are you sure?',
                text: 'You are about to cancel this order.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, cancel it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    handleOrderAction(orderId, 'cancel');
                }
            });
        });
    });
</script>

@endsection