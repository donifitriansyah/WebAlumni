<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PertanyaanController extends Controller
{
    public function create()
    {
        return view('pages.admin.pertanyaan'); // Tampilkan view untuk formulir
    }

    public function index()
    {
        // Mengambil semua data pertanyaan dari database
        $pertanyaan = Pertanyaan::all();
        return view('pages.admin.pertanyaan', compact('pertanyaan'));
    }

    /**
     * Menyimpan pertanyaan baru ke dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'pertanyaan' => 'required|string|max:255',
        ]);

        // Membuat pertanyaan baru
        Pertanyaan::create([
            'pertanyaan' => $request->pertanyaan,
        ]);

        // Redirect ke halaman yang diinginkan setelah menyimpan
        return redirect()->route('pertanyaan.index')->with('success', 'Pertanyaan berhasil ditambahkan.');
    }


    // Menghapus pertanyaan dari database
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'pertanyaan' => 'required|string|max:255',
        ]);

        // Temukan pertanyaan berdasarkan ID
        $pertanyaan = Pertanyaan::findOrFail($id);

        // Update field pertanyaan
        $pertanyaan->pertanyaan = $request->pertanyaan;
        $pertanyaan->save(); // Simpan perubahan

        // Redirect dengan pesan sukses
        return redirect()->route('pertanyaan.index')->with('success', 'Pertanyaan berhasil diperbarui!');
    }

    public function edit($id)
{
    $pertanyaan = Pertanyaan::findOrFail($id);
    return view('pertanyaan.edit', compact('pertanyaan')); // Ganti dengan view yang sesuai
}


}
