<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    protected $table = 'ulasan'; // ← penting!

    protected $fillable = ['nama', 'telp', 'email', 'kritik_saran'];
}

