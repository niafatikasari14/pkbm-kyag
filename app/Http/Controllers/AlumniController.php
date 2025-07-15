<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function index(Request $request)
    {
        $query = Alumni::query();

        // Filter nama
        if ($request->filled('search')) {
            $query->where('nama_alumni', 'like', '%' . $request->search . '%');
        }

        // Filter tahun
        if ($request->filled('tahun')) {
            $query->where('tahun_lulus', $request->tahun);
        }

        // Filter program
        if ($request->filled('program')) {
            $query->where('program', $request->program);
        }

        // Urutkan berdasarkan tahun descending
        $query->orderBy('tahun_lulus', 'desc');

        $alumnis = $query->paginate(10);

        $tahunOptions = Alumni::select('tahun_lulus')
            ->distinct()
            ->orderBy('tahun_lulus', 'desc')
            ->pluck('tahun_lulus');

        return view('alumni', compact('alumnis', 'tahunOptions'));
    }
}
