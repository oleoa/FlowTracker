<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <script src="https://kit.fontawesome.com/cf64f43fc0.js" crossorigin="anonymous"></script>

    @vite(['resources/css/app.css', 'resources/js/error.js'])

    <title>@yield('title')</title>

  </head>

  <body class="grid grid-rows-1 h-full">
    
    <div class="row-span-1">

      <main class="bg-secondary-100 w-full h-full z-20 flex flex-col justify-center items-center gap-4">

        <h1 class="text-white/0 bg-gradient-to-br from-primary-200 to-primary-300 bg-clip-text text-9xl">@yield('code')</h1>
        <h2 class="text-white/0 bg-gradient-to-br from-primary-100 to-primary-300 bg-clip-text text-4xl pb-1">@yield('description')</h2>
        <a href="{{route('dashboard')}}" class="bg-white text-black font-bold hover:bg-gradient-to-br hover:from-primary-200 hover:to-primary-300 hover:text-white px-4 py-2 cursor-pointer rounded">Go back to dashboard</a>
    
      </main>

    </div>

  </body>

</html>
