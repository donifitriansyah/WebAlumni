<?php

namespace App\Http\Controllers\Alumni;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LamaranAlumniController extends Controller
{
    public function index()
    {
        // Logic to show the lamaran page
        return view('pages.alumni.lamaran');
    }
}
