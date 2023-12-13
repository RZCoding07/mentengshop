@extends('guest.templates.layout')

@section('content')
<main class="min-h-screen h-auto pt-20">
    <div class="p-4">
        <div class="min-h-screen shadow bg-white p-5 rounded-lg">
            @csrf
            <a href="{{ route('product') }}" class="group w-fit flex items-center mb-5 font-semibold text-gray-900 transition-all ease-linear duration-100 gap-0.5 hover:gap-2">
                <ion-icon name="arrow-back-outline" class="text-lg"></ion-icon>
                <span class="group-hover:underline">
                    Back    
                </span>
            </a>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div id="gallery" class="relative w-full" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative h-96 bg-gray-200 overflow-hidden rounded-lg md:h-[500px]">
                        @foreach ($product->images as $image)    
                        <a href="{{ url('/storage/' . $image->image_path) }}" target="_blank" class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ url('/storage/' . $image->image_path) }}" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
                        </a>
                        @endforeach
                    </div>
    
                    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                            <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                            <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>
                <div>
                    <h1 class="text-4xl mb-5">{{ $product->name }}</h1>
                    <p class="mb-5">{{ $product->description }}</p>
                    <h1 class="text-green-700 text-2xl">Rp {{ number_format($product->price) }}</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="bg-[#F8F0E5] py-16">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-8">Get In Touch</h2>
            <p class="text-lg mb-8">Have questions or want to place an order? Reach out to us!</p>
            <a href="{{ route('contact') }}" class="bg-gray-800 text-white py-2 px-6 rounded-full uppercase text-sm font-semibold hover:bg-gray-700">Contact Us</a>
        </div>
    </section>
</main>

@endsection