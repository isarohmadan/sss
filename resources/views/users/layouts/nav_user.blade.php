<nav class="bg-white shadow-md top-0 left-0 right-0 z-10 sticky">
  <div class="max-w-8xl mx-auto px-2 sm:px-6 lg:px-8">
    <div class="relative flex items-center justify-between h-20">
      <div class="flex-1 flex max-w-[80%] mx-auto md:mx-0 md:max-w-[100%] items-center h-[80%] justify-between">
        <div class="flex-shrink-0 md:hidden">
          <button id="sidebar-open-icon" class="block focus:outline-none">
                menu
          </button>
        </div>
        <div class="flex-shrink-0">
            <a href="{{route('home')}}" class="font-bold md:text-2xl text-blue-500"><img class="w-20" src="{{ asset('storage/local/SSS logo.png')}}" alt=""></a>
        </div> 
        <div class="flex-shrink-0 md:hidden">
          <button id="sidebar-open-icon" class="block focus:outline-none">
                chart
          </button>
        </div>

        <div id="items-navbar" class="hidden md:flex space-x-3 ml-auto self-end mb-3">
          <div class="flex">
              <a href="{{ route('home')}}" class="px-6 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out">About</a>
              <div id="gallery-event-parent" class=" relative flex">
                <a href="{{ route('gallery_category')}}" class="gallery-event-parent px-6 py-2 m-0 rounded-md text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out">Events</a>
                <div id="dropdown-menu-gallery" class="absolute w-40 mt-9 z-10 bottom-0 transition ease-in-out duration-200 opacity-0 transform scale-95" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                  <a href="{{ route('gallery_picture',['type'=>'Upcoming_event']) }}" class="block px-4 py-2 text-sm cursor-pointer hover:bg-gray-100 transition ease-in-out duration-150 font-normal" role="menuitem">Upcoming Event</a>
                  <a href="{{ route('gallery_picture',['type'=>'Konser Kecil']) }}" class="block px-4 py-2 text-sm cursor-pointer hover:bg-gray-100 transition ease-in-out duration-150 font-normal" role="menuitem">Konser Kecil</a>
                  <a href="{{ route('gallery_picture',['type'=>'vinyl']) }}" class="block px-4 py-2 text-sm cursor-pointer hover:bg-gray-100 transition ease-in-out duration-150 font-normal" role="menuitem">Pop Up</a>
                  <a href="{{ route('gallery_picture',['type'=>'dj']) }}" class="block px-4 py-2 text-sm cursor-pointer hover:bg-gray-100 transition ease-in-out duration-150 font-normal" role="menuitem">DJ</a>
                </div>
              </div>
              <div id="dropdown-vinyls-parent" class=" relative flex">
                <a href="{{ route('vinyl_gallery')}}" class="px-6 py-2 m-0 rounded-md text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out">Vinyl</a>
                <div id="dropdown-menu-vinyls" class="absolute w-40 mt-9 z-10 bottom-0 transition ease-in-out duration-200 opacity-0 transform scale-95" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                  <a href="{{ route('vinyl_gallery',['type'=>'panggung musik kecil']) }}" class="block px-4 py-2 text-sm cursor-pointer hover:bg-gray-100 transition ease-in-out duration-150 font-normal" role="menuitem">Rock</a>
                  <a href="{{ route('vinyl_gallery',['type'=>'vinyl']) }}" class="block px-4 py-2 text-sm cursor-pointer hover:g-gray-100 transition ease-in-out duration-150 font-normal" role="menuitem">Jazz</a>
                  <a href="{{ route('vinyl_gallery',['type'=>'dj']) }}" class="block px-4 py-2 text-sm cursor-pointer hover:bg-gray-100 transition ease-in-out duration-150 font-normal" role="menuitem">Hip-Hop</a>
                  <a href="{{ route('vinyl_gallery',['type'=>'panggung musik kecil']) }}" class="block px-4 py-2 text-sm cursor-pointer hover:bg-gray-100 transition ease-in-out duration-150 font-normal" role="menuitem">Indonesia</a>
                  <a href="{{ route('vinyl_gallery',['type'=>'vinyl']) }}" class="block px-4 py-2 text-sm cursor-pointer hover:bg-gray-100 transition ease-in-out duration-150 font-normal" role="menuitem">Funk</a>
                  <a href="{{ route('vinyl_gallery',['type'=>'dj']) }}" class="block px-4 py-2 text-sm cursor-pointer hover:bg-gray-100 transition ease-in-out duration-150 font-normal" role="menuitem">Electronic</a>
                </div>
              </div>
              <div id="dropdown-merch-parent" class="relative flex">
                <a href="{{ route('gallery_merch')}}" class="px-6 py-2 m-0 rounded-md text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out">Merch</a>
                <div id="dropdown-menu-merch" class="absolute w-40 mt-9 z-10 bottom-0 transition ease-in-out duration-200 opacity-0 transform scale-95" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                  <a href="{{ route('gallery_merch',['type'=>'vintage']) }}" class="block px-4 py-2 text-sm cursor-pointer hover:bg-gray-100 transition ease-in-out duration-150 font-normal" role="menuitem">Band Merch</a>
                  <a href="{{ route('gallery_merch',['type'=>'sss']) }}" class="block px-4 py-2 text-sm cursor-pointer hover:bg-gray-100 transition ease-in-out duration-150 font-normal" role="menuitem">SSS Merch</a>
                </div>
              </div>
            <div id="youtube" class="mx-8">
                <button onclick="redirectToYoutube()"> 
                  <span class="icon"><svg fill="none" height="33" viewBox="0 0 120 120" width="33" xmlns="http://www.w3.org/2000/svg"><path d="m120 60c0 33.1371-26.8629 60-60 60s-60-26.8629-60-60 26.8629-60 60-60 60 26.8629 60 60z" fill="#cd201f"></path><path d="m25 49c0-7.732 6.268-14 14-14h42c7.732 0 14 6.268 14 14v22c0 7.732-6.268 14-14 14h-42c-7.732 0-14-6.268-14-14z" fill="#fff"></path><path d="m74 59.5-21 10.8253v-21.6506z" fill="#cd201f"></path></svg></span>
                  <span class="text1">Follow me</span>
                  <span class="text2">SSS</span> 
                </button>
              </div>
            
              
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="sidebar h-[100vh] bg-white transition-all z-20 absolute top-0 w-[70%] md:block">
    <div class="button-wrapper mb-5 flex justify-end">
      <button class="fa-solid fa-times text-black cursor-pointer m-4 block text-4xl" id="sidebar-close-icon">X</button>
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
</nav>

