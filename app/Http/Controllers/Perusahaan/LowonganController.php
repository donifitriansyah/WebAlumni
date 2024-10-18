<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use App\Models\Lowongan;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            'kontak' => 'required|numeric|digits_between:10,15',
        ], [
            'kontak.numeric' => "Nomor kontak hanya boleh berisi angka.",
            'kontak.digits_between' => "Nomor kontak harus memiliki panjang antara 10 sampai 15 digit.",
        ]);


        // Create a new Lowongan instance
        $lowongan = new Lowongan();
        $lowongan->judul_lowongan = $request->judul_lowongan;
        $lowongan->posisi_pekerjaan = $request->posisi_pekerjaan;

        // Handle file upload
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            // Store the image in the 'lowongan' folder within the public storage
            $path = $file->store('lowongan', 'public'); // Save to storage/app/public/lowongan
            $lowongan->gambar = $path; // Store path for public access (no 'storage/' prefix)
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
            return redirect()->back()->withErrors('Perusahaan not found for this user.')->withInput();
        }

        // Save the Lowongan instance to the database
        $lowongan->save();

        // Redirect or respond as needed
        return redirect()->route('lowongan.index')->with('success', 'Lowongan created successfully.');
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'judul_lowongan' => 'required|string|max:255',
            'posisi_pekerjaan' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 'nullable' because the image may not always be updated
            'deskripsi_pekerjaan' => 'required|string',
            'tipe_pekerjaan' => 'required|string',
            'jumlah_kandidat' => 'required|integer',
            'lokasi' => 'required|string|max:255',
            'rentang_gaji' => 'required|string|max:255',
            'pengalaman_kerja' => 'required|string|max:255',
            'kontak' => 'required|numeric|digits_between:10,15',
        ], [
            'kontak.numeric' => "Nomor kontak hanya boleh berisi angka.",
            'kontak.digits_between' => "Nomor kontak harus memiliki panjang antara 10 sampai 15 digit.",
        ]);

        // Find the existing Lowongan instance by ID
        $lowongan = Lowongan::findOrFail($id); // Throws 404 if not found

        // Update fields with the request data
        $lowongan->judul_lowongan = $request->judul_lowongan;
        $lowongan->posisi_pekerjaan = $request->posisi_pekerjaan;

        // Handle file upload (if a new image is uploaded)
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            // Store the image in the 'lowongan' folder within the public storage
            $path = $file->store('lowongan', 'public');
            $lowongan->gambar = $path; // Store path for public access
        }

        // Update the remaining fields
        $lowongan->deskripsi_pekerjaan = $request->deskripsi_pekerjaan;
        $lowongan->tipe_pekerjaan = $request->tipe_pekerjaan;
        $lowongan->jumlah_kandidat = $request->jumlah_kandidat;
        $lowongan->lokasi = $request->lokasi;
        $lowongan->rentang_gaji = $request->rentang_gaji;
        $lowongan->pengalaman_kerja = $request->pengalaman_kerja;
        $lowongan->kontak = $request->kontak;

        // No need to update the status if it's unchanged
        // Optionally, you could allow status updates here

        // Optionally, check if the perusahaan ID needs to be updated (same logic as in store)
        $perusahaan = Perusahaan::where('id_user', Auth::id())->first();
        if ($perusahaan) {
            $lowongan->id_perusahaan = $perusahaan->id_perusahaan;
        } else {
            return redirect()->back()->withErrors('Perusahaan not found for this user.')->withInput();
        }

        // Save the changes to the database
        $lowongan->save();

        // Redirect or respond as needed
        return redirect()->route('lowongan.index')->with('success', 'Lowongan updated successfully.');
    }

    public function destroy($id)
    {
        // Find the existing Lowongan instance by ID
        $lowongan = Lowongan::findOrFail($id); // Throws 404 if not found

        // Optionally, you can delete the associated image file from storage if needed
        if ($lowongan->gambar) {
            Storage::disk('public')->delete($lowongan->gambar); // Delete the image from public storage
        }

        // Delete the Lowongan instance from the database
        $lowongan->delete();

        // Redirect or respond as needed
        return redirect()->route('lowongan.index')->with('success', 'Lowongan deleted successfully.');
    }

    public function show($id_lowongan)
    {
        // Retrieve the lowongan by ID
        $lowongan = Lowongan::findOrFail($id_lowongan);

        // Return a view with the lowongan details
        return view('lowongan.show', compact('lowongan'));
    }
}
