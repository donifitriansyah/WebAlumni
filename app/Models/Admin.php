<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin';

    protected $fillable = [
        'id_user', 'nama', 'nomor_induk', 'no_hp',
    ];

    // Define relationship to User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
