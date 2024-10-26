<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lamaran extends Model
{
    use HasFactory;

    protected $table = 'lamarans';
    protected $primaryKey = 'id_lamaran';

    protected $fillable = [
        'id_lowongan',
        'id_alumni',
        'nama',
        'email',
        'cv',
        'status',
    ];

    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class, 'id_lowongan');
    }
}
