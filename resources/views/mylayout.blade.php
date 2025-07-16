<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ env('APP_NAME', 'PKBM Ky Ageng Giri') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        .social-floating {
            position: fixed;
            top: 40%;
            right: 15px;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .social-floating a {
            font-size: 22px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0,0,0,0.3);
            text-decoration: none;
        }

        .social-floating a:hover {
            transform: scale(1.1);
            box-shadow: 0 0 15px rgba(0,0,0,0.4);
        }

        .social-floating .wa { background-color: #25D366; }
        .social-floating .fb { background-color: #1877F2; }
        .social-floating .ig {
            background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fd5949 40%, #d6249f 75%, #285AEB 100%);
        }
        .social-floating .yt { background-color: #FF0000; }

        .navbar .nav-link {
            transition: color 0.3s ease;
        }

        .navbar .nav-link:hover {
            color: #ffd700 !important;
            text-decoration: underline;
        }
        .navbar .nav-link:hover {
        color: #ffd700 !important;
        text-decoration: underline;
        }
    </style>
</head>
@stack('scripts')

<body class="bg-light">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg shadow-sm" style="background: linear-gradient(90deg, #2c3e50, #2a5298);">
    <div class="container-fluid px-3 px-md-5">
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="{{ asset('storage/logo.jpg') }}" alt="Logo" width="35" height="35" class="rounded-circle me-2">
            <span class="fw-semibold fs-6">PKBM KY AGENG GIRI</span>
        </a>

        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu Items -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto text-center">
                <li class="nav-item"><a class="nav-link text-white" href="/home_index">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown">About</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/informasipkbm">Informasi PKBM</a></li>
                        <li><a class="dropdown-item" href="/datapendidik">Data Pendidik</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link text-white" href="/berita">Berita</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/akademik">Akademik</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/alumni">Alumni</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/galeri">Galeri</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/pendaftaran">Pendaftaran</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="/kontak">Kontak</a></li>
            </ul>
  
        <!-- Login button (responsive) -->
        <!-- Untuk layar besar (desktop) -->
        <div class="d-none d-lg-block">
            <a href="{{ route('filament.admin.auth.login') }}" class="btn btn-outline-light ms-3">
                <i class="bi bi-box-arrow-in-right me-1"></i> Login
            </a>
        </div>

        <!-- Untuk layar kecil (mobile/tablet) di dalam menu navbar collapse -->
        <ul class="navbar-nav d-lg-none mt-3">
            <li class="nav-item">
                <a class="nav-link text-white btn btn-outline-light w-100" href="{{ route('filament.admin.auth.login') }}">
                    <i class="bi bi-box-arrow-in-right me-1"></i> Login
                </a>
            </li>
        </ul>
    </div>
    </div>
</nav>

<!-- Social Floating -->
<div class="social-floating">
    <a href="https://wa.me/6285198077103" target="_blank" class="wa" title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
    <a href="https://www.facebook.com/profile.php?id=61551427768560="target="_blank" class="fb" title="Facebook"><i class="bi bi-facebook"></i></a>
    <a href="https://www.instagram.com/pkbmkyageng?igsh=N3d6MXFhOGtzcWxr" target="_blank" class="ig" title="Instagram"><i class="bi bi-instagram"></i></a>
    <a href="https://youtube.com/@pesantrengirikesumo9640?si=hS_O1SA7WzMmEzy5" target="_blank" class="yt" title="YouTube"><i class="bi bi-youtube"></i></a>
</div>
<!-- Main Content -->
<main class="container my-4">
    @yield('content')
</main>

<!-- Footer -->
<footer class="bg-dark text-white mt-5 py-4">
    <div class="container">
        <div class="row g-4 align-items-start">
            <!-- Logo + Info -->
            <div class="col-lg-4 d-flex">
                <!-- Logo -->
                <img src="{{ asset('storage/logo.jpg') }}" alt="Logo PKBM"
                     width="80" height="80" class="rounded-circle me-3 mt-1">

                <!-- Deskripsi -->
                <div>
                    <h5 class="mb-1">PKBM Ky Ageng Giri</h5>
                    <p class="mb-0 small text-light">
                        Pusat Kegiatan Belajar Masyarakat yang memberikan pendidikan kesetaraan
                        dan pemberdayaan masyarakat.
                    </p>
                </div>
            </div>

            <!-- Menu -->
            <div class="col-lg-4 ps-lg-5">
                <h5>Menu</h5>
                <ul class="list-unstyled">
                    <li class="mb-1"><a href="/home_index" class="text-white text-decoration-none">Beranda</a></li>
                    <li class="mb-1"><a href="/berita" class="text-white text-decoration-none">Berita</a></li>
                    <li class="mb-1"><a href="/kontak" class="text-white text-decoration-none">Kontak</a></li>
                </ul>
            </div>

            <!-- Kontak -->
            <div class="col-lg-4">
                <h5>Kontak</h5>
                <p class="mb-1">JL. Girikusumo RT 04/03 Banyumeneng, Mranggen, Demak</p>
                <p class="mb-1">Email: pkbmkyagenggiri@gmail.com</p>
                <p>Telp: 0851-9807-7103</p>
            </div>
        </div>

        <div class="text-center pt-3 mt-4 border-top">
            <small>&copy; {{ date('Y') }} PKBM Ky Ageng Giri. All rights reserved.</small>
        </div>
    </div>
</footer>

<!-- JS Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
@livewireScripts

</html>
