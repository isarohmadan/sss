    @extends('users.layouts.main', ['navbar_category', $navbar_category])

    @section('content')
    <?php $total = [] ?>
        <div class="container mx-auto content">
            <div class="flex shadow-md">
                <div class="w-3/4 bg-white px-10 py-10">
                    <div class="flex justify-between border-b pb-2">
                        <h1 class="font-semibold text-2xl">Shopping Cart</h1>
                        <h2 class="font-semibold text-2xl">{{count($navbar_category['carts'])}} Items</h2>
                    </div>
                    <div class="flex mt-10 mb-5">
                        <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Product Details</h3>
                        <h3 class="font-semibold text-gray-600 text-xs uppercase w-1/5 text-center">Quantity</h3>
                        <h3 class="font-semibold text-gray-600 text-xs uppercase w-1/5 text-center">Price</h3>
                        <h3 class="font-semibold text-gray-600 text-xs uppercase w-1/5 text-center">Total</h3>
                    </div>
                    @foreach ($navbar_category['carts'] as $cart => $value)
                    <?php $total_price_product = 0 ?>
                    <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
                        
                        <div class="flex w-2/5">
                            <div class="w-22 overflow-hidden">
                                <img class="h-24" src="./storage/{{$value['product']['merch_cover_front']}}" alt="Product Image" class="object-fit"> 
                            </div>
                            <div class="flex flex-col justify-between ml-4 flex-grow">
                                <span class="font-bold text-sm">{{$value['product']['title']}}</span>
                                <span class="text-blue-500 text-xs">Size: @foreach ($value['sizes'] as $size => $quantity)
                                    {{$size}}
                                @endforeach</span>
                                <button class="font-semibold text-s delete-from-cart text-start" data-product-id={{$cart}}><i class="fas fa-trash transition-all hover:text-red-400 text-red-500"></i></button>
                            </div>
                        </div>
                        <div class="flex justify-center w-1/5 flex-col gap-2">
                            @foreach ($value['sizes'] as $size => $quantity)
                                    <p class="block text-center">{{$size}} : {{$quantity}}</p>
                                    <?php $total_price_product += ($quantity * $value['product']['price']) ?>
                            @endforeach
                        </div>
                        <span class="text-center w-1/5 font-semibold text-sm format-rupiah"><?=$value['product']['price']?></span>
                        <span class="text-center w-1/5 font-semibold text-sm format-rupiah">{{($total_price_product)}}</span>
                    </div>
                    <?php $total[] = $total_price_product ?>
                        {{-- <php $total ?> --}}
                    @endforeach
                    <!-- Repeat for more items -->
                    <a href="#" class="flex text-indigo-600 text-md mt-10">
                        <i class="fas fa-chevron-left hover:text-indigo-400 transition-colors"><span class="ml-2 text-md hover:text-indigo-400 transition-colors font-normal">Continue Shopping</span></i>
                    </a>
                </div>
                <div id="summary" class="w-1/4 px-8 py-10 bg-white">
                    <h1 class="font-semibold text-2xl border-b pb-2">Order Summary</h1>
                    <div class="flex justify-between mt-5 mb-5">
                        <span class="font-semibold text-sm uppercase">Product Cost</span>
                        <span class="font-semibold text-sm format-rupiah" id="total_product_price" value-product-price={{array_sum($total)}}>{{array_sum($total)}}</span>
                    </div>
                        <a href="{{route('checkout_page')}}" class="bg-black hover:opacity-80 transition-opacity py-3 text-sm text-white uppercase w-full inline-block text-center font-bold">Checkout</a>
                </div>
            </div>
        </div>



    @endsection

    @section('script')
        @vite(['resources/js/cart_page.js','resources/js/cart.js'])
    @endsection