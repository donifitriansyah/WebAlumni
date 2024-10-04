<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    // Cek role pengguna dan arahkan ke halaman yang sesuai
    if (Auth::user()->role === 'admin') {
        return view('pages.admin.dashboard'); // Halaman admin
    } elseif (Auth::user()->role === 'alumni') {
        return view('pages.alumni.dashboard'); // Halaman alumni
    } elseif (Auth::user()->role === 'perusahaan') {
        return view('pages.perusahaan.dashboard'); // Halaman perusahaan
    }

    // Redirect ke halaman default jika role tidak dikenali
    return redirect('/'); // Ganti dengan route yang sesuai
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
