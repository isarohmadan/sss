<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/css/app.css','resources/js/app.js'])
  <title>SSS</title>
</head>
<body class="flex flex-col h-[100vh]">
  @include('users.layouts.nav_user')
    @yield('content')
</body> 
@yield('app.js')
</html>