@extends('users.layouts.main' , ['navbar_category', $navbar_category])

@section('content')
<div class="snap-x flex md:h-screen md:overflow-y-hidden no-scrollbar ">
    <div class="h-full flex flex-col md:flex-row max-w-[100%] py-0 px-0 content">
        @foreach ($data as $single_data)            
            {{-- buat card: --}}
            <a href="{{ route('product_specific',['merch_type'=>$single_data['category_id'],'slug_merch'=>$single_data['slug_merch']]) }}" class="card-wrapper w-full flex justify-center items-center pb-5 pt-7 md:pb-8 md:pt-10">
                <div class="card min-w-96 h-full grid grid-rows-3 p-5 ">
                    <div class="picture w-full h-[70%] overflow-hidden row-span-3">
                        <img src="{{ asset('storage/'.$single_data['merch_cover_front'])}}" alt="" srcset="" class="w-full h-full object-contain bg-center">
                    </div>
                    <div class="">
                        <h4 class="card-title text-center text-md"><?= $single_data['title'] ?></h4>
                        <p class="text-sm mt-3 font-bold text-center format-rupiah"><?=$single_data['price']?></p>
                    </div>
                </div>
            </a> 

        @endforeach
    </div>
</div>
@endsection