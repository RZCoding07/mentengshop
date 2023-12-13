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
    <form method="POST" action="{{ route('dashboard-products-store') }}" enctype="multipart/form-data" class="shadow bg-white p-5 rounded-lg">
        @csrf
        <a href="{{ route('dashboard-products') }}" class="group w-fit flex items-center mb-3 font-semibold text-gray-900 transition-all ease-linear duration-100 gap-0.5 hover:gap-2">
            <ion-icon name="arrow-back-outline" class="text-lg"></ion-icon>
            <span class="group-hover:underline">
                Back    
            </span>
        </a>
        <div class="mb-10 flex justify-between">
            <div>
                <h1 class="text-3xl font-semibold">New Product</h1>
                <p>Add new product</p>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="grid grid-cols-2 gap-5 md:gap-10">
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Product name</label>
                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Product name..." required>
            </div>
            <div>
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Product price</label>
                <input type="number" step="1000" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Product price..." required>
            </div>
            <div class="col-span-2">
                <label for="type" class="block mb-2 text-sm font-medium text-gray-900">Product type</label>
                <select name="type" id="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Product type..." required>
                    <option value="fullset">Fullset</option>
                    <option value="setengah">Setengah</option>
                    <option value="pinggiran">Pinggiran</option>
                </select>
            </div>
            <div class="col-span-2">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Product description</label>
                <textarea name="description" rows="5" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg resize-y focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Product description..." required></textarea>
            </div>
            <div class="col-span-2">   
                <label class="block mb-2 text-sm font-medium text-gray-900" for="multiple_files">Upload product image</label>
                <input name="file[]" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="multiple_files" type="file" multiple>
            </div>
            <div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Save</button>
            </div>
        </div>
    </div>
</main>

@endsection