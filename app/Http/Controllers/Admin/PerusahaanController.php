<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Perusahaan;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    public function index()
    {
        // Mengambil semua perusahaan dengan status 'diterima'
        $perusahaanDiterima = Perusahaan::where('status', 'diterima')->get();

        // Return view di folder 'admin'
        return view('pages.admin.perusahaan-diterima', compact('perusahaanDiterima'));
    }

    public function divalidasi()
    {
        // Mengambil semua perusahaan yang menunggu validasi
        $perusahaanDivalidasi = Perusahaan::where('status', 'menunggu')->get();

        // Return view di folder 'admin'
        return view('pages.admin.perusahaan-divalidasi', compact('perusahaanDivalidasi'));
    }

    public function terima($id)
    {
        // Temukan perusahaan dan ubah statusnya menjadi 'diterima'
        $perusahaan = Perusahaan::findOrFail($id);
        $perusahaan->status = 'diterima';
        $perusahaan->save();

        // Redirect ke halaman perusahaan diterima dengan pesan sukses
        return redirect()->route('admin.perusahaan.index')->with('success', 'Perusahaan berhasil diterima');
    }

    public function tolak($id)
    {
        // Temukan perusahaan dan hapus dari database
        $perusahaan = Perusahaan::findOrFail($id);
        $perusahaan->delete();

        // Redirect ke halaman validasi perusahaan dengan pesan sukses
        return redirect()->route('admin.perusahaan.divalidasi')->with('success', 'Perusahaan berhasil ditolak');
    }
}
