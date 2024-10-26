<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use App\Models\Lamaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerusahaanLamaranController extends Controller
{
    // In PerusahaanLowonganController.php
    public function index()
    {

        // Get the authenticated user's associated perusahaan
        $perusahaan = Auth::user()->perusahaan;

        // Ensure that the perusahaan exists
        if (!$perusahaan) {
            return redirect()->route('home')->with('error', 'Company not found.');
        }

        // Get the perusahaan ID from the authenticated user
        $perusahaanId = $perusahaan->id_perusahaan;

        // Retrieve applications for the company's job openings
        $lamarans = Lamaran::with('lowongan') // Assuming there's a relation named 'lowongan'
            ->whereHas('lowongan', function ($query) use ($perusahaanId) {
                $query->where('id_perusahaan', $perusahaanId);
            })
            ->get();

        // Return the view with the retrieved lamaran data
        return view('pages.perusahaan.lamaran', compact('lamarans'));
    }


}
