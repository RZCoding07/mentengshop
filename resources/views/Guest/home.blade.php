@extends('guest.templates.layout')

@section('content')
    

<!-- Hero Section -->
<header class="relative overflow-hidden h-screen flex items-center text-white">
    <img class="w-full h-full bg-cover bg-center brightness-50" src="{{ url('/storage/IMG_9445.JPG') }}" alt="hero">
    <div class="absolute top-1/2 left-0 right-0 container mx-auto text-center">
        <h1 class="text-4xl md:text-6xl font-bold mb-4">Elegance in Every Stitch</h1>
        <p class="text-lg mb-8">Discover our exquisite collection of handcrafted kebaya with intricate payet details.</p>
        <a href="#featured" class="bg-white text-gray-800 py-2 px-6 rounded-full uppercase text-sm font-semibold hover:bg-gray-200">Explore Now</a>
    </div>
</header>

<section class="h-min-screen py-10" id="featured">
    <div class="container mx-auto text-center py-16">
        <h2 class="text-3xl font-bold mb-3">Featured Collection</h2>
        <p class="text-lg mb-8">Unveiling the Beauty of Tradition Our Handcrafted Kebaya Payet.</p>
        <div class="">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach ($products as $product)                    
                <div class="relative max-w-sm max-h-[400px] overflow-hidden group transition-all ease-linear duration-200 bg-white border border-gray-200 rounded-lg">
                    <a href="{{ url('/product/detail', $product->id) }}">
                        <img class="rounded-lg group-hover:brightness-50 group-hover:blur-[1.2px] transition-all ease-linear duration-200" src="{{ url('/storage/' . $product->images[0]->image_path) }}" alt="" />
                    </a>
                    <div class="absolute bottom-0 p-5 opacity-0 transition-all ease-linear duration-200 group-hover:opacity-100 group-hover:bottom-10">
                        <div>
                            <h5 class="mb-2 text-base md:text-xl font-medium tracking-tight text-zinc-100 line-clamp-2">{{ $product->name }}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="bg-[#F8F0E5] py-16">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold mb-8">Get In Touch</h2>
        <p class="text-lg mb-8">Have questions or want to place an order? Reach out to us!</p>
        <a href="{{ route('contact') }}" class="bg-gray-800 text-white py-2 px-6 rounded-full uppercase text-sm font-semibold hover:bg-gray-700">Contact Us</a>
    </div>
</section>

@endsection