<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  @vite(['resources/css/app.css','resources/js/app.js'])
  
  <title>SSS</title>
</head>

<body class="flex flex-col h-[100vh] m-0 p-0">
  <div class="preloader">
    <div class="loader"></div>
  </div>
    @include('users.layouts.nav_user' , ['navbar_category', $navbar_category])
    @yield('content')
</body> 
@yield('app.js')
@yield('script')
</html>