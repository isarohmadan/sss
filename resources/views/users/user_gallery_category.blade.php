@extends('users.layouts.main', ['navbar_category', $navbar_category])
@section('content')
  <div id="scrollContainer" class="snap-x flex h-screen md:overflow-y-hidden no-scrollbar content">
    @foreach ($navbar_category['navbar_gallery'] as $category)
    <div class="h-fit md:h-full flex flex-col md:flex-row p-2 md:p-0 relative">
      <a href="{{ route('gallery_picture',['type'=>$category['slug']])}}" class="">
        <img src="{{ asset('storage/'.$category['image_cover_path'])}}" alt="" srcset="" class="h-full object-contain my-1">
        <div class="absolute inset-0 flex items-center justify-center text-white text-2xl font-bold opacity-0 bg-black  hover:opacity-100 bg-black/50  transition-opacity duration-700">
          <span class="text-white uppercase">{{$category['title']}}</span>
        </div>
      </a>
    </div>
    @endforeach
</div>
@endsection
