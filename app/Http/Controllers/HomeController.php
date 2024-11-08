<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Berita;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use Str;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $loker = Lowongan::where('status', 'diterima')->get();
        $berita = Berita::all();

        return view('pages.home', [
            'loker' => $loker,
            'berita' => $berita,
        ]);
    }

    public function indexAlumni(Request $request)
    {
        // Mendapatkan 6 data alumni (3 halaman dengan masing-masing 2 data per halaman)
        $alumni = Alumni::paginate(3);

        return view('pages.alumni', [
            'alumni' => $alumni,
        ]);
    }

    // Method untuk menampilkan semua lowongan
    public function indexLowongan(Request $request)
    {
        $loker = Lowongan::where('status', 'diterima')->get();

        return view('pages.lowongan', [
            'loker' => $loker,
        ]);
    }

    // Method untuk menampilkan detail lowongan
    public function detailLowongan($id)
    {
        $lowongan = Lowongan::with('perusahaan')->findOrFail($id);
        return view('pages.lowongan-detail', compact('lowongan'));
    }
}
