<?php

namespace App\Http\Controllers;

use App\Exports\TracerStudyExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TracerStudyController extends Controller
{
    public function export()
    {
        return Excel::download(new TracerStudyExport, 'tracer_study.xlsx');
    }
}
