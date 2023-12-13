@extends('admin.templates.layout')

@section('content')
<main class="min-h-screen bg-[#f3e3cf] p-4 md:ml-64 h-auto pt-20">
    <div class="shadow bg-white p-5 rounded-lg">
        @csrf
        <a href="{{ route('dashboard-products') }}" class="group w-fit flex items-center mb-3 font-semibold text-gray-900 transition-all ease-linear duration-100 gap-0.5 hover:gap-2">
            <ion-icon name="arrow-back-outline" class="text-lg"></ion-icon>
            <span class="group-hover:underline">
                Back    
            </span>
        </a>

        <div class="mb-10 flex justify-between">
            <div>
                <h1 class="text-3xl font-semibold">Detail Products</h1>
                <p>Preview detail products</p>
            </div>
        </div>
        
        <div class="grid grid-cols-2 gap-10">
            <div id="gallery" class="relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-56 bg-gray-200 overflow-hidden rounded-lg md:h-96">
                    @foreach ($product->images as $image)    
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ url('/storage/' . $image->image_path) }}" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
                    </div>
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
</main>

@endsection