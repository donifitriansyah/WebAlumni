<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;

    protected $table = 'perusahaan';

    protected $fillable = [
        'nama_perusahaan',
        'sektor_bisnis',
        'deskripsi_perusahaan',
        'jumlah_karyawan',
        'no_tlp',
        'website_perusahaan',
        'status'
    ];
}
