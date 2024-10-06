<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function index()
    {
       // Ambil semua data alumni yang statusnya 'aktif'
       $alumnis = Alumni::where('status', 'aktif')->get();

       // Kirim data alumni ke view 'pages.admin.mahasiswa_aktif'
       return view('pages.admin.mahasiswa_aktif', compact('alumnis'));
    }
}
