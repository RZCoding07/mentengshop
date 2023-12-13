@extends('admin.templates.layout')

@section('content')
<style>
    .dataTables_wrapper .dataTables_length select {
        border-radius: 10px !important;
        margin-bottom: 10px !important;
    }
    .dataTables_wrapper .dataTables_length select:not([size]) {
        padding-right: 2rem !important;
    }
    .dataTable_filter {
        margin-bottom: 10px !important;
    }
    .dataTables_wrapper .dataTables_filter input {
        border-radius: 10px !important;
    }
    a.paginate_button {
        width: ;
        border-radius: 10px !important;
    }
    table.dataTable td {
        border-bottom: 1px solid #ccc !important;
    }
</style>
<main class="min-h-screen bg-[#f3e3cf] p-4 md:ml-64 h-auto pt-20">
    <div class="shadow bg-white p-5 rounded-lg">
        <div class="mb-10 flex justify-between">
            <div>
                <h1 class="text-3xl font-semibold">Data Products</h1>
                <p>Manage Data Products</p>
            </div>
            <div>
                <a href="{{ route('dashboard-products-add') }}">
                    <button type="button" class="flex items-center gap-1 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">
                        <ion-icon name="add" class="text-xl"></ion-icon>
                        Product
                    </button>
                </a>
            </div>
        </div>
        <div class="overflow-x-auto">

            <table class="border border-gray-400 rounded-lg overflow-hidden" id="dataTable">
                <thead class="bg-slate-800 text-white">
                    <th>No</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Type</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->name }}</td>
                            <td class="whitespace-nowrap">Rp {{ number_format($product->price)}}</td>
                            <td>{{ ucfirst($product->type) }}</td>
                            <td class="flex gap-2">
                                <a href="{{ route('dashboard-products-detail', $product->id) }}">
                                    <button type="button" class="focus:outline-none text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Detail</button>
                                </a>
                                <button type="button" class="flex items-center gap-1 focus:outline-none text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 delete-btn" data-product-id="{{ $product->id }}">
                                    <ion-icon name="trash" class="text-xl"></ion-icon>
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('.delete-btn').click(function () {
            const productId = $(this).attr('data-product-id');

            console.log(productId);

            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/api/products/' + productId,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (response) {
                            Swal.fire({
                                title: 'Deleted!', 
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
                            Swal.fire('Error!', 'An error occurred while deleting the product.', 'error');
                        }
                    });
                }
            });
        });
    });
</script>
@endsection