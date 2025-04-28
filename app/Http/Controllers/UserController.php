<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sekolah;
use App\Models\UserCalculation;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function hitung(Request $request)
    {
        $request->validate([
            'nama_pengguna'    => 'required|string|max:255',
            'lokasi'           => 'required|string',
            'bobot_akreditasi' => 'required|integer|min:1|max:10',
            'bobot_ekskul'     => 'required|integer|min:1|max:10',
            'bobot_jarak'      => 'required|integer|min:1|max:10',
            'bobot_spp'        => 'required|integer|min:1|max:10',
            'bobot_fasilitas'  => 'required|integer|min:1|max:10',
        ]);

        [$latUser, $lngUser] = explode(',', $request->lokasi);
        $sekolahs = Sekolah::all();

        // Normalisasi bobot
        $totalBobot = $request->bobot_akreditasi + $request->bobot_ekskul + $request->bobot_jarak + $request->bobot_spp + $request->bobot_fasilitas;
        $bobotNormalized = [
            'akreditasi' => $request->bobot_akreditasi / $totalBobot,
            'ekskul'     => $request->bobot_ekskul / $totalBobot,
            'jarak'      => $request->bobot_jarak / $totalBobot,
            'spp'        => $request->bobot_spp / $totalBobot,
            'fasilitas'  => $request->bobot_fasilitas / $totalBobot,
        ];

        $hasil = [];
        $max = ['akreditasi' => 4, 'ekskul' => 4, 'jarak' => 4, 'spp' => 4, 'fasilitas' => 4];

        foreach ($sekolahs as $sekolah) {
            $jarak = $this->haversine($latUser, $lngUser, $sekolah->latitude, $sekolah->longitude);

            $nilaiAkreditasi = $this->konversiAkreditasi($sekolah->akreditasi);
            $nilaiEkskul     = $this->konversiEkskul($sekolah->ekskul);
            $nilaiJarak      = $this->konversiJarak($jarak);
            $nilaiSpp        = $this->konversiSpp($sekolah->spp);
            $nilaiFasilitas  = $this->konversiFasilitas($sekolah->fasilitas);

            $r = [
                'akreditasi' => $nilaiAkreditasi / $max['akreditasi'],
                'ekskul'     => $nilaiEkskul / $max['ekskul'],
                'jarak'      => $nilaiJarak / $max['jarak'],
                'spp'        => $nilaiSpp / $max['spp'],
                'fasilitas'  => $nilaiFasilitas / $max['fasilitas'],
            ];

            $V = (
                $bobotNormalized['akreditasi'] * $r['akreditasi'] +
                $bobotNormalized['ekskul']     * $r['ekskul'] +
                $bobotNormalized['jarak']      * $r['jarak'] +
                $bobotNormalized['spp']        * $r['spp'] +
                $bobotNormalized['fasilitas']  * $r['fasilitas']
            );

            $hasil[] = [
                'sekolah' => $sekolah->nama,
                'skor'    => round($V, 3),
                'jarak'   => round($jarak, 2) . ' km',
            ];
        }

        usort($hasil, fn($a, $b) => $b['skor'] <=> $a['skor']);

        UserCalculation::create([
            'nama_pengguna' => $request->nama_pengguna,
            'lokasi' => $request->lokasi,
            'bobot_kriteria' => [
                'akreditasi' => $request->bobot_akreditasi,
                'ekskul' => $request->bobot_ekskul,
                'jarak' => $request->bobot_jarak,
                'spp' => $request->bobot_spp,
                'fasilitas' => $request->bobot_fasilitas,
            ],
            'hasil_perhitungan' => $hasil
        ]);

        return view('user.hasil', compact('hasil'));
    }

    private function haversine($lat1, $lon1, $lat2, $lon2)
    {
        $R = 6371;
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);
        $a = sin($dLat/2) * sin($dLat/2) +
             cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
             sin($dLon/2) * sin($dLon/2);
        $c = 2 * atan2(sqrt($a), sqrt(1-$a));
        return $R * $c;
    }

    private function konversiAkreditasi($val)
    {
        return match (strtoupper($val)) {
            'A' => 4,
            'B' => 3,
            'C' => 2,
            default => 1,
        };
    }

    private function konversiEkskul($jumlah)
    {
        return match (true) {
            $jumlah >= 9 => 4,
            $jumlah >= 6 => 3,
            $jumlah >= 3 => 2,
            default => 1,
        };
    }

    private function konversiJarak($jarak)
    {
        return match (true) {
            $jarak <= 1 => 4,
            $jarak <= 3 => 3,
            $jarak <= 6 => 2,
            default => 1,
        };
    }

    private function konversiSpp($spp)
    {
        return match (true) {
            $spp <= 1000000 => 4,
            $spp <= 2000000 => 3,
            $spp <= 3000000 => 2,
            default => 1,
        };
    }

    private function konversiFasilitas($val)
    {
        return match (strtolower($val)) {
            'sangat lengkap' => 4,
            'lengkap' => 3,
            'cukup lengkap' => 2,
            default => 1,
        };
    }
}
