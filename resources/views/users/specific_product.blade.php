@extends('users.layouts.main')
@yield('trigger.js')
@section('content')
<main class="h-full flex items-center justify-center container mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class=" grid grid-cols-2 gap-8 p-5">
            <div class="col-span-2 ">
                <img src="{{ asset('storage/local/SSS logo.png')}}" alt="Product Image" class="max-w-full h-auto">
            </div>
            <div class="">
                <img src="{{ asset('storage/local/SSS logo.png')}}" alt="Product Image" class="max-w-full h-auto">
            </div>
            <div class="">
                <img src="{{ asset('storage/local/SSS logo.png')}}" alt="Product Image" class="max-w-full h-auto">
            </div>
        </div>
        <div class="flex flex-col justify-center">
            <div class="mb-5">
                <h1 class="text-4xl font-bold mb-4">Segitiga Sama Sisi Merch</h1>
                <p class="text-2xl text-gray-500 mb-6">Rp1,500,000</p>
                <p class="text-gray-700 mb-6">
                    C-PRINT<br>
                    SHOT ON FILM<br>
                    EDITION OF 5<br>
                    DIGITAL PRINT ON PHOTO SILKY PAPER<br>
                    297 x 420 mm / A3<br>
                    HAND SIGNED AND NUMBERED
                </p>
                <p class="text-green-600 mb-4">5 in stock</p>
                <div class="flex items-center mb-4">
                    <button id="decrement" class="bg-gray-200 px-4 py-2">-</button>
                        <input type="text" id="quantity" class="w-12 text-center" value="1">
                    <button id="increment" class="bg-gray-200 px-4 py-2">+</button>
                </div>
                <button class="w-full bg-black text-white py-3 font-bold">ADD TO CART</button>
            </div>
            {{-- <div class="mt-8 flex space-x-4">
                <a href="#" class="text-gray-700 hover:text-gray-900"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-gray-700 hover:text-gray-900"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-gray-700 hover:text-gray-900"><i class="fab fa-pinterest"></i></a>
            </div> --}}
        </div>
    </div>
</main>
@endsection