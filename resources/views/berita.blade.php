@extends('mylayout')
@section('content')

<div class="container my-5">
    <h2 class="mb-4 text-center fade-in">Berita</h2>

<div class="row">
    @foreach ($beritas as $berita)
        <div class="col-md-3 mb-4"> {{-- 4 kolom --}}
            <div class="card h-100 d-flex flex-column shadow-sm">
                @if ($berita->gambar_berita)
                    <img src="{{ asset('storage/' . $berita->gambar_berita) }}"
                         class="card-img-top"
                         style="height: 200px; object-fit: cover;"
                         alt="Gambar Berita">
                @endif

                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $berita->judul_berita }}</h5>
                    <p class="text-muted" style="font-size: 0.85rem;">
                        {{ $berita->created_at->format('d M Y') }}
                    </p>
                    <p class="card-text mb-3">
                        {!! Str::limit(strip_tags($berita->isi_berita), 100) !!}
                    </p>
                    <a href="{{ route('beritashow', $berita->slug) }}"
                       class="btn btn-primary mt-auto">
                        Baca Selengkapnya
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>

</div>

@endsection
