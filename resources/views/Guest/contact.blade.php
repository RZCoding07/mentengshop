@extends('guest.templates.layout')

@section('content')
<section class="bg-[#EADBC8] p-10">
    <div class="py-8 lg:py-16 px-4 mt-10 mx-auto max-w-screen-md h-fit">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900">Contact Us</h2>
        <p class="mb-8 lg:mb-16 font-light text-center text-gray-600 sm:text-xl">Let's Make Your Kebaya Payet Dreams a Reality.</p>
        <form method="POST" action="{{ route('dashboard-orders-store') }}" class="bg-white p-10 rounded-lg grid grid-cols-2 gap-5 md:gap-10 mb-5">
            @csrf
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
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}"> {{ $product->name }} </option>
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
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Send</button>
            </div>
        </form>

        <div class="grid grid-cols-3 gap-5">
            <div class="rounded-lg bg-white p-5 flex flex-col items-center justify-center gap-1">
                <div class="p-2">
                    <ion-icon name="location" class="text-3xl text-gray-500"></ion-icon>
                </div>
                <a href="https://www.google.com/maps?q=Jl.%20Menteng%20VII,%20Medan%20Denai,%20Medan%20Tenggara,%20Kota%20Medan,%20Sumatera%20Utara" target="_blank" class="text-xs text-center"> Jl. Menteng VII, Medan Denai,
                    Medan Tenggara, Kota Medan
                    Sumatera Utara</a>
            </div>
            <div class="rounded-lg bg-white p-5 flex flex-col items-center justify-center gap-1">
                <div class="p-2">
                    <ion-icon name="logo-whatsapp" class="text-3xl text-green-500"></ion-icon>
                </div>
                <h1 class="text-base">Chat us at</h1>
                <a href="https://wa.me/62895370357001?text=Hi,%20saya%20ingin%20order%20product%20nya" target="_blank" class="text-xs">+6281234567890</a>
            </div>
            <div class="rounded-lg bg-white p-5 flex flex-col items-center justify-center gap-1">
                <div class="p-2">
                    <ion-icon name="mail" class="text-3xl text-red-500"></ion-icon>
                </div>
                <h1 class="">Email us at</h1>
                <a href="mailto:someone@example.com" target="_blank" class="text-xs">mentengshop@mail.com</a>
            </div>
        </div>
    </div>
  </section>
@endsection