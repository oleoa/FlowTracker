<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <script src="https://kit.fontawesome.com/cf64f43fc0.js" crossorigin="anonymous"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>@yield('title')</title>

  </head>

  <body class="h-full text-white">

    <x-navbar :current="$current" :name="auth()->user()->name"/>

    <x-sidebar :current="$current"/>
    
    <div class="xl:pl-64 xl:pt-28 xl:pb-0 pb-28 xl:pr-4 bg-secondary-100 min-h-full">

      @yield('content')

    </div>

  </body>

</html>
