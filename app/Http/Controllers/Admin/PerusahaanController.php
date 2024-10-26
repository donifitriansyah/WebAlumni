<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Carbon\Carbon; // Tambahkan ini untuk menangani tanggal

class PerusahaanController extends Controller
{
    public function terima_perusahaan($id)
    {
        // Update status dan tambahkan tanggal aktivasi
        $perusahaan = Perusahaan::where('id_perusahaan', $id)->update([
            'status' => 'diterima',
            'tanggal_aktif' => Carbon::now() // Menambahkan timestamp saat ini
        ]);

        return redirect()->route('perusahaan-diterima')
            ->with('success', 'Perusahaan berhasil diterima');
    }

    public function tolak_perusahaan($id)
    {
        $perusahaan = Perusahaan::where('id_perusahaan', $id)->update([
            'status' => 'ditolak',
            'tanggal_aktif' => null // Reset tanggal aktif jika ditolak
        ]);

        return redirect()->route('perusahaan-divalidasi')
            ->with('success', 'Perusahaan berhasil ditolak');
    }

    public function showPerusahaanActive()
    {
        $activePerusahaan = Perusahaan::where('status', 'diterima')
            ->orderBy('tanggal_aktif', 'desc') // Urutkan berdasarkan tanggal aktivasi
            ->get();

        return view('pages.admin.perusahaan-diterima', compact('activePerusahaan'));
    }

    public function showPerusahaanNonActive()
    {
        $nonActivePerusahaan = Perusahaan::where('status', 'menunggu')->get();

        return view('pages.admin.perusahaan-divalidasi', compact('nonActivePerusahaan'));
    }
}
