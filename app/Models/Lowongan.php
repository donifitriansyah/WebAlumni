<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    use HasFactory;

    protected $table = "lowongan";

    protected $fillable = [
        'id_perusahaan',
        'judul_lowongan',
        'posisi_pekerjaan',
        'deskripsi_pekerjaan',
        'tipe_pekerjaan',
        'jumlah_kandidat',
        'lokasi',
        'tanggal_aktif',
        'rentang_gaji',
        'pengalaman_kerja',
        'kontak',
    ];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'id_perusahaan');
    }
}
