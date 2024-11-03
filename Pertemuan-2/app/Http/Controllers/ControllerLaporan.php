<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerLaporan extends Controller
{
    public function TampilLaporan()
    {
        // Data contoh - ganti dengan data dari database
        $data = [
            'total_produk' => 310,
            'pengguna_terdaftar' => 350,

            // Data untuk grafik
            'total_bulanan_grafik' => [80, 120, 120, 190, 150, 250, 280, 400, 380, 450, 300, 310],
            'terdaftar_bulanan_grafik' => [100, 150, 180, 300, 200, 500, 550, 470, 380, 440, 480, 350],
            'total_tahunan_grafik' => [50, 100, 200, 250, 400, 300, 500, 800, 400, 500, 700, 250, 300],
            'terdaftar_tahunan_grafik' => [200, 400, 300, 600, 500, 100, 800, 450, 300, 700, 250, 300, 400]
        ];

        return view('laporan', $data);
    }
}
