<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::all();
        return view('pages.admin.berita', compact('berita'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'judul_berita' => 'required|string|max:255',
            'tanggal_terbit' => 'required|date',
            'deskripsi_berita' => 'required|string',
            'link' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Create a new berita instance
        $berita = new Berita();
        $berita->judul_berita = $request->judul_berita;
        $berita->tanggal_terbit = $request->tanggal_terbit;
        $berita->deskripsi_berita = $request->deskripsi_berita;
        $berita->link = $request->link;

        // Handle file upload
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            // Store the image in the 'berita' folder within the public storage
            $path = $file->store('berita', 'public'); // Save to storage/app/public/berita
            $berita->gambar = $path; // Store path for public access (no 'storage/' prefix)
        }

        // Save the berita instance to the database
        $berita->save();

        // Redirect or respond as needed
        return redirect()->route('berita.index')->with('success', 'berita created successfully.');
    }

    public function update(Request $request, $id)
{
    // Validasi input data
    $request->validate([
        'judul_berita' => 'required|string|max:255',
        'tanggal_terbit' => 'required|date',
        'deskripsi_berita' => 'required|string|max:255',
        'link' => 'required|string|max:255',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // gambar tidak wajib diisi
    ]);

    // Cari berita berdasarkan ID
    $berita = Berita::findOrFail($id);
    $berita->judul_berita = $request->judul_berita;
    $berita->tanggal_terbit = $request->tanggal_terbit;
    $berita->deskripsi_berita = $request->deskripsi_berita;
    $berita->link = $request->link;

    // Periksa apakah ada file gambar baru yang diunggah
    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');

        // Hapus gambar lama jika ada
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }

        // Simpan gambar baru
        $path = $file->store('berita', 'public');
        $berita->gambar = $path;
    }

    // Simpan perubahan ke database
    $berita->save();

    // Redirect atau beri respon sesuai kebutuhan
    return redirect()->route('berita.index')->with('success', 'Berita updated successfully.');
}


    public function destroy($id)
    {
        // Find the existing Berita instance by ID
        $berita = Berita::findOrFail($id); // Throws 404 if not found

        // Optionally, you can delete the associated image file from storage if needed
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar); // Delete the image from public storage
        }

        // Delete the Berita instance from the database
        $berita->delete();

        // Redirect or respond as needed
        return redirect()->route('berita.index')->with('success', 'Berita deleted successfully.');
    }
}
