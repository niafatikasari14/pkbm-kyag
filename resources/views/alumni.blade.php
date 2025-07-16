@extends('mylayout')
@section('content')

<style>
    html, body {
        max-width: 100%;
        overflow-x: hidden;
    }

    .table-responsive {
        width: 100%;
        overflow-x: auto;
    }

    @media (max-width: 576px) {
        .form-control,
        .form-select,
        .btn {
            font-size: 0.85rem;
        }

        table th, table td {
            font-size: 0.85rem;
            padding: 0.5rem;
        }
    }
    .pagination {
    flex-wrap: wrap;
    justify-content: center;
    }

    @media (max-width: 576px) {
        .pagination {
            font-size: 0.85rem;
        }
    }

</style>


<!-- Section: Jumlah Alumni -->
<div class="d-flex justify-content-center mb-3 pt-3">
    <div class="card border-0 shadow-sm px-4 py-3 bg-light text-center w-100 mx-2 mx-sm-0" style="max-width: 350px;">
        <div class="text-primary mb-2" style="font-size: 2rem;">
            <i class="bi bi-people-fill"></i>
        </div>
        <h5 class="text-primary mb-1">Jumlah Alumni</h5>
        <h2 id="alumniCount" data-target="{{ $alumnis->total() ?? $alumnis->count() }}" class="fw-bold text-dark mb-0">0</h2>
    </div>
</div>

<div class="container my-5">
    <h3 class="text-center mb-4">Daftar Alumni</h3>

    <!-- Form -->
    <form class="mb-4" method="GET" action="{{ route('alumni') }}">
        <div class="row g-2">
            <div class="col-12 col-md-4">
                <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari alumni..." value="{{ request('search') }}">
            </div>
            <div class="col-6 col-md-3">
                <select name="tahun" class="form-select form-select-sm">
                    <option value="">-- Semua Tahun --</option>
                    @foreach($tahunOptions as $tahun)
                        <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>{{ $tahun }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-6 col-md-3">
                <select name="program" class="form-select form-select-sm">
                    <option value="">-- Semua Program --</option>
                    <option value="Paket A">Paket A</option>
                    <option value="Paket B">Paket B</option>
                    <option value="Paket C">Paket C</option>
                </select>
            </div>
            <div class="col-12 col-md-2">
                <button class="btn btn-outline-primary w-100 btn-sm" type="submit">
                    <i class="bi bi-search"></i> Cari
                </button>
            </div>
        </div>
    </form>

    <!-- Tabel -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center align-middle shadow-sm">
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
                        <td class="text-start">{{ $alumni->nama_alumni }}</td>
                        <td>{{ $alumni->tahun_lulus }}</td>
                        <td>{{ $alumni->program }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="table-responsive">
        <div class="d-flex justify-content-center mt-3 overflow-auto">
            {!! $alumnis->withQueryString()->links() !!}
        </div>
    </div>

</div>
</form>
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
