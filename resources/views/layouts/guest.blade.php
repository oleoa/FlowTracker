<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    @vite(['resources/css/app.css', 'resources/js/guest.js'])

    <title>@yield('title')</title>

  </head>

  <body class="grid grid-rows-1 min-h-screen">
    
    <div class="row-span-1">

      @yield('content')

    </div>

  </body>

</html>