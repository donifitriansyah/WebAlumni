<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function showPasifAlumni()
    {
        $alumniPasif = Alumni::where('status', 'active')->get();
        return view('pages.admin.alumni-pasif', compact('alumniPasif'));
    }
    public function showAktifAlumni()
    {
        $alumniAktif = Alumni::where('status', 'inactive')->get();
        return view('pages.admin.alumni-aktif', compact('alumniAktif'));
    }
}
