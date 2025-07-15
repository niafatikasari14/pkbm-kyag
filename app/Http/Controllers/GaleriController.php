<?php

namespace App\Http\Controllers;

use App\Models\Foto;

class GaleriController extends Controller
{
    public function index()
    {
        $fotos = Foto::latest()->get();
        return view('galeri', compact('fotos'));
    }
}


