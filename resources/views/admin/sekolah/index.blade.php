@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Sekolah</h2>
        <div class="d-flex justify-content-between mb-3 align-items-center">
        <a href="{{ route('admin.sekolahs.create') }}" class="btn btn-success">
            + Tambah Sekolah Manual
        </a>
        <a href="{{ asset('template/sekolah_template.xlsx') }}" class="btn btn-outline-secondary">
            📥 Download Template Excel
        </a>

        <form action="{{ route('admin.sekolahs.import') }}" method="POST" enctype="multipart/form-data" class="d-flex gap-2">
            @csrf
            <input type="file" name="file" accept=".xlsx,.csv" required class="form-control form-control-sm" style="width: 230px;">
            <button type="submit" class="btn btn-primary btn-sm">📤 Upload Excel</button>
        </form>
    </div>


    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="error-alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Akreditasi</th>
                <th>Ekskul</th>
                <th>Koordinat</th>
                <th>SPP</th>
                <th>Fasilitas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sekolahs as $sekolah)
            <tr>
                <td>{{ $sekolah->nama }}</td>
                <td>{{ $sekolah->akreditasi }}</td>
                <td>{{ $sekolah->ekskul }}</td>
                <td>{{ $sekolah->latitude }}, {{ $sekolah->longitude }}</td>
                <td>Rp {{ number_format($sekolah->spp, 0, ',', '.') }}</td>
                <td>{{ $sekolah->fasilitas }}</td>
                <td>
                    <a href="{{ route('admin.sekolahs.edit', $sekolah->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.sekolahs.destroy', $sekolah->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus sekolah ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div id="map" class="my-4" style="height: 400px;"></div>
</div>
@endsection

<script>
    // Hilangkan alert setelah 3 detik (3000ms)
    setTimeout(function () {
        let success = document.getElementById('success-alert');
        let error = document.getElementById('error-alert');
        if (success) {
            success.classList.remove('show');
        }
        if (error) {
            error.classList.remove('show');
        }
    }, 3000);
</script>

