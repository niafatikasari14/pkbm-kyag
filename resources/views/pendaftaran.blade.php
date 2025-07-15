@extends('mylayout')
@section('content')

<style>
    .card-section {
        background-color: #f8f9fa;
        border-radius: 12px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card-section:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
    }
    .section-title {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 1rem;
    }
    .btn-link-custom {
        background-color: #007bff;
        color: #fff;
        border: none;
        transition: 0.3s ease;
    }
    .btn-link-custom:hover {
        background-color: #0056b3;
        color: #fff;
    }
    .fade-in {
        animation: fadeIn 1s ease-in-out;
    }
    @keyframes fadeIn {
        from {opacity: 0; transform: translateY(20px);}
        to {opacity: 1; transform: translateY(0);}
    }
</style>
    <div class="text-center mb-5">
        <div class="p-4 rounded bg-primary-subtle shadow-sm animate__animated animate__fadeInDown">
            <h4 class="fw-bold text-primary mb-2">
                <i class="bi bi-person-check-fill me-2"></i>
                Selamat Datang!
            </h4>
            <p class="text-dark mb-0">Anda berada di halaman resmi <strong>Pendaftaran PKBM Ky Ageng Giri</strong></p>
        </div>
    </div>


    <!-- Alur Pendaftaran -->
    <div class="mb-5">
        <h5 class="text-center section-title">Alur Pendaftaran</h5>
        <div class="d-flex justify-content-center">
            <img src="{{ asset('storage/' . $data->alur_pendaftaran) }}" class="img-fluid rounded shadow-sm" style="max-width: 500px;" alt="Alur Pendaftaran">
        </div>
    </div>

    <!-- Brosur -->
    <div class="mb-5">
        <h5 class="text-center section-title">Brosur </h5>
        <div class="d-flex justify-content-center">
            <img src="{{ asset('storage/' . $data->brosur) }}" class="img-fluid rounded shadow-sm" style="max-width: 500px;" alt="Brosur">
        </div>
    </div>

        <!-- Syarat Pendaftaran -->
    <div class="mb-5">
        <h5 class="text-center section-title">Syarat Pendaftaran</h5>
        <div class="card-section p-4 mx-auto shadow-sm" style="max-width: 800px;">
            {!! ($data->syarat_pendaftaran) !!}
        </div>
    </div>
    
    <!-- Link Pendaftaran -->
    <div class="row justify-content-center mb-5">
        <div class="text-center mb-3">
            <p class="fw-semibold">Link pendaftaran dapat diakses melalui link di bawah ini:</p>
        </div>

        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card-section p-3 text-center shadow-sm">
                <h6 class="mb-2">Pendaftaran Paket A</h6>
                <a href="{{ $data->link_paketA }}" class="btn btn-link-custom w-100" target="_blank">Formulir Google</a>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card-section p-3 text-center shadow-sm">
                <h6 class="mb-2">Pendaftaran Paket B</h6>
                <a href="{{ $data->link_paketB }}" class="btn btn-link-custom w-100" target="_blank">Formulir Google</a>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card-section p-3 text-center shadow-sm">
                <h6 class="mb-2">Pendaftaran Paket C</h6>
                <a href="{{ $data->link_paketC }}" class="btn btn-link-custom w-100" target="_blank">Formulir Google</a>
            </div>
        </div>
    </div>


</div>

@endsection
