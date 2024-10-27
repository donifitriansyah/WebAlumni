<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\DataJawaban;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminTracerController extends Controller
{
    public function kuisioner() {
        $pertanyaan = Pertanyaan::all();
        return view('pages.alumni.tracer', compact('pertanyaan'));
    }

    public function check_data_alumni() {
        if (DataJawaban::where('id_user', Auth::user()->id)->exists()) {
            return view('pages.alumni.dashboard_alumni');
        } else {
            return redirect()->route('tracerstudy.form');
        }
    }

    // section admin
    public function index() {
        $data = Alumni::all();
        $count_sudah_isi = 0;
        $count_belum_isi = 0;

        foreach($data as $dat) {
            // Ganti 'id_user' dengan 'id_alumni' atau kolom lain yang relevan
            if (DataJawaban::where('id_alumni', $dat->id_alumni)->exists()) {
                $dat->status = 'Sudah Mengisi';
                $count_sudah_isi++;
            } else {
                $dat->status = 'Belum Mengisi';
                $count_belum_isi++;
            }
        }

        return view('pages.admin.data-tracer', compact('data', 'count_sudah_isi', 'count_belum_isi'));
    }

    public function store(Request $request) {
        // dd($request);
        $request->validate([
            'jawaban_terbuka' => 'nullable|array',
            'jawaban_skala' => 'nullable|array'
        ]);
        // Simpan jawaban untuk pertanyaan terbuka
        if ($request->jawaban_terbuka) {
            foreach ($request->jawaban_terbuka as $id_pertanyaan => $jawaban) {
                DataJawaban::create([
                    'id_user' => Auth::user()->id, // Atau ambil dari login
                    'id_kuisioner' => $id_pertanyaan,
                    'jawaban_terbuka' => $jawaban,
                    'jawaban_skala' => null,
                ]);
            }
        }
        // Simpan jawaban untuk pertanyaan skala
        if ($request->jawaban_skala) {
            foreach ($request->jawaban_skala as $id_pertanyaan => $jawaban) {
                DataJawaban::create([
                    'id_user' => Auth::user()->id,
                    'id_kuisioner' => $id_pertanyaan,
                    'jawaban_terbuka' => null,
                    'jawaban_skala' => $jawaban,
                ]);
            }
        }
        return redirect()->route('dashboard');
    }

    public function data_by_user($id) {
        // Menggunakan 'id_alumni' untuk mengambil jawaban
        $data = DataJawaban::where('id_alumni', $id)->get();

        return view('pages.admin.data-tracer-alumni', compact('data'));
    }
    public function data_by_status(String $status) {
        $datas = Alumni::all(); // Mengambil semua data alumni
        $count_sudah_isi = 0;
        $count_belum_isi = 0;

        // Inisialisasi array untuk menyimpan alumni yang sudah mengisi
        $data = [];

        if ($status == 'sudah') {
            foreach ($datas as $dat) {
                // Memeriksa apakah alumni sudah mengisi kuesioner
                if (DataJawaban::where('id_alumni', $dat->id_alumni)->exists()) {
                    $dat->status = 'Sudah Mengisi'; // Menetapkan status
                    $data[] = $dat; // Menyimpan alumni yang sudah mengisi
                    $count_sudah_isi++; // Menghitung alumni yang sudah mengisi
                }
            }
            return view('pages.admin.data-tracer', compact('data', 'count_sudah_isi', 'count_belum_isi'));

        } else if ($status == 'belum') {
            foreach ($datas as $dat) {
                if (DataJawaban::where('id_alumni', $dat->id_alumni)->doesntExist()) {
                    $dat->status = 'Belum Mengisi'; // Menetapkan status
                    $data[] = $dat; // Menyimpan alumni yang belum mengisi
                    $count_belum_isi++; // Menghitung alumni yang belum mengisi
                }
            }

            return view('pages.admin.data-tracer', compact('data', 'count_sudah_isi', 'count_belum_isi'));
        } else {
            return redirect()->route('tracer.index');
        }
    }

}
