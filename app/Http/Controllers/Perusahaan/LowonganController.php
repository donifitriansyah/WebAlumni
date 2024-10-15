<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use App\Models\Lowongan;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LowonganController extends Controller
{
    public function index()
    {
        $lowongans = Lowongan::with('perusahaan')->get(); // Menampilkan lowongan dengan perusahaan terkait
        return view('pages.perusahaan.lowongan', compact('lowongans'));
    }
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'judul_lowongan' => 'required|string|max:255',
            'posisi_pekerjaan' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi_pekerjaan' => 'required|string',
            'tipe_pekerjaan' => 'required|string',
            'jumlah_kandidat' => 'required|integer',
            'lokasi' => 'required|string|max:255',
            'rentang_gaji' => 'required|string|max:255',
            'pengalaman_kerja' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
        ]);

        // Create a new Lowongan instance
        $lowongan = new Lowongan();
        $lowongan->judul_lowongan = $request->judul_lowongan;
        $lowongan->posisi_pekerjaan = $request->posisi_pekerjaan;

        // Handle file upload
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            // Store the image in the 'lamaran' folder within the storage
            $path = $file->store('lowongan', 'public'); // Save to storage/app/public/lamaran
            $lowongan->gambar = 'storage/' . $path; // Store path for public access
        }

        $lowongan->deskripsi_pekerjaan = $request->deskripsi_pekerjaan;
        $lowongan->tipe_pekerjaan = $request->tipe_pekerjaan;
        $lowongan->jumlah_kandidat = $request->jumlah_kandidat;
        $lowongan->lokasi = $request->lokasi;
        $lowongan->rentang_gaji = $request->rentang_gaji;
        $lowongan->pengalaman_kerja = $request->pengalaman_kerja;
        $lowongan->kontak = $request->kontak;

        // Set the status to "menunggu"
        $lowongan->status = 'menunggu';

        // Get the perusahaan ID associated with the authenticated user
        $perusahaan = Perusahaan::where('id_user', Auth::id())->first();
        if ($perusahaan) {
            $lowongan->id_perusahaan = $perusahaan->id_perusahaan; // Set id_perusahaan
        } else {
            return redirect()->back()->withErrors('Perusahaan not found for this user.');
        }

        // Save the Lowongan instance to the database
        $lowongan->save();

        // Redirect or respond as needed
        return redirect()->route('lowongan.index')->with('success', 'Lowongan created successfully.');
    }
}
