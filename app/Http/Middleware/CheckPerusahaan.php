<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckPerusahaan
{
    public function handle(Request $request, Closure $next): Response
    {
        // Check if authenticated user is a company (perusahaan)
        if (Auth::check() && Auth::user()->role === 'perusahaan') {
            return $next($request); // Allow access if the user is a company
        }

        // If not, redirect to the dashboard with an error message
        return redirect()->route('dashboard')->with('error', 'Akses ditolak. Hanya Perusahaan yang diizinkan.');
    }
}
