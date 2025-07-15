@extends('mylayout')
@section('content')

<div class="container my-5">
    <h2 class="mb-4 text-center">Galeri Kegiatan PKBM Ky Ageng Giri</h2>

<!-- Galeri Foto -->
<div class="mb-5">
    <h3 class="mb-4">Galeri Foto Kegiatan</h3>
    <div class="row">
        @forelse ($fotos as $foto)
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm h-100">
                    <img src="{{ asset('storage/' . $foto->foto_kegiatan) }}"
                         class="card-img-top"
                         style="height: 200px; object-fit: cover;"
                         alt="Foto Kegiatan">
                    <div class="card-body text-center">
                        <h6 class="card-title mb-0">
                            {{ $foto->nama_kegiatan ?? 'Dokumentasi Kegiatan' }}
                        </h6>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p>Belum ada foto kegiatan yang tersedia.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection