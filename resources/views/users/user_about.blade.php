@extends('users.layouts.main' , ['navbar_category', $navbar_category])

@section('content')

<div class="snap-x flex items-center h-screen overflow-y-hidden no-scrollbar relative ">
    <div class="h-fit md:mb-5 md:about-wrapper content">
          <h4 class="text-center md:text-left text-2xl mb-3 mx-auto md:mx-10 max-w-[80%] md:max-w-[50%]">About</h4>
          <p id="about-caption" class="text-center mx-auto md:mx-10 md:text-left max-w-[80%] md:max-w-[50%] text-sm">
            Selamat datang di SegitigaSamasisi, toko vinyl yang mengajak Anda merasakan kembali keajaiban musik dalam bentuk paling autentik dan klasik. Terletak di jantung kota, SegitigaSamasisi adalah surga bagi para penggemar musik yang mencari kehangatan dan kedalaman suara analog yang hanya dapat ditemukan pada piringan hitam. Dengan koleksi vinyl yang beragam, mulai dari klasik hingga kontemporer, kami tidak hanya menjual musik, tetapi juga nostalgia dan kenangan. Di SegitigaSamasisi, setiap putaran piringan membawa Anda pada perjalanan musikal yang tak terlupakan. Jelajahi dunia musik dengan cara yang berbeda, nikmati setiap detail dari rilisan favorit Anda, dan biarkan kami membantu Anda menemukan harta karun musikal berikutnya. Selamat datang di SegitigaSamasisi, di mana musik hidup kembali.
          </p>
    </div>
</div>
@endsection