@extends('layouts.app')

@section('content')
<div class="container">
    <h2>📤 Import Data Sekolah dari Excel</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <p>Silakan download template terlebih dahulu, lalu isi dan upload kembali.</p>

    <a href="{{ asset('template/sekolah_template.xlsx') }}" class="btn btn-outline-secondary mb-3">
        📥 Download Template Excel
    </a>

    <form action="{{ route('admin.sekolahs.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="file" class="form-label">Pilih File Excel (.xlsx / .csv)</label>
            <input type="file" name="file" class="form-control" required accept=".csv,.xlsx">
        </div>
        <button type="submit" class="btn btn-primary">Upload & Import</button>
        <a href="{{ route('admin.sekolahs.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
