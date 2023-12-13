@extends('guest.templates.layout')

@section('content')
    

<!-- Product Showcase -->
<section class="py-16 mt-14">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold mb-3">Our Products</h2>
        <p class="text-lg mb-20">Explore our carefully curated selection of stunning kebayas with exquisite payet embellishments.</p>
        <div class="">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3 md:gap-7">
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

<!-- Contact Section -->
<section class="bg-[#F8F0E5] py-16">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold mb-8">Get In Touch</h2>
        <p class="text-lg mb-8">Have questions or want to place an order? Reach out to us!</p>
        <a href="{{ route('contact') }}" class="bg-gray-800 text-white py-2 px-6 rounded-full uppercase text-sm font-semibold hover:bg-gray-700">Contact Us</a>
    </div></section>

@endsection