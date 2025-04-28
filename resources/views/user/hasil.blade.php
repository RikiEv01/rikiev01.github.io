@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #121212;
        color: #f0f0f0;
        font-family: 'Inter', sans-serif;
    }
    .card-custom {
        background-color: #1e1e1e;
        border: 1px solid #333;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 0 12px rgba(0, 255, 255, 0.1);
    }
    .btn-secondary {
        background-color: #2a2a2a;
        border: 1px solid #00f7ff;
        color: #00f7ff;
        font-weight: 600;
    }
    .btn-secondary:hover {
        background-color: #00f7ff;
        color: #121212;
    }
    .table-dark th {
        background-color: #1f1f1f;
        color: #00f7ff;
        border-color: #333;
    }
    .table td, .table th {
        vertical-align: middle;
    }
    .highlight-row {
        background-color: #00f7ff !important;
        color: #121212 !important;
        font-weight: bold;
        box-shadow: 0 0 12px rgba(0, 247, 255, 0.6);
    }
</style>

<div class="container py-5">
    <div class="card-custom">
        <h2 class="mb-4 text-center">📊 Hasil Rekomendasi Sekolah</h2>

        <div class="alert alert-info text-center">
            Rekomendasi di bawah dihitung berdasarkan bobot kriteria yang Anda masukkan.
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Peringkat</th>
                        <th>Nama Sekolah</th>
                        <th>Skor SAW</th>
                        <th>Jarak dari Lokasi Anda (km)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hasil as $i => $item)
                        <tr class="{{ $i === 0 ? 'highlight-row' : '' }}">
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $item['sekolah'] }}</td>
                            <td>{{ $item['skor'] }}</td>
                            <td>{{ $item['jarak'] ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('user.index') }}" class="btn btn-secondary px-4 py-2">
                🔁 Hitung Ulang
            </a>
        </div>
    </div>
</div>
@endsection
