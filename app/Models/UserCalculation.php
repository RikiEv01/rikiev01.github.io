<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCalculation extends Model
{
    protected $fillable = [
        'nama_pengguna',
        'lokasi',
        'bobot_kriteria',
        'hasil_perhitungan',
    ];

    protected $casts = [
        'bobot_kriteria' => 'array',
        'hasil_perhitungan' => 'array',
    ];
}
