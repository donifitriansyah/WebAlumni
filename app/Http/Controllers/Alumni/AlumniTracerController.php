<?php

namespace App\Http\Controllers\Alumni;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\DataJawaban;
use App\Models\Pertanyaan;
use App\Models\TracerStudy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class AlumniTracerController extends Controller
{
    public function create()
    {
        $alumni = Auth::user()->alumni; // Mengambil relasi alumni dari user yang sedang otentikasi
        $pertanyaan = Pertanyaan::all();

        return view('pages.alumni.tracer', compact('alumni', 'pertanyaan'));
    }

    public function store(Request $request)
    {
        Log::debug('Masuk ke fungsi store tracer study');

        // Validasi
        try {
            $request->validate([
                'jawaban.*' => 'required|string|max:255',
            ]);
            Log::debug('Validasi berhasil');
        } catch (ValidationException $e) {
            Log::error('Validasi gagal', ['errors' => $e->validator->errors()->all()]);
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            Log::error('Terjadi kesalahan saat validasi', ['message' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Terjadi kesalahan saat validasi.');
        }

        // Ambil ID alumni
        $alumniId = Auth::user()->alumni->id_alumni ?? null;
        Log::debug('ID Alumni: ' . $alumniId);

        if (!$alumniId) {
            Log::error('Alumni ID tidak ditemukan');
            return redirect()->back()->with('error', 'Data alumni tidak ditemukan.');
        }

        try {
            DB::beginTransaction();

            // Simpan jawaban tracer study
            foreach ($request->jawaban as $id_pertanyaan => $jawaban) {
                Log::debug('Menyimpan jawaban:', ['id_pertanyaan' => $id_pertanyaan, 'jawaban' => $jawaban]);
                TracerStudy::create([
                    'id_pertanyaan' => $id_pertanyaan,
                    'id_alumni' => $alumniId,
                    'jawaban' => $jawaban,
                ]);
            }

            Log::debug('Jawaban berhasil disimpan.');

            // Update status alumni
            Alumni::where('id_alumni', $alumniId)->update(['status' => 'aktif']);
            Log::debug('Status alumni diupdate');

            DB::commit();

            return redirect()->route('dashboard')->with('success', 'Data tracer study berhasil disimpan.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Terjadi kesalahan saat menyimpan tracer study', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'data' => $request->all(),
                'alumniId' => $alumniId
            ]);
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data, silakan coba lagi.');
        }
    }

}
