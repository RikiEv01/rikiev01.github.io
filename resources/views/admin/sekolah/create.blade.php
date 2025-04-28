@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<style>
    #map { height: 350px; }
</style>
@endsection

@section('content')
<div class="container">
    <h2>Tambah Data Sekolah</h2>
    <form action="{{ route('admin.sekolahs.store') }}" method="POST">
        @csrf
        @include('admin.sekolah._form', ['sekolah' => null])
        <div id="map" class="mb-4"></div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.sekolahs.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection

@section('scripts')
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    const map = L.map('map').setView([1.045626, 104.030457], 13); // Kota Batam
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    let marker = null;

    map.on('click', function (e) {
        const lat = e.latlng.lat.toFixed(6);
        const lng = e.latlng.lng.toFixed(6);

        if (marker) {
            marker.setLatLng(e.latlng);
        } else {
            marker = L.marker(e.latlng).addTo(map);
        }

        // PASTIKAN ini bekerja
        document.querySelector('#latitude').value = lat;
        document.querySelector('#longitude').value = lng;
    });

    // Cegah submit jika belum pilih lokasi
    document.querySelector('form').addEventListener('submit', function (e) {
        const lat = document.querySelector('#latitude').value;
        const lng = document.querySelector('#longitude').value;
        if (!lat || !lng) {
            alert('Silakan klik lokasi di peta terlebih dahulu.');
            e.preventDefault();
        }
    });
</script>
@endsection
