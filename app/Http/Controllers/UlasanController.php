<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use App\Notifications\UlasanBaruNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    public function store(Request $request)
{
    $validated = $request->validate([
        'nama' => 'required|string|max:100',
        'kritik_saran' => 'required|string|max:500',
        'telp' => 'required',
        'email' => 'required|email',
    ]);

    $ulasan = Ulasan::create($validated);

    \Log::info('Ulasan berhasil disimpan:', $ulasan->toArray());

    Notification::route('mail', 'pkbmkyagenggiri@gmail.com')
        ->notify(new \App\Notifications\UlasanBaruNotification($ulasan));

    \Log::info('Notifikasi email dikirim ke admin.');

    return redirect()->back()->with('success', 'Terima kasih atas ulasan Anda!');
}
}