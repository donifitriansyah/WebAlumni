<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminLowonganController;
use App\Http\Controllers\Admin\AdminTracerController;
use App\Http\Controllers\Admin\AlumniController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\PertanyaanController;
use App\Http\Controllers\Alumni\TracerController;
use App\Http\Controllers\Alumni\ProfileAlumniController;
use App\Http\Controllers\Alumni\LamaranAlumniController;
use App\Http\Controllers\Alumni\HistoryAlumniController;
use App\Http\Controllers\Alumni\JobAlumniController;
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
use App\Http\Controllers\Admin\LowonganController;
use App\Http\Controllers\Alumni\AlumniTracerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LamaranController;
use App\Http\Controllers\Perusahaan\LowonganController as PerusahaanLowonganController;


// Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/alumni', [HomeController::class, 'indexAlumni'])->name('alumni');

Route::get('/loker', [HomeController::class, 'indexLowongan'])->name('loker');

Route::get('/loker/{id_lowongan}', [HomeController::class, 'detailLowongan'])->name('loker.detail');




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
// Route::get('/dashboard/alumni', [AdminTracerController::class, 'check_data_alumni'])->name('dashboard.alumni');

// Dashboard Route for Perusahaan
Route::get('/dashboard/perusahaan', function () {
    return view('pages.perusahaan.dashboard'); // Company dashboard
})->middleware(['auth',])->name('dashboard.perusahaan');

// Admin Routes
Route::middleware(['auth', CheckAdmin::class])->group(function () {
    Route::get('/pertanyaan', [PertanyaanController::class, 'index'])->name('pertanyaan.index');
    Route::post('/pertanyaan/create/tambah', [PertanyaanController::class, 'store'])->name('pertanyaan.store');
    Route::get('/pertanyaan/create', [PertanyaanController::class, 'create'])->name('pertanyaan.create');
    Route::get('/pertanyaan/{id}/edit', [PertanyaanController::class, 'edit'])->name('pertanyaan.edit');
    Route::put('/pertanyaan/{id}', [PertanyaanController::class, 'update'])->name('pertanyaan.update');
    Route::delete('/pertanyaan/{id}', [PertanyaanController::class, 'delete'])->name('pertanyaan.delete');

    Route::post('/tracer', [AdminTracerController::class, 'store'])->name('tracer.store');
    Route::get('/tracer', [AdminTracerController::class, 'index'])->name('tracer.index');
    Route::get('/tracer/{id}', [AdminTracerController::class, 'data_by_user'])->name('tracer.data');
    Route::get('/tracer-by-status/{status}', [AdminTracerController::class, 'data_by_status'])->name('tracer.data-by-status');

    Route::get('/kuisioner', [AdminTracerController::class, 'kuisioner'])->name('kuisioner.alumni');
    Route::get('/alumni-pasif', [AlumniController::class, 'showPasifAlumni'])->name('alumni-pasif');
    Route::get('/alumni-aktif', [AlumniController::class, 'showAktifAlumni'])->name('alumni-aktif');
    Route::get('/perusahaan/diterima', [PerusahaanController::class, 'showPerusahaanActive'])->name('perusahaan-diterima');
    Route::get('/perusahaan/divalidasi', [PerusahaanController::class, 'showPerusahaanNonactive'])->name('perusahaan-divalidasi');
    Route::post('/perusahaan-diterima/{id}', [PerusahaanController::class, 'terima_perusahaan'])->name('terima-perusahaan');
    Route::post('/perusahaan-ditolak/{id}', [PerusahaanController::class, 'tolak_perusahaan'])->name('tolak-perusahaan');
    Route::get('/dashboard/admin', [AdminDashboardController::class, 'showDashboard'])->name('dashboard.admin');
    Route::get('/admin/edit/{id_admin}', [AdminController::class, 'create'])->name('admin.create');
    Route::put('/admin/{id_admin}/edit', [AdminController::class, 'update'])->name('admin.update');
    Route::get('/lowongan-diterima', [AdminLowonganController::class, 'showLowonganDiterima'])->name('lowongan-diterima');
    Route::get('/lowongan-divalidasi', [AdminLowonganController::class, 'showLowonganDivalidasi'])->name('lowongan-divalidasi');
    Route::post('/lowongan-diterima/{id}', [AdminLowonganController::class, 'terima_lowongan'])->name('terima-lowongan');
    Route::post('/lowongan-ditolak/{id}', [AdminLowonganController::class, 'tolak_lowongan'])->name('tolak-lowongan');
    Route::get('/list-pertanyaan', [AdminTracerController::class, 'index'])->name('data_pertanyaan');
    Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::post('/berita/tambah-data', [BeritaController::class, 'store'])->name('berita.store');
    Route::put('/berita/update-data/{id}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');
});

Route::middleware(['auth', CheckPerusahaan::class])->group(function () {
    Route::get('/lowongan', [PerusahaanLowonganController::class, 'index'])->name('lowongan.index');
    Route::post('/lowongan/tambah-data', [PerusahaanLowonganController::class, 'store'])->name('lowongan.store');
    Route::put('/lowongan/update-data/{id}', [PerusahaanLowonganController::class, 'update'])->name('lowongan.update');
    Route::delete('/lowongan/{id}', [PerusahaanLowonganController::class, 'destroy'])->name('lowongan.destroy');
});

Route::middleware(['auth', CheckTracerStudy::class])->group(function () {
    Route::get('/dashboard/alumni', function () {
        return view('pages.alumni.dashboard_alumni'); // Alumni dashboard
    })->middleware(['auth', 'verified',])->name('dashboard.alumni');

    Route::get('/profile/alumni/{id_alumni}', [ProfileAlumniController::class, 'index'])->name('profile.index');
    Route::put('/profile/alumni-update/{id_alumni}', [ProfileAlumniController::class, 'update'])->name('profile.update');
    Route::get('/lowongan', [PerusahaanLowonganController::class, 'index'])->name('lowongan.index');
    Route::get('/lamaran/alumni', [LamaranAlumniController::class, 'index'])->middleware(['auth', 'verified'])->name('lamaran.alumni');
    Route::get('/history/lamaran', [HistoryAlumniController::class, 'index'])->name('history.lamaran');
    Route::get('/job/save', [JobAlumniController::class, 'index'])->name('job');
});

Route::middleware(['auth', CheckAlumni::class])->group(function () {
    Route::get('/tracer-study/form', [AlumniTracerController::class, 'create'])->name('tracerstudy.form');
    Route::post('/tracer-study/store', [AlumniTracerController::class, 'store'])->name('tracerstudy.store');
    Route::post('/lamaran/store', [LamaranController::class, 'store'])->name('lamaran.store'); 
    Route::get('/lamaran/create', [LamaranController::class, 'create'])->name('lamaran.create');
});


require __DIR__ . '/auth.php';
