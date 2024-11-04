<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    public function showDashboard(Request $request)
    {
        $perusahaan = $request->user()->perusahaan;

        return view('pages.perusahaan.dashboard', compact('perusahaan'));
    }
}
