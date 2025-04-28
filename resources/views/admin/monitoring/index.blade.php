@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Monitoring Perhitungan Pengguna</h2>
    <div class="mb-3 d-flex justify-content-end gap-2">
        <a href="{{ route('admin.monitoring.export.pdf') }}" class="btn btn-danger btn-sm">
            🖨️ Export PDF
        </a>
        <a href="{{ route('admin.monitoring.export.excel') }}" class="btn btn-success btn-sm">
            📥 Export Excel
        </a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Pengguna</th>
                <th>Lokasi</th>
                <th>Bobot Kriteria</th>
                <th>Ranking</th>
                <th>Waktu</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $log)
                <tr>
                    <td>{{ $log->nama_pengguna }}</td>
                    <td>{{ $log->lokasi }}</td>
                    <td>
                        @foreach($log->bobot_kriteria as $k => $v)
                            <div>{{ ucfirst($k) }}: {{ $v }}</div>
                        @endforeach
                    </td>
                    <td>
                        @foreach($log->hasil_perhitungan as $index => $hasil)
                            <div>#{{ $index + 1 }} - {{ $hasil['sekolah'] }} ({{ $hasil['skor'] }})</div>
                        @endforeach
                    </td>
                    <td>{{ $log->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
