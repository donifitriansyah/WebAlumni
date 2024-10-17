<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataJawaban extends Model
{
    use HasFactory;
    protected $table = "data_jawaban";
    protected $fillable = [
        'id_user',
        'id_kuisioner',
        'jawaban_terbuka',
        'jawaban_skala'
    ];

    public function alumni() {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
