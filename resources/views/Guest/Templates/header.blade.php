<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menteng Shop</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <nav class="fixed w-full bg-white/80 backdrop-blur-sm shadow-inner border-b border-b-slate-100 p-4 text-white top-0 z-50">
        <div class="container mx-auto">
            <div class="flex items-center justify-between">
                <div class="text-lg md:text-xl text-zinc-800 font-bold leading-none">Menteng Shop</div>
                <ul class="flex space-x-4">
                    <li><a href="{{ route('home') }}" class="text-zinc-700 hover:text-blue-500">Home</a></li>
                    <li><a href="{{ route('product') }}" class="text-zinc-700 hover:text-blue-500">Products</a></li>
                    <li><a href="{{ route('about') }}" class="text-zinc-700 hover:text-blue-500">About</a></li>
                    <li><a href="{{ route('contact') }}" class="text-zinc-700 hover:text-blue-500">Contact</a></li>
                    <li>
                        @if (Auth::user())
                        <a href="{{ route('logout') }}" class="text-zinc-700 hover:text-blue-500">Logout</a>
                        @else
                        <a href="{{ route('signin') }}" class="text-zinc-700 hover:text-blue-500">Login</a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>