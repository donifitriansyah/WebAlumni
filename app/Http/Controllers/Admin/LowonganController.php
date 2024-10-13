<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lowongan;
use Illuminate\Http\Request;

class LowonganController extends Controller
{
    public function showLowongan() {
        $lowonganValdiasi = Lowongan::where('status', 'active')->get(); //belum diape apekan
        return view('pages.admin.alumni-pasif', compact('alumniPasif'));
    }
}
