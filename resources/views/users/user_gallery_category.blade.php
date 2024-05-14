@extends('users.layouts.main')

@section('content')
<div class="snap-x flex h-screen">
    <a href="{{ route('gallery_picture',['type'=>'panggung musik kecil'])}}" class="snap-start h-full shrink-0 slide-item-1 relative">
      <img src="https://source.unsplash.com/random/1" alt="" srcset="">
      <div class="absolute inset-0"></div>
      <div class="absolute inset-0 flex items-center justify-center text-white text-2xl font-bold opacity-0 bg-black  hover:opacity-100 bg-black/50  transition-opacity duration-700">
        <span>Panggung Kecil</span>
      </div>
    </a>
    <a href="{{ route('gallery_picture',['type'=>'vinyl']) }}" class="snap-start h-full shrink-0 slide-item-2 relative">
      <img src="https://source.unsplash.com/random/2" alt="" srcset="">
      <div class="absolute inset-0"></div>
      <div class="absolute inset-0 flex items-center justify-center text-white text-2xl font-bold opacity-0 bg-black hover:opacity-100 bg-black/50  transition-opacity duration-700">
        <span>Vinyl Pop Up</span>
      </div>
    </a>
    <a href="{{ route('gallery_picture',['type'=>'dj']) }}" class="snap-start h-full shrink-0 slide-item-3 relative">
      <img src="https://source.unsplash.com/random/3" alt="" srcset="">
      <div class="absolute inset-0"></div>
      <div class="absolute inset-0 flex items-center justify-center text-white text-2xl font-bold opacity-0 bg-black hover:opacity-100 bg-black/50  transition-opacity duration-700">
        <span>DJ</span>
      </div>
    </a>
  </div>
@endsection
