@extends('mylayout')
@section('content')

<style>
.carousel-item img {
    width: 100%;
    height: 500px;
    object-fit: cover;
}

@media (max-width: 576px) {
    .carousel-item img {
        height: 300px; /* lebih kecil tapi tetap landscape */
    }
}
</style>

<!-- SLIDER BOOTSTRAP -->
<div id="heroCarousel" class="carousel slide mb-5" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('storage/slider/1.jpg') }}" class="d-block w-100" alt="Slider 1">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('storage/slider/2.jpg') }}" class="d-block w-100" alt="Slider 2">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('storage/slider/3.jpg') }}" class="d-block w-100" alt="Slider 3">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('storage/slider/4.jpg') }}" class="d-block w-100" alt="Slider 4">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('storage/slider/5.jpg') }}" class="d-block w-100" alt="Slider 5">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('storage/slider/6.jpg') }}" class="d-block w-100" alt="Slider 6">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('storage/slider/7.jpg') }}" class="d-block w-100" alt="Slider 7">
    </div>
  </div>

  <!-- Tombol Navigasi -->
  <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Sebelumnya</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Berikutnya</span>
  </button>
</div>

<div class="container my-5">
    <div class="row">
        <!-- Kolom Berita Terbaru -->
        <div class="col-md-8">
            <h3 class="mb-4">Berita Terbaru</h3>
            @foreach ($berita->take(5) as $item)
                <div class="card mb-3 shadow-sm border-0">
                    <div class="row g-0 align-items-center">
                        <div class="col-md-4 px-2 py-2">
                            <img src="{{ asset('storage/' . $item->gambar_berita) }}"
                                 class="img-fluid rounded"
                                 alt="Gambar Berita"
                                 style="height: 130px; width: 100%; object-fit: cover; border: 1px solid #e0e0e0;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body py-2 pe-3">
                                <h6 class="card-title fw-bold mb-1">
                                    {{ \Illuminate\Support\Str::limit($item->judul_berita, 60) }}
                                </h6>
                                <p class="card-text mb-1 small text-muted">
                                    {!! \Illuminate\Support\Str::limit(strip_tags($item->isi_berita), 80) !!}
                                </p>
                                <small class="text-muted d-block mb-2">
                                    {{ \Carbon\Carbon::parse($item->tanggal_berita)->translatedFormat('d F Y') }}
                                </small>
                                <a href="{{ route('beritashow', $item->slug) }}"
                                   class="btn btn-sm btn-outline-primary">
                                    Selengkapnya →
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

<div class="container my-5">
<div class="row">
<!-- Kolom Pengumuman -->
<div class="col-md-4">
    <h3 class="mb-4">Pengumuman</h3>

    @forelse ($pengumuman as $pengumuman)
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-primary text-white">
                <h6 class="card-title fw-semibold mb-0">
                    <i class="bi bi-megaphone-fill me-1"></i> {{ $pengumuman->judul_pengumuman }}
                </h6>
            </div>

            <div class="card-body">
                <!-- Isi Pengumuman -->
                <div class="card-text mb-3" style="font-size: 0.95rem;">
                    {!! $pengumuman->isi_pengumuman !!}
                </div>

                <!-- Lampiran -->
                @php
                    $filePath = 'storage/' . $pengumuman->file_pengumuman;
                    $ext = strtolower(pathinfo($pengumuman->file_pengumuman, PATHINFO_EXTENSION));
                @endphp

                @if ($pengumuman->file_pengumuman)
                    @if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                        <div class="mb-3 text-center">
                            <img src="{{ asset($filePath) }}" alt="Lampiran Gambar"
                                class="img-fluid rounded shadow-sm"
                                style="max-width: 75%; height: auto;">
                        </div>
                    @else
                        <a href="{{ asset($filePath) }}" download target="_blank"
                            class="btn btn-sm btn-outline-primary mb-3">
                            <i class="bi bi-download me-1"></i> Unduh Lampiran
                        </a>
                    @endif
                @endif

                <!-- Tanggal -->
                <div class="mt-1">
                    <small class="text-muted">
                        <i class="bi bi-calendar-event me-1"></i>
                        {{ $pengumuman->tanggal_pengumuman
                            ? \Carbon\Carbon::parse($pengumuman->tanggal_pengumuman)->translatedFormat('d F Y')
                            : $pengumuman->created_at->translatedFormat('d F Y') }}
                    </small>
                </div>
            </div>
        </div>
    @empty
        <div class="alert alert-info">
            Belum ada pengumuman.
        </div>
    @endforelse
</div>
</div>
</div>

