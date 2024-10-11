<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Perusahaan;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    public function index_diterima()
    {
        // Mengambil semua perusahaan dengan status 'diterima'
        $perusahaanDiterima = Perusahaan::where('status',"=", 'diterima')->get();

        // Return view di folder 'admin'
        return view('pages.admin.perusahaan-diterima', compact('perusahaanDiterima'));
    }

    public function index_divalidasi()
    {
        // Mengambil semua perusahaan yang menunggu validasi
        $perusahaanDivalidasi = Perusahaan::where('status', 'menunggu')->get();

        // Return view di folder 'admin'
        return view('pages.admin.perusahaan-divalidasi', compact('perusahaanDivalidasi'));
    }

    public function terima_perusahaan($id)
    {
        // Temukan perusahaan dan ubah statusnya menjadi 'diterima'
        $perusahaan = Perusahaan::where('id_perusahaan',$id)->update([
            'status' => 'diterima',
        ]);

        // Redirect ke halaman perusahaan diterima dengan pesan sukses
        return redirect()->route('perusahaan-diterima')->with('success', 'Perusahaan berhasil diterima');
    }

    // public function tolak_perusahaan($id)
    // {
    //     // Temukan perusahaan dan hapus dari database
    //     $perusahaan = Perusahaan::where('id_perusahaan',$id)->update([
    //         'status' => 'ditolak'
    //     ]);

    //     // Redirect ke halaman validasi perusahaan dengan pesan sukses
    //     return redirect()->route('perusahaan-divalidasi')->with('success', 'Perusahaan berhasil ditolak');
    // }

    public function showPerusahaanActive()
    {
        // Retrieve companies with 'active' status
        $activePerusahaan = Perusahaan::where('status', 'active')->get();

        // Return the view with the active companies
        return view('pages.admin.perusahaan-diterima', compact('activePerusahaan'));
    }

    public function showPerusahaanNonActive()
    {
        $nonActivePerusahaan = Perusahaan::where('status', 'nonactive')->get();

        return view('pages.admin.perusahaan-divalidasi', compact('nonActivePerusahaan'));
    }
}
