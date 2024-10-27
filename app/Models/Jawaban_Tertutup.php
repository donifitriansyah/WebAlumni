<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jawaban_Tertutup extends Model
{
    use HasFactory;
    protected $table = 'jawaban_tertutup';
    protected $fillable = [
        'id_kuisioner',
        'opsi_1',
        'opsi_2',
        'opsi_3',
        'opsi_4',
        'opsi_5',
    ];
}

