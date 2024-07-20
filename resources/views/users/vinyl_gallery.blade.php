@extends('users.layouts.main' , ['navbar_category', $navbar_category])

@section('content')
<div class="snap-x flex md:h-screen md:overflow-y-hidden no-scrollbar">
    <div class="h-full flex flex-col md:flex-row max-w-[100%] py-0 px-0">
        @foreach ($images as $image)            
            {{-- buat card: --}}
            <div class="card-wrapper w-full flex justify-center items-center px-2 md:pb-8 md:pt-10">
                <div class="card min-w-96 h-full flex flex-col items-center">
                    <div class="picture w-full h-[70%] overflow-hidden">
                        <img src="{{ asset('storage/'.$image)}}" alt="" srcset="" class="w-full h-full object-contain object-fit">
                    </div>
                    <div class="card-body m-3">
                        <h4 class="card-title text-md">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate</h4>
                        <p class="text-sm mt-5 font-bold">0</p>
                    </div>
                </div>
            </div> 

        @endforeach
    </div>
</div>
@endsection