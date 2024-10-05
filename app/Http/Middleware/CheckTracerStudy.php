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
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Pastikan pengguna adalah alumni
            if ($user->role == 'alumni') {
                $alumniId = $user->alumni->id_alumni; // Ambil id_alumni dari relasi

                // Periksa apakah alumni sudah mengisi tracer study
                $tracerStudyExists = TracerStudy::where('id_alumni', $alumniId)->exists();

                // Jika alumni belum mengisi tracer study, redirect ke form
                if (!$tracerStudyExists && $request->path() !== 'tracer-study/form') {
                    return redirect()->route('tracerstudy.form');
                }

                // Jika alumni sudah mengisi tracer study, redirect ke dashboard
                if ($tracerStudyExists && $request->path() === 'tracer-study/form') {
                    return redirect()->route('dashboard.alumni')->with('info', 'Anda sudah mengisi tracer study.');
                }
            }
        }

        return $next($request);
    }
}
