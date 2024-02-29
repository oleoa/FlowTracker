<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class MyAuth
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next): Response
  {
    $currentRouteName = $request->route()->getName();
    $allowedNotAuthRoutes = [
      "colors",
      "home",
      "login",
      "register",
      "sign.in",
      "sign.up",
      "sign.out"
    ];
    
    if(in_array($currentRouteName, $allowedNotAuthRoutes))      
      return $next($request);

    if(Auth::guest())
      return redirect()->route('home');

    return $next($request);
  }
}
