<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAlumni
{
    public function handle(Request $request, Closure $next)
    {
        // Cek jika pengguna yang terautentikasi adalah alumni
        if (Auth::check() && Auth::user()->role === 'alumni') {
            return $next($request); // Izinkan akses jika role adalah alumni
        }

        // Jika tidak, arahkan ke halaman yang sesuai
        return redirect()->route('dashboard')->with('error', 'Akses ditolak. Hanya alumni yang diizinkan.');
    }
}
