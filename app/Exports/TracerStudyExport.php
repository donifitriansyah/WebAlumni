<?php

namespace App\Exports;

use App\Models\TracerStudy;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TracerStudyExport implements FromCollection, WithHeadings
{
    /**
     * Mendapatkan koleksi data untuk diekspor
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Mengambil data dari TracerStudy beserta relasi Pertanyaan dan Alumni
        $tracers = TracerStudy::with(['pertanyaan', 'alumni'])->get();

        // Mengelompokkan data berdasarkan ID Alumni
        $groupedData = $tracers->groupBy('id_alumni');

        $exportData = [];

        foreach ($groupedData as $alumniId => $tracerStudies) {
            // Ambil alumni data
            $alumni = $tracerStudies->first()->alumni;

            foreach ($tracerStudies as $tracer) {
                $exportData[] = [
                    'ID Alumni' => $alumniId,
                    'Nama Alumni' => $alumni->nama_alumni,
                    'NIM' => $alumni->nim,  // Menambahkan NIM
                    'Tanggal Lahir' => $alumni->tanggal_lahir, // Menambahkan Tanggal Lahir
                    'Alamat' => $alumni->alamat, // Menambahkan Alamat
                    'No Telepon' => $alumni->no_tlp, // Menambahkan No Telepon
                    'Email' => $alumni->email, // Menambahkan Email
                    'Pertanyaan' => $tracer->pertanyaan->pertanyaan,
                    'Jawaban' => $tracer->jawaban,
                ];
            }
            // Menambahkan baris kosong setelah setiap alumni
            $exportData[] = [
                'ID Alumni' => '',
                'Nama Alumni' => '',
                'NIM' => '',
                'Tanggal Lahir' => '',
                'Alamat' => '',
                'No Telepon' => '',
                'Email' => '',
                'Pertanyaan' => '',
                'Jawaban' => '',
            ];
        }

        return collect($exportData);
    }

    /**
     * Mendapatkan judul kolom untuk file Excel
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID Alumni',
            'Nama Alumni',
            'NIM', // Menambahkan judul NIM
            'Tanggal Lahir', // Menambahkan judul Tanggal Lahir
            'Alamat', // Menambahkan judul Alamat
            'No Telepon', // Menambahkan judul No Telepon
            'Email', // Menambahkan judul Email
            'Pertanyaan',
            'Jawaban',
        ];
    }
}
