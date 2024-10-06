<?php

namespace App\Http\Controllers\Alumni;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\Pertanyaan;
use App\Models\TracerStudy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

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
        ], [
            'jawaban.*.required' => 'Semua pertanyaan harus dijawab.',
            'jawaban.*.max' => 'Jawaban tidak boleh lebih dari 255 karakter.',
        ]);

        // Mengambil ID alumni
        $alumniId = Auth::user()->alumni->id_alumni;

        // Menampilkan data yang diterima dari permintaan
        dump($request->all());

        try {
            DB::beginTransaction();

            // Menyimpan jawaban
            foreach ($request->jawaban as $id_pertanyaan => $jawaban) {
                TracerStudy::create([
                    'id_pertanyaan' => $id_pertanyaan,
                    'id_alumni' => $alumniId,
                    'jawaban' => $jawaban,
                ]);
            }

            // Update status alumni menjadi aktif
            Alumni::where('id_alumni', $alumniId)->update(['status' => 'aktif']);

            DB::commit();

            return redirect()->route('dashboard')->with('success', 'Data tracer study berhasil disimpan dan status Anda telah diubah menjadi aktif.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Terjadi kesalahan saat menyimpan tracer study: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan dalam menyimpan data. Mohon coba lagi nanti.');
        }
    }
}
