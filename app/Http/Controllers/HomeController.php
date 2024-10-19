<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use Str;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $loker = Lowongan::all();
        $berita = Berita::all();

        return view('pages.home', [
            'loker' => $loker,
            'berita' => $berita,
        ]);
    }
}
