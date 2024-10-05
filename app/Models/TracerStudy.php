<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TracerStudy extends Model
{
    use HasFactory;

    protected $table = 'tracer_study'; // Nama tabel
    protected $primaryKey = 'id_tracer_study'; // Primary key
    protected $fillable = [
        'id_pertanyaan',
        'jawaban',
    ];

    // Relasi dengan model Pertanyaan
    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class, 'id_pertanyaan');
    }
}
