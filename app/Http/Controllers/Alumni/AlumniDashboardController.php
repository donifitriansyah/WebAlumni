<?php

namespace App\Http\Controllers\Alumni;

use App\Http\Controllers\Controller;
use App\Models\Lamaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlumniDashboardController extends Controller
{
    public function showDashboard(Request $request)
{
    $alumni = Auth::user()->alumni;

    // Pastikan alumni ada
    if (!$alumni) {
        return redirect()->route('home')->with('error', 'Alumni not found.');
    }

    // Hitung jumlah lamaran berdasarkan alumni yang sedang login dengan status "terima" atau "ditolak"
    $historyCount = Lamaran::where('id_alumni', $alumni->id_alumni)
        ->whereIn('status', ['terima', 'ditolak'])
        ->count();

        $rejectedCount = Lamaran::where('id_alumni', $alumni->id_alumni)
        ->where('status', 'ditolak')
        ->count();

        $accepted = Lamaran::where('id_alumni', $alumni->id_alumni)
        ->where('status', 'terima')
        ->count();

        $waiting = Lamaran::where('id_alumni', $alumni->id_alumni)
        ->where('status', 'menunggu')
        ->count();

    // Kirim data historyCount ke view dashboard
    return view('pages.alumni.dashboard', compact('historyCount', 'rejectedCount', 'accepted','waiting'));
}

}
