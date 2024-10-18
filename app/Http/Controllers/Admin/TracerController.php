<?php

namespace App\Http\Controllers;

use App\Models\DataJawaban;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TracerController extends Controller
{
    public function kuisioner() {
        $pertanyaan = Pertanyaan::all();
        return view('pages.alumni.tracer', compact('pertanyaan'));
    }
    public function index() {
        $data = DataJawaban::all();
        $dats = count(Pertanyaan::all());
        // foreach($data as $key => $dat) {
        //    $jumlah[$key] = count(DataJawaban::where('id_kuisioner', $dat)->get());
        // }
        // dd($jumlah[$key]);
        $datas = [];
        for ($i = 1; $i <= $dats; $i++) {
            $datas[$i] =count(DataJawaban::where('id_kuisioner', $i)->get());
        }
        return view('pages.admin.data-tracer', compact('data','datas'));
    }
    public function store(Request $request) {
        // dd($request);
        $request->validate([
            'jawaban_terbuka' => 'nullable|array',
            'jawaban_tertutup' => 'nullable|array',
            'jawaban_skala' => 'nullable|array'
        ]);

        // Simpan jawaban untuk pertanyaan terbuka
        if ($request->jawaban_terbuka) {
            foreach ($request->jawaban_terbuka as $id_pertanyaan => $jawaban) {
                DataJawaban::create([
                    'id_user' => 1, // Atau ambil dari login
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

        return redirect()->route('tracer.index');
    }
}
