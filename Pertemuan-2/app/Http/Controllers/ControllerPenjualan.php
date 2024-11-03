<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ControllerPenjualan extends Controller
{
    public function TampilPenjualan()
    {
        // Data contoh - ganti dengan data dari database
        $data = [
            'penjualan_hari_ini' => 100,
            'penjualan_mingguan' => 700,
            'penjualan_bulanan' => 3000,
            'total_pendapatan' => 50000000,

            // Data untuk grafik
            'penjualan_bulanan_grafik' => [120, 150, 180, 200, 300, 250, 400, 350, 500, 550, 600, 650],
            'penjualan_mingguan_grafik' => [20, 30, 40, 50, 60, 70, 80],  // Data contoh untuk 7 hari
            'penjualan_tahunan_grafik' => [1000, 1500, 1200, 1700, 1600, 1800, 2000, 2200, 2400, 2600, 2800, 3000, 2500] // Data contoh untuk 12 bulan
        ];

        // Kirim data ke view dashboard
        return view('penjualan', $data);
    }
}
