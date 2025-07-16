@extends('mylayout')

@section('content')
<div class="container my-3">
    <h2 class="mb-3">{{ $berita->judul_berita}}</h2>

    <p class="text-muted">
        Dipublikasikan pada {{ $berita->created_at->format('d M Y') }}
    </p>

    @if ($berita->gambar_berita)
        <img src="{{ asset('storage/' . $berita->gambar_berita) }}" alt="Gambar Berita" class="img-fluid mb-4">
    @endif

    <div class="isi_berita">
        {!! $berita->isi_berita !!}
    </div>

    <a href="{{ url('/berita') }}" class="btn btn-secondary mt-4">← Kembali ke Daftar Berita</a>
</div>
@endsection
