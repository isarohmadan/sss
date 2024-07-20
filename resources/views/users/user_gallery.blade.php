@extends('users.layouts.main' , ['navbar_category', $navbar_category])

@section('content')

<div id="scrollContainer" class="snap-x flex h-screen md:overflow-y-hidden no-scrollbar">
    <div class="h-fit md:h-full flex flex-col md:flex-row p-2 md:p-0 content">
        @foreach ($images as $image)
            <img src="{{ asset('storage/'.$image['image_path'])}}" alt="" srcset="" class="w-full h-full object-contain my-1">
        @endforeach
    </div>
</div>
@endsection