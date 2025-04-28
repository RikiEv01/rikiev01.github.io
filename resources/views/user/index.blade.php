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
    .form-control, .form-select {
        background-color: #2a2a2a;
        border: 1px solid #444;
        color: #f0f0f0;
    }
    .form-control::placeholder {
        color: #bbb;
    }
    .form-label {
        font-weight: 500;
    }
    .btn-primary {
        background-color: #00f7ff;
        color: #121212;
        font-weight: 600;
        border: none;
    }
    .btn-primary:hover {
        background-color: #0ff;
        transform: scale(1.03);
    }
    .btn-info {
        background-color: #6f42c1;
        border: none;
        color: #fff;
    }
    .btn-info:hover {
        background-color: #8a4cf4;
    }
    h2, h4 {
        color: #00f7ff;
        font-weight: 700;
    }
    #map {
        border: 2px solid #444;
        border-radius: 8px;
    }
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card-custom">
                <h2 class="mb-4 text-center">📍 Form Perhitungan Sekolah</h2>
                <form action="{{ route('user.hitung') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nama_pengguna" class="form-label">Nama Anda</label>
                        <input type="text" name="nama_pengguna" id="nama_pengguna" class="form-control" placeholder="Contoh: Arif Maulana" required>
                    </div>

                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi (Koordinat)</label>
                        <div class="input-group">
                            <input type="text" name="lokasi" id="lokasi" class="form-control" placeholder="-7.250445,112.768845" required>
                            <button type="button" class="btn btn-info" id="btnUseGPS">🎯 Gunakan GPS</button>
                        </div>
                        <small class="form-text text-muted">Klik peta atau gunakan GPS untuk mengisi koordinat otomatis.</small>
                    </div>

                    <div id="map" style="height: 400px;" class="mb-4"></div>

                    <h4 class="mb-3">⚖️ Bobot Kriteria (1 - 10)</h4>
                    <div class="row">
                        <div class="col-md-6 col-lg-4 mb-3">
                            <label class="form-label">Akreditasi</label>
                            <input type="number" name="bobot_akreditasi" class="form-control" min="1" max="10" required>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-3">
                            <label class="form-label">Ekstrakurikuler</label>
                            <input type="number" name="bobot_ekskul" class="form-control" min="1" max="10" required>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-3">
                            <label class="form-label">Jarak</label>
                            <input type="number" name="bobot_jarak" class="form-control" min="1" max="10" required>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-3">
                            <label class="form-label">Biaya SPP</label>
                            <input type="number" name="bobot_spp" class="form-control" min="1" max="10" required>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-3">
                            <label class="form-label">Fasilitas</label>
                            <input type="number" name="bobot_fasilitas" class="form-control" min="1" max="10" required>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary px-5 py-2">🔍 Hitung Sekolah Terbaik</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        var map = L.map('map').setView([-7.250445, 112.768845], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        var marker;
        map.on('click', function(e) {
            var latlng = e.latlng;
            if (marker) {
                marker.setLatLng(latlng);
            } else {
                marker = L.marker(latlng, {draggable: true}).addTo(map);
                marker.on('dragend', function(e) {
                    var pos = marker.getLatLng();
                    document.getElementById('lokasi').value = pos.lat.toFixed(6) + ',' + pos.lng.toFixed(6);
                });
            }
            document.getElementById('lokasi').value = latlng.lat.toFixed(6) + ',' + latlng.lng.toFixed(6);
        });

        document.getElementById('btnUseGPS').addEventListener('click', function() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var lat = position.coords.latitude;
                    var lng = position.coords.longitude;
                    map.setView([lat, lng], 13);
                    if (marker) {
                        marker.setLatLng([lat, lng]);
                    } else {
                        marker = L.marker([lat, lng], {draggable: true}).addTo(map);
                        marker.on('dragend', function(e) {
                            var pos = marker.getLatLng();
                            document.getElementById('lokasi').value = pos.lat.toFixed(6) + ',' + pos.lng.toFixed(6);
                        });
                    }
                    document.getElementById('lokasi').value = lat.toFixed(6) + ',' + lng.toFixed(6);
                }, function(error) {
                    alert('Gagal mengambil lokasi: ' + error.message);
                });
            } else {
                alert("Browser Anda tidak mendukung Geolocation");
            }
        });
    </script>
    <script>
        const batasKriteriaInputs = document.querySelectorAll('input[name^="bobot_"]');

        batasKriteriaInputs.forEach(input => {
            input.addEventListener('input', function () {
                let val = parseInt(this.value);
                if (val > 10) this.value = 10;
                if (val < 1) this.value = 1;
            });
        });
    </script>
@endsection
