<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    
public function index()
{
    $beritas = \App\Models\Berita::latest()->get();
    return view('berita', compact('beritas'));
}

public function show($slug)
{
    $berita = \App\Models\Berita::where('slug', $slug)->firstOrFail();

    return view('beritashow', compact('berita'));
}


public function store(Request $request)
{
    $request->validate([
        'judul_berita' => 'required|string|max:255',
        'isi_berita' => 'required',
        'gambar_berita' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $gambar = null;
    if ($request->hasFile('gambar_berita')) {
        $gambar = $request->file('gambar_berita')->store('berita', 'public');
    }

    Berita::create([
        'judul_berita' => $request->judul_berita,
        'slug' => Str::slug($request->judul_berita), // 👈 slug otomatis
        'tanggal_berita' => now(),
        'isi_berita' => $request->isi_berita,
        'gambar_berita' => $gambar, // ✅ pakai $gambar, bukan $gambar_berita
    ]);

    return redirect()->route('berita')->with('success', 'Berita berhasil ditambahkan.');
}
}