@extends('mylayout')
@section('content')
{{-- Custom class untuk 5 kolom --}}
<style>
    @media (min-width: 992px) {
        .col-lg-2-4 {
            flex: 0 0 auto;
            width: 20%;
        }
    }
</style>

<div class="container my-5">

<!-- Struktur Organisasi -->
<section class="mb-5">
    <h4>Struktur Organisasi</h4>

    @if(isset($struktur) && $struktur->struktur_organisasi)
        <div class="border rounded p-3 shadow-sm">
            <p class="text-muted mb-3">
                <strong>Periode:</strong> {{ $struktur->tahun_awal }} - {{ $struktur->tahun_akhir }}
            </p>
            <div class="struktur-organisasi-content">
                {!! $struktur->struktur_organisasi !!}
            </div>
        </div>
    @else
        <p>Struktur organisasi belum tersedia.</p>
    @endif
</section>

<!-- Data Guru -->
<section class="mb-5">
    <h4 class="mb-4 text-center">Data Guru</h4>
    <div class="row justify-content-center px-2">
        @forelse ($guru as $item)
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-4"> {{-- 5 kolom responsif --}}
                <div class="card h-100 shadow-sm text-center border-0">
                    @if ($item->foto_guru)
                        <img 
                            src="{{ asset('storage/' . $item->foto_guru) }}" 
                            alt="Foto {{ $item->nama_guru }}" 
                            class="mx-auto mt-3"
                            style="width: 100px; height: 130px; object-fit: cover; border-radius: 4px; border: 1px solid #ddd; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                    @else
                        <img 
                            src="{{ asset('images/default-profile.png') }}" 
                            alt="Foto Default" 
                            class="mx-auto mt-3"
                            style="width: 100px; height: 130px; object-fit: cover; border-radius: 4px; border: 1px solid #ddd; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                    @endif

                    <div class="card-body px-2 py-3">
                        <h6 class="card-title mb-1 text-dark">{{ $item->nama_guru }}</h6>
                        <p class="text-muted mb-1 small">{{ $item->jabatan_guru }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p>Data Guru Belum Tersedia.</p>
            </div>
        @endforelse
    </div>
</section>

</div>
@endsection
