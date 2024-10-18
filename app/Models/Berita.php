<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'berita';
    protected $primaryKey = 'id_berita';
    protected $fillable = [
        'id_berita', 'judul_berita', 'tanggal_terbit', 'deskripsi_berita', 'gambar'
    ];
}
