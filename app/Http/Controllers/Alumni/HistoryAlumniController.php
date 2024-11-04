<?php

namespace App\Http\Controllers\Alumni;

use App\Http\Controllers\Controller;
use App\Models\Lamaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryAlumniController extends Controller
{

    public function index()
{
    $alumni = Auth::user()->alumni;

    // Ensure that the alumni exists
    if (!$alumni) {
        return redirect()->route('home')->with('error', 'Alumni not found.');
    }

    // Get the alumni ID from the authenticated user
    $alumniId = $alumni->id_alumni;

    // Retrieve applications for the company's job openings with status "diterima" and "ditolak"
    $lamarans = Lamaran::with('lowongan') // Assuming there's a relation named 'lowongan'
        ->where('id_alumni', $alumniId)
        ->whereIn('status', ['terima', 'ditolak'])
        ->get();

    // Return the view with the filtered job application details
    return view('pages.alumni.history', compact('lamarans'));
}

}
