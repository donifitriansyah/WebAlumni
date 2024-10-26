<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lamaran extends Model
{
    use HasFactory;

    protected $table = 'lamaran';

    protected $primaryKey = 'id_lamaran';

    protected $fillable = [
        'id_lowongan',
        'id_alumni',
        'nama',
        'email',
        'cv',
        'transkrip_nilai',
        'portofolio',
        'status',
    ];

    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class, 'id_lowongan');
    }

    public function alumni()
    {
        return $this->belongsTo(Alumni::class, 'id_alumni');
    }
}
