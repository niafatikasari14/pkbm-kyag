<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    protected $fillable = [
        'alamat',
        'no_telp',
        'email',
        'watsapp',
        'instagram',
        'website',
    ];
}
