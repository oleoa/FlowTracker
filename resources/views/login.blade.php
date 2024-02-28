@extends('layouts.guest')
@section('title', 'Login')
@section('content')

  <!-- Background -->
  <main class="bg-gradient-to-br from-primary-100 to-primary-300 w-full h-full flex flex-col items-center justify-center">

    <!-- Image -->
    <div class="w-11/12 h-5/6 flex flex-col items-center justify-center rounded-xl bg-center" style="background-image: url('/img/sign/4.jpg')">

      <!-- Login Blur Form -->
      <form action="{{route('sign.in')}}" method="POST" class="rounded-xl flex flex-col items-center justify-start gap-6 backdrop-blur p-8 w-1/3 h-3/5 border-2 border-white">
        @csrf
    
        <!-- Title -->
        <h1 class="py-4">Login</h1>

        <!-- Email -->
        <input type="email" name="" id="" placeholder="Email" class="bg-white/0 border-2 border-white placeholder:text-white">

        <!-- Password -->
        <input type="password" name="" id="" placeholder="Password" class="bg-white/0 border-2 border-white placeholder:text-white">

        <!-- Remember me and Forgot Password -->
        <div class="grid grid-cols-2 w-full">

          <!-- Remember me -->
          <div class="flex items-center gap-2">

            <input type="checkbox" name="remember" id="remember" class="h-full w-fit">

            <label for="remember" class="text-white select-none">Remember me</label>

          </div>

          <!-- Forgot Password -->
          <div class="w-full flex justify-end">

            <a href="" class="text-white hover:text-white/0 hover:bg-gradient-to-br hover:from-primary-200 hover:to-primary-300 bg-clip-text">Forgot Password?</a>

          </div>

        </div>

        <!-- Submit -->
        <input type="submit" value="Login" class="bg-white font-bold hover:bg-gradient-to-br hover:from-primary-200 hover:to-primary-300 hover:text-white">

        <!-- Sign up -->
        <span class="text-white">Don't have an account? <a href="{{route('sign.up')}}" class="hover:text-white/0 hover:bg-gradient-to-br hover:from-primary-200 hover:to-primary-300 bg-clip-text">Sign up</a></span>

      </form>

    </div>

  </main>

@endsection
