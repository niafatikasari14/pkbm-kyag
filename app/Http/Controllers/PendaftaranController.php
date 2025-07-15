<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index()
    {
        $data = Pendaftaran::first(); // ambil satu-satunya data pendaftaran

        return view('pendaftaran', compact('data'));
    }
}