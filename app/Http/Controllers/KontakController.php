<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $kontak = Kontak::latest()->first(); // pastikan data ada di tabel kontak
        return view('kontak', compact('kontak'));
    }
}
