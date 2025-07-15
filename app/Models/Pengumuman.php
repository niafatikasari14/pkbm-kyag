<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    // Pastikan tabel ditentukan eksplisit
    protected $table = 'pengumuman';

    protected $fillable = [
        'judul_pengumuman',
        'tanggal_pengumuman',
        'isi_pengumuman',
        'file_pengumuman',
    ];
}
