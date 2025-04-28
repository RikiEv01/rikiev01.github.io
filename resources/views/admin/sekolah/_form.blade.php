<div class="mb-3">
    <label for="nama" class="form-label">Nama Sekolah</label>
    <input type="text" name="nama" id="nama" class="form-control"
           value="{{ old('nama', $sekolah->nama ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="akreditasi" class="form-label">Akreditasi</label>
    <select name="akreditasi" id="akreditasi" class="form-select" required>
        @foreach (['A', 'B', 'C', 'Belum Terakreditasi'] as $ak)
            <option value="{{ $ak }}" @selected(old('akreditasi', $sekolah->akreditasi ?? '') === $ak)>
                {{ $ak }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="ekskul" class="form-label">Jumlah Ekskul</label>
    <input type="number" name="ekskul" id="ekskul" class="form-control"
           value="{{ old('ekskul', $sekolah->ekskul ?? '') }}" required min="0">
</div>

<div class="mb-3">
    <label for="latitude" class="form-label">Latitude</label>
    <input type="text" name="latitude" id="latitude" class="form-control"
           value="{{ old('latitude', $sekolah->latitude ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="longitude" class="form-label">Longitude</label>
    <input type="text" name="longitude" id="longitude" class="form-control"
           value="{{ old('longitude', $sekolah->longitude ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="spp" class="form-label">Biaya SPP (Rp)</label>
    <input type="number" name="spp" id="spp" class="form-control"
           value="{{ old('spp', $sekolah->spp ?? '') }}" required min="0">
</div>

<div class="mb-3">
    <label for="fasilitas" class="form-label">Fasilitas</label>
    <select name="fasilitas" id="fasilitas" class="form-select" required>
        @foreach (['Sangat Lengkap', 'Lengkap', 'Cukup Lengkap', 'Tidak Lengkap'] as $fas)
            <option value="{{ $fas }}" @selected(old('fasilitas', $sekolah->fasilitas ?? '') === $fas)>
                {{ $fas }}
            </option>
        @endforeach
    </select>
</div>
