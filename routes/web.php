<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AlumniController;
use App\Http\Controllers\Admin\PertanyaanController;
use App\Http\Controllers\Alumni\TracerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TracerStudyController;
use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckAlumni;
use App\Http\Middleware\CheckTracerStudy;
use App\Models\TracerStudy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PerusahaanController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Middleware\CheckPerusahaan;









// Home Route
Route::get('/', function () {
    return view('welcome');
});

// // Tracer Study Routes
// Route::middleware(['auth'])->group(function () {
//     Route::get('/tracer-study/form', [TracerController::class, 'create'])->name('tracerstudy.form');
//     Route::post('/tracer-study/store', [TracerController::class, 'store'])->name('tracerstudy.store');
// });

// // Main Dashboard Route
// Route::get('/dashboard', function () {
//     $user = Auth::user();

//     // Redirect based on user role
//     switch ($user->role) {
//         case 'alumni':
//             return redirect()->route('dashboard.alumni');
//         case 'admin':
//             return redirect()->route('dashboard.admin');
//         case 'perusahaan':
//             return redirect()->route('dashboard.perusahaan');
//         default:
//             return redirect('/'); // Redirect to home if role not recognized
//     }
// })->middleware(['auth', 'verified'])->name('dashboard');

// // Dashboard Route for Alumni
// Route::get('/dashboard/alumni', function () {
//     $user = Auth::user();


//     return view('pages.alumni.dashboard_alumni'); // Alumni dashboard
// })->middleware(['auth', 'verified', CheckTracerStudy::class ])->name('dashboard.alumni');

// // Dashboard Route for Admin


// // Dashboard Route for Perusahaan
// Route::get('/dashboard/perusahaan', function () {
//     return view('pages.perusahaan.dashboard'); // Company dashboard
// })->middleware(['auth', CheckAlumni::class])->name('dashboard.perusahaan');

// // Profile Routes
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// Admin Routes
// Route::middleware(['auth', CheckAdmin::class])->group(function () {
//     Route::get('/pertanyaan', [PertanyaanController::class, 'index'])->name('pertanyaan.index');
//     Route::post('/pertanyaan', [PertanyaanController::class, 'store'])->name('pertanyaan.store');
//     Route::get('/pertanyaan/create', [PertanyaanController::class, 'create'])->name('pertanyaan.create');
//     Route::get('/pertanyaan/{id}/edit', [PertanyaanController::class, 'edit'])->name('pertanyaan.edit');
//     Route::put('/pertanyaan/{id}', [PertanyaanController::class, 'update'])->name('pertanyaan.update');
//     Route::get('/alumni-pasif', [AlumniController::class, 'showPasifAlumni'])->name('alumni-pasif');
//     Route::get('/alumni-aktif', [AlumniController::class, 'showAktifAlumni'])->name('alumni-aktif');
//     Route::get('/perusahaan-diterima', [PerusahaanController::class, 'create'])->name('perusahaan-diterima');
// });

// Admin Routes


// Route::middleware(['auth', CheckAdmin::class])->group(function () {
//     Route::get('/pertanyaan', [PertanyaanController::class, 'index'])->name('pertanyaan.index');
//     Route::post('/pertanyaan', [PertanyaanController::class, 'store'])->name('pertanyaan.store');
//     Route::get('/pertanyaan/create', [PertanyaanController::class, 'create'])->name('pertanyaan.create');
//     Route::get('/pertanyaan/{id}/edit', [PertanyaanController::class, 'edit'])->name('pertanyaan.edit');
//     Route::put('/pertanyaan/{id}', [PertanyaanController::class, 'update'])->name('pertanyaan.update');

//     Route::get('/alumni-pasif', [AlumniController::class, 'showPasifAlumni'])->name('alumni-pasif');
//     Route::get('/alumni-aktif', [AlumniController::class, 'showAktifAlumni'])->name('alumni-aktif');

//     Route::get('/perusahaan/diterima', [PerusahaanController::class, 'create'])->name('perusahaan-diterima');

//     Route::get('/dashboard', function () {
//         return view('pages.admin.dashboard'); })->name('dashboard.admin');
// });
// Route::get('/dashboard', function () {
//     return view('pages.admin.dashboard'); // Admin dashboard
// })->middleware(['auth', CheckAdmin::class])->name('dashboard.admin');

