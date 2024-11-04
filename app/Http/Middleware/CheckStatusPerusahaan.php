<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckStatusPerusahaan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Check if the user's perusahaan status is "menunggu"
        if ($user->perusahaan && $user->perusahaan->status === 'menunggu') {
            // Redirect to the dashboard with a message if status is "menunggu"
            return redirect()->route('dashboard')->with('info', 'Your account is awaiting approval.');
        }

        return $next($request);
    }
}
