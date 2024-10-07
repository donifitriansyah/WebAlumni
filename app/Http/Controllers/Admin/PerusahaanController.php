<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Perusahaan;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    public function index()
    {
        $perusahaanDiterima = Perusahaan::where('status', 'diterima')->get();
        return view('admin.perusahaan.diterima', compact('perusahaanDiterima'));
    }

    public function divalidasi()
    {
        $perusahaanDivalidasi = Perusahaan::where('status', 'divalidasi')->get();
        return view('admin.perusahaan.divalidasi', compact('perusahaanDivalidasi'));
    }

    public function terima($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        $perusahaan->status = 'diterima';
        $perusahaan->save();
        return redirect()->route('admin.perusahaan.divalidasi')->with('success', 'Perusahaan berhasil diterima');
    }

    public function tolak($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        $perusahaan->delete();
        return redirect()->route('admin.perusahaan.divalidasi')->with('success', 'Perusahaan berhasil ditolak');
    }
}
