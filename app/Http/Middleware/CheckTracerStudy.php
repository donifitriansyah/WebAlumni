<?php

namespace App\Http\Middleware;

use App\Models\TracerStudy;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class CheckTracerStudy
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Check if the user is an alumni
            if ($user->role === 'alumni') {
                // Check the status of the alumni
                if ($user->alumni->status === 'aktif') {
                    // Redirect to dashboard if they try to access the tracer study form
                    if ($request->is('tracer-study/form')) {
                        return redirect()->route('dashboard.alumni')->with('warning', 'Anda sudah mengisi tracer study.');
                    }
                } elseif ($user->alumni->status === 'pasif') {
                    // Redirect to the tracer study form if they haven't filled it yet
                    if (!$request->is('tracer-study/form')) {
                        return redirect()->route('tracerstudy.form')->with('warning', 'Anda harus mengisi tracer study sebelum mengakses dashboard.');
                    }
                }
            }
        }

        return $next($request);
    }
}
