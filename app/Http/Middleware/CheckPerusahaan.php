<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckPerusahaan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek jika pengguna yang terautentikasi adalah alumni
        if (Auth::check() && Auth::user()->role === 'perusahaan') {
            return $next($request); // Izinkan akses jika role adalah alumni
        }

        // Jika tidak, arahkan ke halaman yang sesuai
        return redirect()->route('dashboard')->with('error', 'Akses ditolak. Hanya Perusahaan yang disetujui yang diizinkan.');
    }
}
