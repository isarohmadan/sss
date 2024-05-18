@extends('users.layouts.main')

@section('content')
<div id="scrollContainer" class="snap-x flex h-screen md:overflow-y-hidden no-scrollbar">
    <div class="h-fit md:h-full flex flex-col md:flex-row p-2 md:p-0">
        @foreach ($images as $image)
            <img src="{{ asset('storage/'.$image)}}" alt="" srcset="" class="w-full h-full object-contain my-1">
        @endforeach
    </div>
</div>
@endsection