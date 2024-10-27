<?php

namespace App\Http\Controllers\Alumni;

use App\Http\Controllers\Controller;
use App\Models\Lamaran;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LamaranAlumniController extends Controller
{
    public function index()
    {
        $alumni = Auth::user()->alumni;

    // Ensure that the alumni exists
    if (!$alumni) {
        return redirect()->route('home')->with('error', 'Company not found.');
    }

    // Get the alumni ID from the authenticated user
    $alumniId = $alumni->id_alumni;

    // Retrieve applications for the company's job openings
    $lamarans = Lamaran::with('lowongan') // Assuming there's a relation named 'lowongan'
        ->where('id_alumni', $alumniId)
        ->get();

    // Return the view with the job application details
    return view('pages.alumni.lamaran', compact('lamarans'));
    }
}
