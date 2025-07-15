@extends('mylayout')
@section('content')

<style>
    .fade-in {
        animation: fadeInUp 0.8s ease-in-out;
    }

    @keyframes fadeInUp {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    .pdf-box:hover {
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    .section-title {
        font-size: 1.3rem;
        font-weight: 600;
        color: #0d6efd;
    }

    .kurikulum-box a {
        text-decoration: none;
        color: #0d6efd;
        font-size: 0.95rem;
    }

    .kurikulum-box a:hover {
        text-decoration: underline;
    }
</style>

<div class="container my-5">
    <h3 class="mb-5 text-center fade-in">Halaman Akademik</h3>

    <div class="row fade-in">
        <!-- Kurikulum -->
        <div class="col-md-9 mb-4">
            <div class="card shadow-sm pdf-box border-0">
                <div class="card-header bg-light text-primary fw-semibold">
                    <i class="bi bi-book me-1"></i> Kurikulum
                </div>
                <div class="card-body">
                    <p class="text-muted" style="text-align: justify; font-size: 0.95rem;">
                        PKBM Ky Ageng Giri menerapkan <strong>Kurikulum Merdeka</strong> dalam kegiatan pembelajarannya. Kurikulum ini bertujuan untuk memberikan keleluasaan kepada peserta didik dalam mengembangkan kompetensi dan potensi sesuai minat dan bakat masing-masing. Pembelajaran lebih berpusat pada siswa, bersifat fleksibel, dan mendorong kreativitas serta karakter peserta didik.
                    </p>
                </div>
            </div>

            <!-- Sarana & Prasarana -->
            <div class="mt-4 fade-in">
                <h4 class="mb-3 section-title">
                    <i class="bi bi-building me-2"></i> Sarana & Prasarana
                </h4>
                <div class="row">
                    @forelse ($sarana as $item)
                        <div class="col-md-4 col-sm-6 mb-4">
                            <div class="card h-100 shadow-sm">
                                <img src="{{ asset('storage/' . $item->gambar_fasilitas) }}" class="card-img-top"
                                     style="height: 180px; object-fit: cover;" alt="{{ $item->nama_fasilitas }}">
                                <div class="card-body text-center">
                                    <h6 class="mb-0">{{ $item->nama_fasilitas }}</h6>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <p class="text-muted">Belum ada data sarana & prasarana.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Kalender Akademik -->
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm pdf-box border-0 h-100">
                <div class="card-header bg-primary text-white fw-semibold">
                    <i class="bi bi-calendar-event me-1"></i> Kalender Akademik
                </div>
                <div class="card-body">
                    @if ($kalender)
                        <div class="mb-3 border rounded overflow-hidden">
                            <img src="{{ asset('storage/' . $kalender->gambar_kalender) }}"
                                 alt="Kalender Akademik"
                                 class="img-fluid rounded shadow-sm w-100"
                                 style="object-fit: contain; max-height: 700px;" />
                        </div>
                        <a href="{{ asset('storage/' . $kalender->gambar_kalender) }}"
                           class="btn btn-sm btn-outline-light w-100"
                           style="background-color: #f8f9fa; color: #0d6efd; border-color: #0d6efd;"
                           download>
                            <i class="bi bi-download me-1"></i> Unduh Kalender
                        </a>
                    @else
                        <p class="text-muted">Kalender akademik belum tersedia.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
