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
    public function handle(Request $request, Closure $next)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Check if the user is authenticated and has a perusahaan record
        if ($user && $user->role === 'perusahaan') {
            // Check the perusahaan status
            if ($user->perusahaan && $user->perusahaan->status === 'menunggu') {
                // Redirect to the dashboard with an error message
                return redirect()->route('dashboard')->with('error', 'Your perusahaan status is pending approval. You cannot access this area.');
            }
        } else {
            // Optionally handle cases where the user is not a perusahaan
            return redirect()->route('dashboard')->with('error', 'Unauthorized access.');
        }

        return $next($request);
    }
}
