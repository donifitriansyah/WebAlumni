<?php

namespace App\Http\Controllers\Alumni;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HistoryAlumniController extends Controller
{
    public function index()
    {
        // Logic to show the history lamaran page
        return view('pages.alumni.history');
    }
}
