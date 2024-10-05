<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    use HasFactory;

    protected $table = 'pertanyaan'; // Nama tabel
    protected $primaryKey = 'id_pertanyaan'; // Nama primary key

    protected $fillable = [
        'pertanyaan', // Kolom yang bisa diisi
    ];

    public $timestamps = true; // Mengaktifkan timestamps (created_at, updated_at)
}
