<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TracerStudyPerNimSheet implements FromCollection, WithTitle, WithHeadings
{
    protected $nim;
    protected $data;

    public function __construct($nim, $data)
    {
        $this->nim = $nim;
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data->map(function ($jawaban) {
            return [
                'nim' => $jawaban->alumni->nim,
                'nama' => $jawaban->alumni->nama_alumni,
                'pertanyaan' => $jawaban->pertanyaan->pertanyaan,
                'jawaban_terbuka' => $jawaban->jawaban_terbuka,
                'jawaban_skala' => $jawaban->jawaban_skala,
            ];
        });
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

    public function title(): string
    {
        // Set the sheet title to the NIM or NIM and name
        return 'NIM ' . $this->nim;
    }
}
