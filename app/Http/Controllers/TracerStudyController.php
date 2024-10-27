<?php

namespace App\Http\Controllers;

use App\Exports\TracerStudyExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;

class TracerStudyController extends Controller
{
    public function export()
    {
        return Excel::download(new TracerStudyExport, 'tracer_study.xlsx');
    }

    public function consumeTracerExport()
    {
        // Mengkonsumsi API
        $response = Http::get(url('http://127.0.0.1:10/tracer/export'));

        // Memeriksa apakah respons sukses
        if ($response->successful()) {
            // Mengambil data dari respons
            $data = $response->body(); // Jika API mengembalikan file, gunakan ->body() atau ->stream()

            // Untuk mengunduh file, Anda dapat mengembalikan respons langsung
            return response($data)
                ->header('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') // Ubah sesuai tipe file
                ->header('Content-Disposition', 'attachment; filename="data_tracer_export.xlsx"'); // Atur nama file
        } else {
            // Mengatasi jika terjadi kesalahan
            return response()->json(['error' => 'Unable to fetch data'], $response->status());
        }
    }
}
