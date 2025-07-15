<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table = 'pendaftarans';
    protected $fillable = [
        'alur_pendaftaran',
        'brosur',
        'syarat_pendaftaran',
        'link_paketA',
        'link_paketB',
        'link_paketC',
    ];
}