<!-- Tentang PKBM -->
<div class="my-3">
    <h3 class="mb-3 text-center">Tentang PKBM Ky Ageng Giri</h3>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm p-4">
                <p class="text-justify">
                    PKBM Ky Ageng Giri adalah Pusat Kegiatan Belajar Masyarakat yang berfokus pada pendidikan non-formal bagi masyarakat yang belum sempat menyelesaikan pendidikan formal. 
                    Kami menyediakan program Paket A (setara SD), Paket B (setara SMP), dan Paket C (setara SMA) dengan sistem pembelajaran fleksibel yang dapat diikuti oleh berbagai kalangan usia.
                    <br><br>
                    Dengan semangat "Belajar Sepanjang Hayat", kami berkomitmen membantu mencerdaskan kehidupan bangsa dan membuka akses pendidikan seluas-luasnya bagi masyarakat.
                </p>
                <!-- Tombol Selengkapnya -->
                <div class="text-end">
                    <a href="/informasipkbm" class="btn btn-outline-primary mt-3">
                        Selengkapnya →
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Program PKBM -->
<div class="mt-5">
    <h3 class="mb-3 text-center">Program PKBM</h3>
    <div class="row bg-secondary-subtle p-3">
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm text-center">
                <div class="card-body">
                    <h5 class="card-title">Paket A (Setara SD)</h5>
                    <p class="card-text">Program pendidikan dasar setara Sekolah Dasar untuk anak dan dewasa yang belum menyelesaikan SD.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm text-center">
                <div class="card-body">
                    <h5 class="card-title">Paket B (Setara SMP)</h5>
                    <p class="card-text">Pendidikan setara Sekolah Menengah Pertama untuk yang telah lulus SD atau Paket A.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm text-center">
                <div class="card-body">
                    <h5 class="card-title">Paket C (Setara SMA)</h5>
                    <p class="card-text">Pendidikan setara SMA bagi lulusan SMP/Paket B, dengan fleksibilitas belajar untuk semua usia.</p>
                </div>
            </div>
        </div>
        <!-- Tombol Selengkapnya -->
        <div class="text-end">
            <a href="/informasipkbm" class="btn btn-outline-primary mt-3">
                Selengkapnya →
            </a>
        </div>
    </div>
</div>


<!-- Galeri -->
<div class="container my-5">
  <h3 class="mb-4">Galeri Foto</h3>
  <div class="row">
    @forelse ($galeri as $foto)
      <div class="col-md-3 mb-4 animate__animated animate__zoomIn">
        <div class="card h-100 shadow-sm">
          <img src="{{ asset('storage/' . $foto->foto_kegiatan) }}" class="card-img-top" style="height: 180px; object-fit: cover;" alt="Foto">
          <div class="card-body text-center">
            <h6 class="mb-0">{{ $foto->nama_kegiatan ?? 'Kegiatan' }}</h6>
          </div>
        </div>
      </div>
    @empty
      <div class="col-12 text-center">
        <p>Belum ada foto kegiatan yang tersedia.</p>
      </div>
    @endforelse
  </div>
  <a href="/galeri" class="btn btn-outline-primary">Lihat Semua Galeri</a>
</div>

<!-- Kalender Bulan Ini -->
<div class="container my-5">
    <h3 class="mb-4 text-center">Kalender</h3>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div id="kalender-bulan-ini" class="shadow rounded-4 border border-light-subtle"></div>
        </div>
    </div>
</div>


@endsection

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    const bulanIndonesia = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    const hari = ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'];

    const today = new Date();
    const tahun = today.getFullYear();
    const bulan = today.getMonth();

    const awalBulan = new Date(tahun, bulan, 1);
    const akhirBulan = new Date(tahun, bulan + 1, 0);

    const hariPertama = (awalBulan.getDay() + 6) % 7; // Mulai dari Senin
    const totalHari = akhirBulan.getDate();

    let kalender = `
        <div class='card shadow-sm'>
            <div class='card-header bg-light text-center fw-bold'>
                ${bulanIndonesia[bulan]} ${tahun}
            </div>
            <div class='card-body p-2'>
                <table class='table table-bordered text-center small mb-0'>
                    <thead class='table-secondary'>
                        <tr>${hari.map(h => `<th>${h}</th>`).join('')}</tr>
                    </thead>
                    <tbody>
    `;

    let tanggal = 1;
    for (let i = 0; i < 6; i++) {
        kalender += '<tr>';
        for (let j = 0; j < 7; j++) {
            if (i === 0 && j < hariPertama) {
                kalender += '<td></td>';
            } else if (tanggal > totalHari) {
                kalender += '<td></td>';
            } else {
                kalender += `<td>${tanggal}</td>`;
                tanggal++;
            }
        }
        kalender += '</tr>';
        if (tanggal > totalHari) break;
    }

    kalender += '</tbody></table></div></div>';
    document.getElementById('kalender-bulan-ini').innerHTML = kalender;
});
</script>
@endpush
