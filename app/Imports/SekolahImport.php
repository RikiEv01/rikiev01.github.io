<?php

namespace App\Imports;

use App\Models\Sekolah;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SekolahImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            if (
                !$row['nama'] || !$row['akreditasi'] || !$row['ekskul'] ||
                !$row['latitude'] || !$row['longitude'] || !$row['spp'] || !$row['fasilitas']
            ) {
                throw new \Exception("Data tidak lengkap pada salah satu baris.");
            }

            Sekolah::create([
                'nama' => $row['nama'],
                'akreditasi' => $row['akreditasi'],
                'ekskul' => $row['ekskul'],
                'latitude' => $row['latitude'],
                'longitude' => $row['longitude'],
                'spp' => $row['spp'],
                'fasilitas' => $row['fasilitas'],
            ]);
        }
    }
}
