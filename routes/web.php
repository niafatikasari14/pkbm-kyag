<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\AkademikController;
use App\Http\Controllers\PendaftaranController;

use App\Models\Berita;
use App\Models\Pengumumen;
use App\Models\Foto;



Route::get('/home_index', [HomeController::class, 'index'])->name('home');
Route::get('/informasipkbm', [AboutController::class, 'informasipkbm']);
Route::get('/datapendidik', [AboutController::class, 'datapendidik']);

Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('beritashow');
Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
Route::get('/cek-berita', function () { return Berita::latest()->take(4)->get(); });

Route::get('/akademik', [AkademikController::class, 'index'])->name('akademik');
Route::get('/alumni', [AlumniController::class, 'index'])->name('alumni');
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran');
Route::post('/ulasan', [UlasanController::class, 'store'])->name('ulasan.store');