<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lowongan;
use Illuminate\Http\Request;

class LowonganController extends Controller
{
    public function lowonganDiterima()
    {
        $lowonganDiterima = Lowongan::where('status', 'accepted')->get();
        return view('pages.admin.lowongan-diterima', compact('lowonganDiterima'));
    }

    public function lowonganDivalidasi()
    {
        $lowonganDivalidasi = Lowongan::where('status', 'validated')->get();
        return view('pages.admin.lowongan-divalidasi', compact('lowonganDivalidasi'));
    }
}
