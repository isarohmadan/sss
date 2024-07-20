@extends('users.layouts.main' , ['navbar_category', $navbar_category])
@section('content')
<main class="h-full flex items-center justify-center container mx-auto px-4">
    <div class="max-h-[100%] grid grid-cols-1 md:h-[80%] min-w-[80%] md:grid-cols-3 gap-8">
        <div id="merch-container" class="max-h-full max-w-full overflow-hidden md:col-span-2 content flex justify-center items-center">
                <img src="{{ asset('storage/'.$data['merch_cover_front']) }}" alt="Product Image" class="max-h-full object-cover zoomImage text-center" id="zoomImage">
        </div>
        
        <div id="identitiy" class="flex items-center">
            <div class="mb-5 flex flex-col mx-auto text-center md:text-left">
                <h1 class="text-4xl font-bold mb-4"><?=$data['title']?></h1>
                <p class="text-2xl text-gray-500 mb-6 format-rupiah"><?= $data['price']?></p>
                <p class="text-gray-700 mb-6 text-pretty">
                    <?=$data['description'];?>
                </p>
                <p class="mb-4"><span id="stock-info" class="text-red-600">0</span> in stock</p>
                <div class="size mb-2">
                    <select name="size" id="size" class="w-full py-2 px-4 bg-gray-200">
                        <option disabled selected value> -- select an option -- </option>
                        @foreach ($data['merch_size'] as $size)
                            <option value="{{$size['size']}}" product-stock="{{$size['stock']}}">{{$size['size']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex justify-between h-16 mb-3">
                    <div class="flex  items-center mb-4 w-full">
                        <button id="decrement" class="bg-gray-200 px-4 py-2">-</button>
                            <input type="text" id="quantity" class="w-12 text-center" value="1">
                        <button id="increment" class="bg-gray-200 px-4 py-2">+</button>
                    </div>
                    <div class=" flex p-1 image-preview h-full w-fit">
                        <div class="front-view mx-1 flex justify-center w-16 h-full border border-gray-300 overflow-hidden">
                            <img src="{{ asset('storage/'.$data['merch_cover_front'])}}" alt="Product Image" id="preview-image-front" class="max-w-full max-h-full object-cover zoom-image ">
                        </div>
                        <div class="back-view mx-1 flex justify-center w-16 overflow-hidden border border-gray-300 h-full">
                            <img src="{{ asset('storage/'.$data['merch_cover_back'])}}" alt="Product Image" id="preview-image-back" class="max-w-full max-h-full object-cover zoom-image">
                        </div>
                    </div>
                </div>
                
                <button type="button" class="w-full add-to-cart bg-black text-white py-3 font-bold hover:opacity-80" id="add-to-cart-btn" data-product-id={{$data['id_merch']}}>
                    <span id="button-text" class="text-white">Cart</span>
                </button>
            </div>
        </div>
    </div>
</main>
@endsection

@section('script')
    @vite(['resources/js/trigger.js','resources/js/cart.js'])
@endsection