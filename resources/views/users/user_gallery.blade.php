@extends('users.layouts.main')

@section('content')
<div class="snap-x flex h-screen overflow-y-hidden no-scrollbar">
    <div class="h-full flex py-0 px-0">
        @foreach ($images as $image)
            <img src="{{ asset('storage/'.$image)}}" alt="" srcset="" class="w-full h-full object-contain">
        @endforeach
    </div>
</div>
@endsection