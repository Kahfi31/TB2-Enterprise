<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\produk_penjualan;
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;
use Carbon\Carbon;

class ControllerKahfi extends Controller
{
    public function TampilContoh()
    {
        // Apakah user adalah admin
        $isAdmin = Auth::user()->role === 'admin';

        // Ambil produk dari database dan kelompokkan berdasarkan tanggal
        $produkPerHariQuery = produk_penjualan::selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->groupBy('date')
            ->orderBy('date', 'asc');

        // Filter by user_id jika user bukan admin
        if (!$isAdmin) {
            $produkPerHariQuery->where('user_id', Auth::id());
        }

        $produkPerHari = $produkPerHariQuery->get();

        // Memisahkan data untuk grafik
        $dates = [];
        $totals = [];

        foreach ($produkPerHari as $item) {
            $dates[] = Carbon::parse($item->date)->format('Y-m-d'); // Format tanggal
            $totals[] = $item->total;
        }

        // Membuat grafik menggunakan data yang diambil
        $chart = LarapexChart::barChart()
            ->setTitle('Produk Ditambahkan Per Hari')
            ->setSubtitle('Data Penambahan Produk Harian')
            ->addData('Jumlah Produk', $totals)
            ->setXAxis($dates);

        // Kueri total produk
        $totalProductQuery = produk_penjualan::query();

        if (!$isAdmin) {
            $totalProductQuery->where('user_id', Auth::id());
        }

        $totalProducts = $totalProductQuery->count();

        // Data tambahan untuk view
        $data = [
            'totalProducts' => $totalProducts, // Total produk
            'salesToday' => 130, // Contoh data lainnya
            'totalRevenue' => 'Rp 75,000,000', // Contoh
            'registeredUsers' => 350, // Contoh
            'chart' => $chart, // Pass chart ke view
        ];

        return view('home', $data);
    }
}
