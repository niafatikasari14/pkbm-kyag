@extends('mylayout')
@section('content')

<div class="container my-5">
    <h3 class="mb-4 text-center">Hubungi Kami</h3>
    <div class="row">
        <!-- Google Maps -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm p-3 h-100">
                <h5 class="mb-3">
                    <i class="bi bi-geo-alt-fill text-danger me-2"></i> Lokasi PKBM Ky Ageng Giri
                </h5>
                <div class="ratio ratio-16x9 mb-3">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.0097782311573!2d110.5126!3d-7.0419!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70dba6a2f67e6f%3A0x1f0bd5e28a21a2f3!2sGirikusumo%2C%20Banyumeneng%2C%20Kec.%20Mranggen%2C%20Kabupaten%20Demak%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1719405532835!5m2!1sid!2sid"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                <a href="https://www.google.com/maps/dir/?api=1&destination=-7.0419,110.5126"
                   target="_blank"
                   class="btn btn-outline-primary w-100">
                    <i class="bi bi-sign-turn-right me-1"></i> Dapatkan Petunjuk Arah
                </a>
            </div>
        </div>

        <!-- Informasi Kontak -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm p-4 h-100">
                <h5 class="mb-3">
                    <i class="bi bi-info-circle-fill text-primary me-2"></i> Informasi Kontak
                </h5>

                <p><i class="bi bi-house-door-fill text-secondary me-2"></i> {{ $kontak->alamat }}</p>
                <p><i class="bi bi-telephone-fill text-secondary me-2"></i> {{ $kontak->no_telp }}</p>
                <p><i class="bi bi-envelope-fill text-secondary me-2"></i> {{ $kontak->email }}</p>
                <p><i class="bi bi-whatsapp text-success me-2"></i> {{ $kontak->watsapp }}</p>
                <p><i class="bi bi-instagram text-danger me-2"></i> {{ $kontak->instagram }}</p>
                <p><i class="bi bi-globe text-secondary me-2"></i> {{ $kontak->website }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Form Ulasan -->
<div class="container mb-5">
    <div class="card shadow-sm col-md-8 mx-auto">
        <div class="card-body p-4">
            <h5 class="mb-3 text-center">
                <i class="bi bi-chat-left-dots-fill text-primary me-2"></i> Tinggalkan Ulasan
            </h5>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('ulasan.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label for="nama" class="form-label small">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control form-control-sm" required>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="telp" class="form-label small">No. Telepon</label>
                        <input type="text" name="telp" id="telp" class="form-control form-control-sm" required>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="email" class="form-label small">Email</label>
                        <input type="email" name="email" id="email" class="form-control form-control-sm" required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="kritik_saran" class="form-label small">Kritik & Saran</label>
                        <textarea name="kritik_saran" id="kritik_saran" rows="3" class="form-control form-control-sm" required></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-sm btn-primary">
                    <i class="bi bi-send-fill me-1"></i> Kirim
                </button>
            </form>
        </div>
    </div>
</div>

@endsection