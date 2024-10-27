<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataJawaban extends Model
{
    use HasFactory;

    protected $table = "data_jawaban";

    protected $fillable = [
        'id_alumni',
        'id_pertanyaan',
        'jawaban_terbuka',
        'jawaban_skala',
    ];

    public function alumni() {
        return $this->belongsTo(Alumni::class, 'id_alumni', 'id_alumni'); // Pastikan id_alumni di sini sesuai
    }

    public function pertanyaan() {
        return $this->belongsTo(Pertanyaan::class, 'id_pertanyaan', 'id_pertanyaan'); // Pastikan id_pertanyaan di sini sesuai
    }
}
