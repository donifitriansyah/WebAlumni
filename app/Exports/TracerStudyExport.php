<?php

namespace App\Exports;

use App\Models\DataJawaban;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class TracerStudyExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        $sheets = [];

        // Get unique NIMs with alumni data
        $alumniData = DataJawaban::with(['alumni', 'pertanyaan'])
            ->get()
            ->groupBy('alumni.nim');

        foreach ($alumniData as $nim => $data) {
            // Add a new sheet for each NIM
            $sheets[] = new TracerStudyPerNimSheet($nim, $data);
        }

        return $sheets;
    }
}
