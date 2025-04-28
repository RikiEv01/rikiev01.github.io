<?php

use Illuminate\Database\Seeder;
use App\Models\Sekolah;

class SekolahSeeder extends Seeder
{
    public function run()
    {
        Sekolah::insert([
            [
                'nama' => 'SMA IT Nurul Muhajirin',
                'akreditasi' => 'Belum Terakreditasi',
                'ekskul' => 2,
                'latitude' => -8.650123,
                'longitude' => 116.324567,
                'spp' => 800000,
                'fasilitas' => 'Cukup Lengkap',
            ],
            [
                'nama' => 'MAS Qur’an Centre',
                'akreditasi' => 'C',
                'ekskul' => 4,
                'latitude' => -8.652300,
                'longitude' => 116.330400,
                'spp' => 1700000,
                'fasilitas' => 'Tidak Lengkap',
            ],
            [
                'nama' => 'MAS Islam',
                'akreditasi' => 'C',
                'ekskul' => 4,
                'latitude' => -8.652300,
                'longitude' => 116.330400,
                'spp' => 1700000,
                'fasilitas' => 'Tidak Lengkap',
            ],
            [
                'nama' => 'MAS Qur’an Centre',
                'akreditasi' => 'C',
                'ekskul' => 4,
                'latitude' => -8.652300,
                'longitude' => 116.330400,
                'spp' => 1700000,
                'fasilitas' => 'Tidak Lengkap',
            ],
            [
                'nama' => 'MAS Qur’an Centre',
                'akreditasi' => 'C',
                'ekskul' => 4,
                'latitude' => -8.652300,
                'longitude' => 116.330400,
                'spp' => 1700000,
                'fasilitas' => 'Tidak Lengkap',
            ],
            // tambahkan sekolah lainnya...
        ]);
    }
}
