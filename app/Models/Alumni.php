<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $table = 'alumni';

    protected $fillable = [
        'id_user', 'nama_alumni', 'tanggal_lahir', 'alamat', 'no_tlp', 'email', 'status',
    ];

    // Define relationship to User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
