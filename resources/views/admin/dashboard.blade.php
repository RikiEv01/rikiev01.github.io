@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">👋 Selamat datang, Admin!</h2>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">🏫 Total Sekolah</h5>
                    <h2>{{ $totalSekolah }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">🧮 Total Perhitungan</h5>
                    <h2>{{ $totalPerhitungan }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">📊 Sekolah Terpopuler</h5>
                    @if($topSekolah)
                        <p class="mb-1"><strong>{{ $topSekolah }}</strong></p>
                        <small>Muncul {{ $topJumlah }}x di posisi #1</small>
                    @else
                        <p class="text-muted">Belum ada data</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
