<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ env('APP_NAME', 'PKBM Ky Ageng Giri') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .social-floating {
            position: fixed;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            z-index: 1050;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .social-floating a {
            font-size: 20px;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            text-decoration: none;
        }

        .social-floating a:hover {
            transform: scale(1.1);
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
        }

        .wa { background-color: #25D366; }
        .fb { background-color: #1877F2; }
        .ig {
            background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fd5949 40%, #d6249f 75%, #285AEB 100%);
        }
        .yt { background-color: #FF0000; }

        .navbar .nav-link {
            transition: color 0.3s ease;
        }

        .navbar .nav-link:hover {
            color: #ffd700 !important;
            text-decoration: underline;
        }

        @media (max-width: 576px) {
            .navbar-brand span {
                font-size: 14px;
            }

            .navbar-nav .nav-link {
                font-size: 14px;
            }

            .footer h5 {
                font-size: 16px;
            }
        }
    </style>
</head>
@stack('scripts')

<body>
<nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(90deg, #2c3e50, #2a5298);">
    <div class="container-fluid px-3">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="{{ asset('storage/logo.jpg') }}" alt="Logo" width="40" height="40" class="rounded-circle me-2">
            <span class="fw-semibold d-none d-md-inline">PKBM KY AGENG GIRI</span>
            <span class="fw-semibold d-md-none">PKBM KY AGENG GIRI</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
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
        <!-- Login utk Mobile -->
        <li class="nav-item d-lg-none mt-2">
          <a class="btn btn-outline-light w-100" href="{{ route('filament.admin.auth.login') }}">
            <i class="bi bi-box-arrow-in-right"></i> Login
          </a>
        </li>
      </ul>
    </div>

    <!-- Login utk Desktop -->
    <div class="d-none d-lg-block">
      <a href="{{ route('filament.admin.auth.login') }}" class="btn btn-outline-light ms-3">
        <i class="bi bi-box-arrow-in-right me-1"></i> Login
      </a>
    </div>
  </div>
</nav>

<!-- Social Floating -->
<div class="social-floating">
    <a href="https://wa.me/6285198077103" class="wa" target="_blank"><i class="bi bi-whatsapp"></i></a>
    <a href="https://www.facebook.com/profile.php?id=61551427768560" class="fb" target="_blank"><i class="bi bi-facebook"></i></a>
    <a href="https://www.instagram.com/pkbmkyageng" class="ig" target="_blank"><i class="bi bi-instagram"></i></a>
    <a href="https://youtube.com/@pesantrengirikesumo9640" class="yt" target="_blank"><i class="bi bi-youtube"></i></a>
</div>

<main class="container py-4">
    @yield('content')
</main>

<footer class="bg-dark text-white pt-4 pb-3 footer">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4 d-flex">
                <img src="{{ asset('storage/logo.jpg') }}" alt="Logo PKBM" width="70" height="70" class="rounded-circle me-3 mt-1">
                <div>
                    <h5 class="mb-1">PKBM Ky Ageng Giri</h5>
                    <p class="small">Pusat Kegiatan Belajar Masyarakat yang memberikan pendidikan kesetaraan dan pemberdayaan masyarakat.</p>
                </div>
            </div>
            <div class="col-md-4">
                <h5>Menu</h5>
                <ul class="list-unstyled">
                    <li><a href="/home_index" class="text-white text-decoration-none">Beranda</a></li>
                    <li><a href="/berita" class="text-white text-decoration-none">Berita</a></li>
                    <li><a href="/kontak" class="text-white text-decoration-none">Kontak</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Kontak</h5>
                <p class="mb-1">JL. Girikusumo RT 04/03 Banyumeneng, Mranggen, Demak</p>
                <p class="mb-1">Email: pkbmkyagenggiri@gmail.com</p>
                <p>Telp: 0851-9807-7103</p>
            </div>
        </div>
        <div class="text-center pt-3 mt-3 border-top">
            <small>&copy; {{ date('Y') }} PKBM Ky Ageng Giri. All rights reserved.</small>
        </div>
    </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
@livewireScripts
</body>
</html>
