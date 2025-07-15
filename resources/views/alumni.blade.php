@extends('mylayout')
@section('content')

<!-- Section: Jumlah Alumni -->
<div class="d-flex justify-content-center mb-3 pt-3">
    <div class="card border-0 shadow-sm px-4 py-3 bg-light text-center">
        <div class="text-primary mb-2" style="font-size: 2rem;">
            <i class="bi bi-people-fill"></i>
        </div>
        <h5 class="text-primary mb-1">Jumlah Alumni</h5>
        <h2 id="alumniCount" data-target="{{ $alumnis->total() ?? $alumnis->count() }}" class="fw-bold text-dark mb-0">0</h2>
    </div>
</div>

<div class="container my-5">
    <h3 class="mb-4 text-center">Daftar Alumni</h3>

    <!-- Form Pencarian & Filter -->
    <form method="GET" action="{{ route('alumni') }}" class="mb-4">
        <div class="row justify-content-between align-items-end g-2">
            <div class="col-md-4">
                <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari nama alumni..." value="{{ request('search') }}">
            </div>
            <div class="col-md-6">
                <div class="row g-2 justify-content-end">
                    <div class="col-md-5">
                        <select name="tahun" class="form-select form-select-sm">
                            <option value="">-- Semua Tahun --</option>
                            @foreach($tahunOptions as $tahun)
                                <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>{{ $tahun }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-5">
                        <select name="program" class="form-select form-select-sm">
                            <option value="">-- Semua Program --</option>
                            <option value="Paket A" {{ request('program') == 'Paket A' ? 'selected' : '' }}>Paket A</option>
                            <option value="Paket B" {{ request('program') == 'Paket B' ? 'selected' : '' }}>Paket B</option>
                            <option value="Paket C" {{ request('program') == 'Paket C' ? 'selected' : '' }}>Paket C</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-sm btn-outline-primary w-100">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Tabel Data Alumni -->
    @if($alumnis->count())
        <div class="table-responsive animate__animated animate__fadeInUp">
            <table class="table table-bordered table-striped shadow-sm align-middle text-center">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama Alumni</th>
                        <th>Tahun Lulus</th>
                        <th>Program</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alumnis as $index => $alumni)
                        <tr>
                            <td>{{ $loop->iteration + ($alumnis->currentPage() - 1) * $alumnis->perPage() }}</td>
                            <td class="text-start">{{ ucwords(strtolower($alumni->nama_alumni)) }}</td>
                            <td>{{ $alumni->tahun_lulus }}</td>
                            <td>{{ $alumni->program }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-3">
            {!! $alumnis->withQueryString()->links() !!}
        </div>
    @else
        <div class="alert alert-info text-center animate__animated animate__fadeIn">
            <i class="bi bi-info-circle"></i> Data alumni tidak ditemukan.
        </div>
    @endif
</div>

<!-- Script Counter Angka Alumni -->
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const counter = document.getElementById("alumniCount");
        const target = parseInt(counter.getAttribute("data-target"));
        let count = 0;
        const updateCount = () => {
            const speed = 20;
            const increment = Math.ceil(target / 50);
            if (count < target) {
                count += increment;
                if (count > target) count = target;
                counter.innerText = count;
                setTimeout(updateCount, speed);
            } else {
                counter.innerText = target;
            }
        };
        updateCount();
    });
</script>

@endsection
