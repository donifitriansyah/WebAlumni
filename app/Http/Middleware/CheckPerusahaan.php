<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckPerusahaan
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'perusahaan') {
            return $next($request);
        }

        return redirect()->route('dashboard');  // Pastikan ini sesuai
    }
}
