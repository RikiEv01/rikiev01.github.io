@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<style>
    #map { height: 350px; }
</style>
@endsection

@section('content')
<div class="container">
    <h2>Edit Data Sekolah</h2>
    <form action="{{ route('admin.sekolahs.update', $sekolah->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('admin.sekolah._form', ['sekolah' => $sekolah])
        <div id="map" class="mb-4"></div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('admin.sekolahs.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection

@section('scripts')
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    const latInput = document.getElementById('latitude');
    const lngInput = document.getElementById('longitude');

    const initialLat = parseFloat(latInput.value) || 1.045626;
    const initialLng = parseFloat(lngInput.value) || 104.030457;

    const map = L.map('map').setView([initialLat, initialLng], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    // Tampilkan marker awal
    let marker = L.marker([initialLat, initialLng], { draggable: true }).addTo(map);

    // Saat marker diseret
    marker.on('dragend', function(e) {
        const { lat, lng } = e.target.getLatLng();
        latInput.value = lat.toFixed(6);
        lngInput.value = lng.toFixed(6);
    });

    // Saat peta diklik
    map.on('click', function(e) {
        const { lat, lng } = e.latlng;
        marker.setLatLng(e.latlng);
        latInput.value = lat.toFixed(6);
        lngInput.value = lng.toFixed(6);
    });

    // Cegah submit kalau belum ada koordinat
    document.querySelector('form').addEventListener('submit', function(e) {
        if (!latInput.value || !lngInput.value) {
            alert('Silakan pilih lokasi di peta.');
            e.preventDefault();
        }
    });
</script>
@endsection
