<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisiMisi;
use App\Models\Akreditasi;
use App\Models\OrganisasiStruktur;
use App\Models\Guru;

class AboutController extends Controller
{
    /**
     * Halaman Informasi PKBM
     * Menampilkan Visi Misi dan Akreditasi
     */
    public function informasiPkbm()
    {
        $visimisi = VisiMisi::latest()->first();
        $akreditasi = Akreditasi::latest()->first();

        return view('informasipkbm', compact('visimisi', 'akreditasi'));
    }

    /**
     * Halaman Data Pendidik
     * Menampilkan Struktur Organisasi dan Data Guru
     */
    public function dataPendidik()
    {
        $struktur = OrganisasiStruktur::latest('struktur_organisasi')->first();
        $guru = Guru::all();

        return view('datapendidik', compact('struktur', 'guru'));
    }
}
