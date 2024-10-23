<?php

namespace App\Http\Controllers\Alumni;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobAlumniController extends Controller
{
    public function index()
    {
        // Logic to show the saved jobs page
        return view('pages.alumni.job');
    }
}