//perusahaan routes

    // Route::middleware(['auth', CheckPerusahaan::class])->group(function () { // Tambahkan middleware CheckPerusahaan di sini
    //     Route::get('/perusahaan/diterima', [PerusahaanController::class, 'index'])->name('perusahaan-diterima');
    //     Route::get('/perusahaan/divalidasi', [PerusahaanController::class, 'divalidasi'])->name('perusahaan-divalidasi');
    //     Route::post('/perusahaan/{id}/terima', [PerusahaanController::class, 'terima'])->name('perusahaan-terima');
    //     Route::post('/perusahaan/{id}/tolak', [PerusahaanController::class, 'tolak'])->name('perusahaan-tolak');
    // });

    // Routes for perusahaan with middleware
// Route::middleware(['auth', 'check.perusahaan'])->group(function () {
//     // Route for accepted companies
//     Route::get('/perusahaan/diterima', [PerusahaanController::class, 'index'])->name('perusahaan-diterima');

//     // Route for companies being validated
//     Route::get('/perusahaan/divalidasi', [PerusahaanController::class, 'divalidasi'])->name('perusahaan-divalidasi');

//     // Route to accept a company
//     Route::patch('/perusahaan/{id}/terima', [PerusahaanController::class, 'terima'])->name('perusahaan-terima');

//     // Route to reject a company
//     Route::delete('/perusahaan/{id}/tolak', [PerusahaanController::class, 'tolak'])->name('perusahaan-tolak');
// });



// Main Dashboard Route
Route::get('/dashboard', function () {
    $user = Auth::user();

    // Redirect based on user role
    switch ($user->role) {
        case 'alumni':
            return redirect()->route('dashboard.alumni');
        case 'admin':
            return redirect()->route('dashboard.admin');
        case 'perusahaan':
            return redirect()->route('dashboard.perusahaan');
        default:
            return redirect('/'); // Redirect to home if role not recognized
    }
})->middleware(['auth', 'verified'])->name('dashboard');

// Dashboard Route for Admin
Route::get('/dashboard/admin', function () {
    return view('pages.admin.dashboard'); // Admin dashboard
})->middleware(['auth', CheckAdmin::class])->name('dashboard.admin');

// Dashboard Route for Alumni
Route::get('/dashboard/alumni', function () {
    return view('pages.alumni.dashboard_alumni'); // Alumni dashboard
})->middleware(['auth', 'verified', CheckTracerStudy::class])->name('dashboard.alumni');

// Dashboard Route for Perusahaan
Route::get('/dashboard/perusahaan', function () {
    return view('pages.perusahaan.dashboard'); // Company dashboard
})->middleware(['auth', CheckAlumni::class])->name('dashboard.perusahaan');

// Admin Routes
Route::middleware(['auth', CheckAdmin::class])->group(function () {
    Route::get('/pertanyaan', [PertanyaanController::class, 'index'])->name('pertanyaan.index');
    Route::post('/pertanyaan', [PertanyaanController::class, 'store'])->name('pertanyaan.store');
    Route::get('/pertanyaan/create', [PertanyaanController::class, 'create'])->name('pertanyaan.create');
    Route::get('/pertanyaan/{id}/edit', [PertanyaanController::class, 'edit'])->name('pertanyaan.edit');
    Route::put('/pertanyaan/{id}', [PertanyaanController::class, 'update'])->name('pertanyaan.update');
    Route::get('/alumni-pasif', [AlumniController::class, 'showPasifAlumni'])->name('alumni-pasif');
    Route::get('/alumni-aktif', [AlumniController::class, 'showAktifAlumni'])->name('alumni-aktif');
    Route::get('/perusahaan/diterima', [PerusahaanController::class, 'showPerusahaanActive'])->name('perusahaan-diterima');
    Route::get('/perusahaan/divalidasi', [PerusahaanController::class, 'showPerusahaanNonactive'])->name('perusahaan-divalidasi');
    Route::get('/dashboard/admin', [AdminDashboardController::class, 'showDashboard'])->name('dashboard.admin');

});


// Include the authentication routes
require __DIR__.'/auth.php';
