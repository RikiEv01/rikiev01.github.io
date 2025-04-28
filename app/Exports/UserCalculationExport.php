<?php

namespace App\Exports;

use App\Models\UserCalculation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserCalculationExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return UserCalculation::all()->map(function ($item) {
            return [
                'nama_pengguna' => $item->nama_pengguna,
                'lokasi' => $item->lokasi,
                'tanggal' => $item->created_at->format('Y-m-d H:i'),
                'top1' => $item->hasil_perhitungan[0]['sekolah'] ?? '',
                'skor1' => $item->hasil_perhitungan[0]['skor'] ?? '',
                'top2' => $item->hasil_perhitungan[1]['sekolah'] ?? '',
                'skor2' => $item->hasil_perhitungan[1]['skor'] ?? '',
                'top3' => $item->hasil_perhitungan[2]['sekolah'] ?? '',
                'skor3' => $item->hasil_perhitungan[2]['skor'] ?? '',
            ];
        });
    }

    public function headings(): array
    {
        return ['Nama Pengguna', 'Lokasi', 'Tanggal', 'Top 1', 'Skor 1', 'Top 2', 'Skor 2', 'Top 3', 'Skor 3'];
    }
}
