<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Perusahaan;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    public function index()
    {
        $perusahaanDivalidasi = Perusahaan::where('status', 'divalidasi')->get();
        return view('admin.perusahaan-divalidasi', compact('perusahaanDivalidasi'));
    }

    public function diterima()
    {
        $perusahaanDiterima = Perusahaan::where('status', 'diterima')->get();
        return view('admin.perusahaan-diterima', compact('perusahaanDiterima'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'sektor_bisnis' => 'required|string|max:255',
            'nib' => 'required|integer',
            'deskripsi_perusahaan' => 'required|string',
            'jumlah_karyawan' => 'required|integer',
            'no_tlp' => 'required|string|max:15',
            'website_perusahaan' => 'required|url',
        ]);

        $validatedData['status'] = 'divalidasi';

        Perusahaan::create($validatedData);

        return redirect()->route('admin.perusahaan.index')->with('success', 'Perusahaan berhasil ditambahkan dan menunggu validasi.');
    }

    public function terima($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        $perusahaan->status = 'diterima';
        $perusahaan->save();

        return redirect()->route('admin.perusahaan.index')->with('success', 'Perusahaan berhasil diterima.');
    }

    public function tolak($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        $perusahaan->delete();

        return redirect()->route('admin.perusahaan.index')->with('success', 'Perusahaan berhasil ditolak dan dihapus.');
    }
}
