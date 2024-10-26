<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use Str;

class HomeController extends Controller
{
    // Method untuk halaman home
    public function index(Request $request)
    {
        $loker = Lowongan::all();
        $berita = Berita::all();

        return view('pages.home', [
            'loker' => $loker,
            'berita' => $berita,
        ]);
    }

    // Method untuk menampilkan semua lowongan
    public function indexLowongan(Request $request)
    {
        $loker = Lowongan::all();

        return view('pages.lowongan', [
            'loker' => $loker,
        ]);
    }

    // Method untuk menampilkan detail lowongan
    public function detailLowongan($id)
    {
        $loker = Lowongan::with(['perusahaan', 'kategori'])
            ->findOrFail($id);  

        return view('pages.lowongan-detail', compact('loker'));
    }
}
