<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model


{
    use HasFactory;
    protected $table = 'perusahaan';

    protected $fillable = [
        'id_perusahaan', 'nib', 'nama_perusahaan', 'email_perusahaan', 'sektor_bisnis', 'deskripsi_perusahaan', 'jumlah_karyawan', 'no_telp', 'website_perusahaan','status'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
