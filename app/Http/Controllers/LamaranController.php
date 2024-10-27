<?php

namespace App\Http\Controllers;

use App\Models\Lamaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LamaranController extends Controller
{
    public function store(Request $request)
    {
        // Validate incoming request
        $validatedData = $request->validate([
            'id_lowongan' => 'required|exists:lowongan,id_lowongan',
            'id_alumni' => 'required|exists:alumni,id_alumni',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'transkrip_nilai' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'portofolio' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // Check if the alumni has already applied for this job
        $existingApplication = Lamaran::where('id_lowongan', $validatedData['id_lowongan'])
            ->where('id_alumni', $validatedData['id_alumni'])
            ->first();

        if ($existingApplication) {
            return redirect()->back()->with('error', 'Anda sudah mengajukan lamaran untuk pekerjaan ini.');
        }

        // Handle file uploads using the public disk
        $cvPath = $request->file('cv')->store('uploads/cvs', 'public');
        $transkripPath = $request->file('transkrip_nilai') ? $request->file('transkrip_nilai')->store('uploads/transkrip', 'public') : null;
        $portofolioPath = $request->file('portofolio') ? $request->file('portofolio')->store('uploads/portofolio', 'public') : null;

        // Create the application record
        Lamaran::create([
            'id_lowongan' => $validatedData['id_lowongan'],
            'id_alumni' => $validatedData['id_alumni'],
            'nama' => $validatedData['nama'],
            'email' => $validatedData['email'],
            'cv' => $cvPath,
            'transkrip_nilai' => $transkripPath,
            'portofolio' => $portofolioPath,
        ]);

        return redirect()->route('loker')->with('success', 'Lamaran berhasil diajukan!');
    }



    public function create(Request $request)
    {
        $id_lowongan = $request->get('id_lowongan'); // Get the id_lowongan from the query parameter

        return view('pages.lowongan-apply', compact('id_lowongan'));
    }
}
