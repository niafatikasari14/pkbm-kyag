<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = [
    'judul_berita',
    'slug',
    'tanggal_berita',
    'isi_berita',
    'gambar_berita',
];
}
