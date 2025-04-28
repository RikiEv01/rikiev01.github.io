<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sekolah;
use App\Models\UserCalculation;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSekolah = Sekolah::count();
        $totalPerhitungan = UserCalculation::count();

        // Ambil top 1 terbanyak
        $top = UserCalculation::all()->map(function ($item) {
            return $item->hasil_perhitungan[0]['sekolah'] ?? null;
        })->filter()->countBy()->sortDesc()->take(1);

        $topSekolah = $top->keys()->first();
        $topJumlah = $top->values()->first();

        return view('admin.dashboard', compact('totalSekolah', 'totalPerhitungan', 'topSekolah', 'topJumlah'));
    }
}
