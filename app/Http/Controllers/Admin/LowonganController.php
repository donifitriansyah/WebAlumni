<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LowonganController extends Controller
{
    public function showLowongan() {
        $lowonganValdiasi = Alumni::where('status', 'active')->get();
        return view('pages.admin.alumni-pasif', compact('alumniPasif'));
    }
}
