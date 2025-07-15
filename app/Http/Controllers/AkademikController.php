<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use App\Models\KalenderAkademik;
use App\Models\SaranaPrasarana;
use Illuminate\Http\Request;

class AkademikController extends Controller
{
    public function index()
{
    return view('akademik', [
        'kalender' => \App\Models\KalenderAkademik::latest()->first(),
        'sarana' => \App\Models\SaranaPrasarana::all(),
    ]);
}
}