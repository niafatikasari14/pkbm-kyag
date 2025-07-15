<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    // Jika nama tabel bukan jamak dari nama model, tambahkan:
    // protected $table = 'nama_tabel';

    protected $fillable = [
        'nama_alumni',
        'tahun_lulus',
        'program',
    ];
    public function setNamaAlumniAttribute($value)
{
    $this->attributes['nama_alumni'] = ucwords(strtolower($value));
}
}
