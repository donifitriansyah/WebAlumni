<?php

namespace App\Exports;

use App\Models\DataJawaban;
use App\Models\TracerStudy;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TracerStudyExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $data = DataJawaban::with(['alumni', 'pertanyaan']) // Pastikan relasi sudah didefinisikan
            ->get()
            ->map(function ($jawaban) {
                return [
                    'nim' => $jawaban->alumni->nim, // Asumsikan nim ada di model Alumni
                    'nama' => $jawaban->alumni->nama_alumni, // Asumsikan nama ada di model Alumni
                    'pertanyaan' => $jawaban->pertanyaan->pertanyaan, // Asumsikan pertanyaan ada di model Pertanyaan
                    'jawaban_terbuka' => $jawaban->jawaban_terbuka,
                    'jawaban_skala' => $jawaban->jawaban_skala,
                ];
            });

        return $data;
    }

    public function headings(): array
    {
        return [
            'NIM',
            'Nama Alumni',
            'Pertanyaan',
            'Jawaban Terbuka',
            'Jawaban Skala',
        ];
    }
}
