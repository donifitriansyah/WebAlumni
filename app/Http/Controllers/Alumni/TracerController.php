<?php

namespace App\Http\Controllers\Alumni;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\Pertanyaan;
use App\Models\TracerStudy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TracerController extends Controller
{
    public function create()
    {
        $alumni = Auth::user()->alumni; // Mengambil relasi alumni dari user yang sedang otentikasi
        $pertanyaan = Pertanyaan::all();

        return view('pages.alumni.tracer', compact('alumni', 'pertanyaan'));
    }

    public function store(Request $request)
{
    // Logika validasi
    $request->validate([
        'jawaban.*' => 'required|string|max:255',
    ]);

    // Mengambil ID alumni
    $alumniId = Auth::user()->alumni->id_alumni;

    // Menampilkan data yang diterima dari permintaan
    dump($request->all());

    // Menyimpan jawaban
    foreach ($request->jawaban as $id_pertanyaan => $jawaban) {
        TracerStudy::create([
            'id_pertanyaan' => $id_pertanyaan,
            'id_alumni' => $alumniId,
            'jawaban' => $jawaban,
        ]);
    }

    return redirect()->route('dashboard')->with('success', 'Data berhasil ditambahkan.');
}

}
