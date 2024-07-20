
<nav class="bg-white top-0 left-0 right-0 m-0 z-10 sticky">
  <div class="max-w-8xl mx-auto px-2 sm:px-6 lg:px-8">
    <div class="relative flex items-center justify-between h-20">
      <div class="flex-1 flex max-w-[80%] mx-auto md:mx-0 md:max-w-[100%] items-center h-[80%] justify-between">
        <div class="flex-shrink-0 md:hidden">
          <button id="sidebar-open-icon" class="block focus:outline-none">
                menu
          </button>
        </div>
        <div class="flex-shrink-0">
            <a href="{{route('home')}}" class="font-bold md:text-2xl text-blue-500"><img class="w-20" src="{{ asset('storage/SSS logo.png')}}" alt=""></a>
        </div> 
        <div class="flex-shrink-0 md:hidden">
          <button id="cart-button-hidden" class="block focus:outline-none">
                chart
          </button>
        </div>

        <div id="items-navbar" class="hidden md:flex space-x-3 ml-auto self-end mb-3">
          <div class="flex">
              <a href="{{ route('home')}}" class="px-6 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out">About</a>
              <div id="gallery-event-parent" class=" relative flex">
                <a href="{{ route('gallery_category')}}" class="gallery-event-parent px-6 py-2 m-0 rounded-md text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out">Events</a>
                <div id="dropdown-menu-gallery" class="absolute w-40 mt-9 z-10 bottom-0 transition ease-in-out duration-200 opacity-0 transform scale-95" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                  <?php foreach ($navbar_category['navbar_gallery'] as $key) :?>
                  <a href="{{ route('gallery_picture', ['type' => $key['slug']]) }}" class="block px-4 py-2 text-sm cursor-pointer hover:bg-gray-100 transition ease-in-out duration-150 font-normal" role="menuitem">{{ $key['title'] }}</a>
                  <?php endforeach; ?>
                </div>
              </div>
              <div id="dropdown-vinyls-parent" class=" relative flex">
              </div>
              <div id="dropdown-merch-parent" class="relative flex">
                <a href="{{ route('gallery_merches')}}" class="px-6 py-2 m-0 rounded-md text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out">Merch</a>
                <div id="dropdown-menu-merch" class="absolute w-40 mt-9 z-10 bottom-0 transition ease-in-out duration-200 opacity-0 transform scale-95" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                  <?php foreach ($navbar_category['navbar_merch'] as $key) :?>
                    <a href="{{ route('gallery_merchant_type', ['merch_type' => $key['slug_category']]) }}" class="block px-4 py-2 text-sm cursor-pointer hover:bg-gray-100 transition ease-in-out duration-150 font-normal" role="menuitem">{{ $key['name_category'] }}</a>
                  <?php endforeach; ?>
                </div>
              </div>
            <button type="button" id="cart-button" class="relative items-center px-6 py-2 text-sm font-medium text-center text-black">
                cart
                <span class="sr-only">Notifications</span>
            <div class="absolute inline-flex items-center justify-center w-3 h-3 text-xs font-medium text-black bg-gray-400  rounded-full top-2 end-2 dark:border-gray-900">{{count($navbar_category['carts'])}}</div>
            </button>
  
            {{-- <div id="youtube" class="mx-8">
                <button onclick="redirectToYoutube()"> 
                  <span class="icon"><svg fill="none" height="33" viewBox="0 0 120 120" width="33" xmlns="http://www.w3.org/2000/svg"><path d="m120 60c0 33.1371-26.8629 60-60 60s-60-26.8629-60-60 26.8629-60 60-60 60 26.8629 60 60z" fill="#cd201f"></path><path d="m25 49c0-7.732 6.268-14 14-14h42c7.732 0 14 6.268 14 14v22c0 7.732-6.268 14-14 14h-42c-7.732 0-14-6.268-14-14z" fill="#fff"></path><path d="m74 59.5-21 10.8253v-21.6506z" fill="#cd201f"></path></svg></span>
                  <span class="text1">Follow me</span>
                  <span class="text2">SSS</span> 
                </button>
              </div> --}}
            
              
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="sidebar h-[100vh] bg-white transition-all z-20 absolute top-0 w-[70%] md:block">
    <div class="button-wrapper mb-5 flex justify-end">
      <button class="fa-solid fa-times text-black cursor-pointer m-4 block text-4xl" id="sidebar-close-icon"></button>
    </div>
    <!-- Sidebar content -->
    <ul class="space-y-2 text-xl transition-all">
      <li><a href="#" class="block px-4 py-1 text-gray-700 hover:bg-gray-100">about</a></li>
      <li class="relative transition-all">
        <button id="dropdown-events-sidebar-id" class="block px-4 py-1 text-gray-700 hover:bg-gray-100">events</button>
        <ul id="dropdown-events" class="bg-white text-gray-700 py-1 shadow-md top-full left-0 w-full rounded-md transition-all">
          <li><a href="#" class="block px-4 py-1 text-gray-700 hover:bg-gray-100">event 1</a></li>
          <li><a href="#" class="block px-4 py-1 text-gray-700 hover:bg-gray-100">event 2</a></li>
          <li><a href="#" class="block px-4 py-1 text-gray-700 hover:bg-gray-100">event 3</a></li>
        </ul>
      </li>
      <li class="relative">
        <button id="dropdown-merch-sidebar-id" class="block px-4 py-1 text-gray-700 hover:bg-gray-100">merch</button>
        <ul id="dropdown-merch" class="bg-white text-gray-700 py-1 shadow-md top-full left-0 w-full rounded-md">
          <li><a href="#" class="block px-4 py-1 text-gray-700 hover:bg-gray-100">merch 1</a></li>
          <li><a href="#" class="block px-4 py-1 text-gray-700 hover:bg-gray-100">merch 2</a></li>
        </ul>
      </li>
      <li><a href="#" class="block px-4 py-1 text-gray-700 hover:bg-gray-100">vinyls</a></li>
    </ul>
  </div>


  <div id="sidebar-cart" class="sidebar-cart flex flex-col justify-between h-[100vh] bg-white transition-all p-5 z-20 absolute top-0 right-0 w-[50%] md:w-[30%] transform translate-x-full">
    <div class="header">
        <div class="header-text py-3 block border-b-2">
          <h1 class="text-2xl font-medium capitalize">Shopping cart</h1>
        </div>
        <div class="button-wrapper inline-block absolute top-0 right-0 m-5">
            <button class="text-black cursor-pointer block text-2xl" id="sidebar-close-cart">X</button>
        </div>
    </div>
    <div class="body flex-auto">
    @foreach ($navbar_category['carts'] as $cart => $value)    
    <?php $total_price_product = 0 ?>
          <div class="card max-h-14 p-2 my-1 flex justify-between items-center overflow-hidden">
                <div class="image h-full w-14 flex justify-center overflow-hidden">
                  <img src="{{ asset('storage/'.$value['product']['merch_cover_front'])}}" alt="" class="object-cover w-full h-full">
                </div>
                <div class="description h-full justify-center flex-auto items-left pl-2 flex flex-col">
                    <p class="title text-xs font-bold">{{$value['product']['title']}}</p>
                    <p class="price_amount text-xs">
                      @foreach ($value['sizes'] as $size => $quantity)
                        {{$size}} : {{$quantity}}     
                        {{-- {{dd($quantity)}} --}}
                        @if ($quantity > 0)
                         
                          <?php $total_price_product += $value['product']['price'] * $quantity ?>
                          
                        @endif   
                      @endforeach
                    </p>
                    <p class="text-xs">
                      <span class="total_price text-xs font-bold format-rupiah">{{$total_price_product}}</span>
                    </p>
                </div>
                <div class="action h-12 w-6 flex items-center">
                  <button class="font-semibold text-s delete-from-cart" data-product-id={{$cart}}><i class="fas fa-trash transition-all hover:text-red-400 text-red-500"></i></button>
                </div>
          </div> 
    @endforeach 
    </div>
    <div class="footer border-t-2">
      <div class="checkout-button text-center m-1">
        <button class="bg-black text-white w-full py-3">Checkout</button>
      </div>
      <div class="cart-button text-center m-1">
        <a href="{{route('cart_page')}}" class="bg-black block text-white w-full py-3">Cart</a>
      </div>

    </div>

  </div>

</nav>
