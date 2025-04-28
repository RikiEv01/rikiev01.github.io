@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">📊 Statistik Sekolah Paling Direkomendasikan (Ranking #1)</h3>

    @if ($statistik->isEmpty())
        <div class="alert alert-warning">Belum ada data perhitungan pengguna.</div>
    @else
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Ranking</th>
                    <th>Nama Sekolah</th>
                    <th>Jumlah Muncul di Peringkat 1</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($statistik as $nama => $jumlah)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $nama }}</td>
                        <td>{{ $jumlah }} kali</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
