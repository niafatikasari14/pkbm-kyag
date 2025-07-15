<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganisasiStruktur extends Model
{
    protected $table = 'organisasi_struktur';

    protected $fillable = ['tahun_awal', 'tahun_akhir', 'struktur_organisasi',];
}
