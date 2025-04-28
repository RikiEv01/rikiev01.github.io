<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserCalculation;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\UserCalculationExport;
use Maatwebsite\Excel\Facades\Excel;

class MonitoringController extends Controller
{
    public function index()
    {
        $data = UserCalculation::latest()->get();
        return view('admin.monitoring.index', compact('data'));
    }
    public function exportPdf()
    {
        $data = UserCalculation::latest()->get();
        $pdf = Pdf::loadView('admin.monitoring.export-pdf', compact('data'))
                ->setPaper('a4', 'landscape');
        return $pdf->download('riwayat_perhitungan.pdf');
    }
    public function exportExcel()
    {
        return Excel::download(new UserCalculationExport, 'riwayat_perhitungan.xlsx');
    }

    public function statistik()
{
    $semua = \App\Models\UserCalculation::all();

    $ranking1 = [];

    foreach ($semua as $calc) {
        if (!empty($calc->hasil_perhitungan) && isset($calc->hasil_perhitungan[0])) {
            $top = $calc->hasil_perhitungan[0]['sekolah'];
            if (!isset($ranking1[$top])) {
                $ranking1[$top] = 0;
            }
            $ranking1[$top]++;
        }
    }

    // Ubah ke koleksi dan urutkan dari yang terbanyak
    $statistik = collect($ranking1)->sortDesc();

    return view('admin.monitoring.statistik', compact('statistik'));
}

}
