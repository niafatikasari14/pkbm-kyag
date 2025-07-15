@extends('mylayout')

@section('content')
<div class="container my-5">

    <!-- Judul Halaman -->
    <h2 class="mb-4 text-center">Tentang PKBM Ky Ageng Giri</h2>

    <!-- Sejarah PKBM -->
    <section class="mb-5">
        <h4>Sejarah PKBM</h4>
        <p class="card-text text-dark" style="text-align: justify; text-indent: 1.5em;">
            PKBM Ky Ageng Giri berdiri sebagai lembaga pendidikan non-formal yang memberikan kesempatan kepada masyarakat untuk melanjutkan pendidikan di luar jalur sekolah formal. Didirikan dengan semangat mencerdaskan kehidupan bangsa, PKBM ini menjadi alternatif utama bagi mereka yang putus sekolah atau ingin belajar di usia dewasa. Dengan pendekatan fleksibel dan berbasis masyarakat, kami melayani program setara SD, SMP, dan SMA.
        </p>
    </section>

<!-- Program Pendidikan -->
<section class="mb-5">
    <h4 class="text-center mb-4">Program Pendidikan Kesetaraan</h4>
    <div class="row row-cols-1 row-cols-md-3 g-4">

        <!-- Paket A -->
        <div class="col">
            <div class="card h-100 shadow-sm border-0 p-3">
                <div class="card-body">
                    <h5 class="card-title text-primary text-center">Paket A (Setara SD)</h5>
                    <p class="card-text text-dark" style="text-align: justify; text-indent: 1.5em;">
                        Paket A adalah program pendidikan kesetaraan setara Sekolah Dasar (SD). Program ini dirancang untuk mereka yang tidak menyelesaikan SD karena kendala ekonomi, sosial, atau waktu. Cocok untuk siswa homeschooling atau pekerja. Peserta diwajibkan mengikuti proses belajar di PKBM sebelum ujian. Ijazah yang diperoleh setara SD dan dapat digunakan untuk melanjutkan ke SMP atau keperluan kerja.
                    </p>
                </div>
            </div>
        </div>

        <!-- Paket B -->
        <div class="col">
            <div class="card h-100 shadow-sm border-0 p-3">
                <div class="card-body">
                    <h5 class="card-title text-success text-center">Paket B (Setara SMP)</h5>
                    <p class="card-text text-dark" style="text-align: justify; text-indent: 1.5em;">
                        Paket B diperuntukkan bagi mereka yang belum menyelesaikan pendidikan tingkat SMP. Program ini memberikan akses pendidikan bagi yang terkendala sekolah formal karena pekerjaan, jarak, atau kondisi sosial. Pembelajaran diselenggarakan fleksibel di PKBM. Lulusannya mendapat ijazah yang setara SMP dan bisa digunakan untuk melanjutkan ke SMA/SMK atau sebagai syarat kerja.
                    </p>
                </div>
            </div>
        </div>

        <!-- Paket C -->
        <div class="col">
            <div class="card h-100 shadow-sm border-0 p-3">
                <div class="card-body">
                    <h5 class="card-title text-danger text-center">Paket C (Setara SMA)</h5>
                    <p class="card-text text-dark" style="text-align: justify; text-indent: 1.5em;">
                        Paket C setara dengan jenjang SMA, dengan jurusan IPA dan IPS. Program ini cocok untuk warga belajar yang ingin melanjutkan pendidikan namun terhambat sekolah formal. Peserta bisa dari kalangan pekerja, ibu rumah tangga, atau homeschooling. Pembelajaran dilakukan secara fleksibel dan terstruktur di PKBM. Ijazahnya dapat digunakan untuk kuliah, bekerja, atau keperluan administratif seperti CPNS dan TNI/Polri.
                    </p>
                </div>
            </div>
        </div>

    </div>
</section>


    <!-- Visi Misi -->
    <section class="mb-5">
        <h4>Visi & Misi</h4>
        @if ($visimisi)
            <p>{!! $visimisi->visi_misi !!}</p>
        @else
            <p>Data visi dan misi belum tersedia.</p>
        @endif
    </section>

<!-- Akreditasi -->
<section class="mb-5">
    <h4 class="mb-3 text-primary fw-semibold">
        <i class="bi bi-award-fill me-2"></i> Dokumen Akreditasi
    </h4>

    @if ($akreditasi && $akreditasi->akreditasi)
        <div class="d-flex justify-content-center">
            <div class="border rounded shadow-sm p-3 bg-white" style="max-width: 500px; width: 100%;">
                <img src="{{ asset('storage/' . $akreditasi->akreditasi) }}"
                     alt="Dokumen Akreditasi"
                     class="img-fluid rounded mx-auto d-block"
                     style="object-fit: contain; max-height: 400px; width: 100%;">
                <p class="mt-2 text-center text-muted" style="font-size: 0.9rem;">
                    Akreditasi resmi dari BAN-PNF atau lembaga terkait.
                </p>
            </div>
        </div>
    @else
        <div class="alert alert-warning text-center" role="alert">
            <i class="bi bi-exclamation-circle me-1"></i> Data akreditasi belum tersedia.
        </div>
    @endif
</section>

@endsection
