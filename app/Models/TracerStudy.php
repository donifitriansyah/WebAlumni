<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TracerStudy extends Model
{
    use HasFactory;

    // Menentukan nama tabel
    protected $table = 'tracer_study';

    // Menentukan field yang dapat diisi (mass assignable)
    protected $fillable = [
        'id_pertanyaan',
        'id_alumni',
        'jawaban',
    ];

    // Menghubungkan model TracerStudy dengan model Pertanyaan
    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class, 'id_pertanyaan', 'id_pertanyaan');
    }

    // Menghubungkan model TracerStudy dengan model Alumni
    public function alumni()
    {
        return $this->belongsTo(Alumni::class, 'id_alumni', 'id_alumni');
    }
}
