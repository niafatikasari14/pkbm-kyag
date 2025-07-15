<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Pengumuman;
use App\Models\Foto;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $berita = \App\Models\Berita::latest()->take(4)->get();
    $galeri = \App\Models\Foto::latest()->take(6)->get();
    $pengumuman = \App\Models\Pengumuman::latest()->take(2)->get();

    return view('home_index', compact('berita', 'pengumuman', 'galeri'));
}

}