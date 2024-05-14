@extends('users.layouts.main')

@section('content')
<div class="snap-x flex h-screen overflow-y-hidden no-scrollbar">
    <div class="h-full flex py-0 px-0">
        @foreach ($images as $image)            
            {{-- buat card: --}}
            <div class="card-wrapper w-full flex justify-center items-center pb-8 pt-10">
                <div class="card min-w-96 h-full flex flex-col items-center">
                    <div class="picture w-full h-[70%] overflow-hidden">
                        <img src="{{ asset('storage/'.$image)}}" alt="" srcset="" class="w-full h-full object-contain object-fit">
                    </div>
                    <div class="card-body m-3">
                        <h4 class="card-title text-md">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate</h4>
                        <p class="text-sm mt-5 font-bold">00000 IDR</p>
                    </div>
                </div>
            </div> 

        @endforeach
    </div>
</div>
@endsection