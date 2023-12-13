@extends('admin.templates.layout')

@section('content')
<main class="min-h-screen bg-[#f3e3cf] p-4 md:ml-64 h-auto pt-20">
    <form method="POST" action="{{ route('dashboard-orders-store') }}" enctype="multipart/form-data" class="shadow bg-white p-5 rounded-lg">
        @csrf
        <a href="{{ route('dashboard-orders') }}" class="group w-fit flex items-center mb-3 font-semibold text-gray-900 transition-all ease-linear duration-100 gap-0.5 hover:gap-2">
            <ion-icon name="arrow-back-outline" class="text-lg"></ion-icon>
            <span class="group-hover:underline">
                Back    
            </span>
        </a>
        <div class="mb-10 flex justify-between">
            <div>
                <h1 class="text-3xl font-semibold">New Order</h1>
                <p>Add new order</p>
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
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Customer name..." required>
            </div>
            <div>
                <label for="telp" class="block mb-2 text-sm font-medium text-gray-900">No.telp</label>
                <input type="text" name="telp" id="telp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="No.telp..." required>
            </div>
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Email..." required>
            </div>
            <div>
                <label for="model_payet" class="block mb-2 text-sm font-medium text-gray-900">Model payet</label>
                <select name="model_payet" id="model_payet" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Product type..." required>
                    @foreach ($product as $item)
                        <option value="{{ $item->id }}"> {{ $item->name }} </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="warna" class="block mb-2 text-sm font-medium text-gray-900">Warna</label>
                <select name="warna" id="warna" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    <option value="merah">Merah</option>
                    <option value="biru">Biru</option>
                    <option value="hijau">Hijau</option>
                    <option value="kuning">Kuning</option>
                </select>
            </div>
            <div>
                <label for="banyak_payet" class="block mb-2 text-sm font-medium text-gray-900">Banyak payet</label>
                <select name="banyak_payet" id="banyak_payet" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    <option value="fullset">Fullset</option>
                    <option value="setengah">Setengah</option>
                    <option value="pinggiran">Pinggiran</option>
                </select>
            </div>
            <div class="col-span-2">
                <label for="tanggal_pengambilan" class="block mb-2 text-sm font-medium text-gray-900">Tanggal ambil</label>
                <input type="date" name="tanggal_pengambilan" id="tanggal_pengambilan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Tanggal ambil..." required>
            </div>
            <div class="col-span-2">
                <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
                <textarea name="alamat" rows="5" id="alamat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg resize-y focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Alamat..." required></textarea>
            </div>
            <div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Save</button>
            </div>
        </div>
    </div>
</main>

@endsection