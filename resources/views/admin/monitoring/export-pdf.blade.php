<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Riwayat Perhitungan</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #000; padding: 6px; font-size: 12px; }
    </style>
</head>
<body>
    <h3>Riwayat Perhitungan Pengguna</h3>
    <table>
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
</body>
</html>
