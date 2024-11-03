<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Penjualan</title>
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Dashboard Penjualan</h2>
        <ul>
            <li><a href="{{ url ('contoh') }}">Home</a></li>
            <li><a href="{{ url ('produk') }}">Produk</a></li>
            <li><a href="{{ url ('penjualan') }}">Penjualan</a></li>
            <li><a href="{{ url ('laporan') }}">Laporan</a></li>
            <li><a href="#">Pengaturan</a></li>
        </ul>
    </div>
</body>
</html>

<!-- Main Content -->
    <div class="main-content" style="margin-left: 250px; padding: 20px;">
        <header class="mb-4">
            <h1>Selamat Datang di Dashboard Penjualan</h1>
        </header>

        <!-- Stats Cards -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card text-center p-3">
                    <a href="/laporan" style="text-decoration: none; color: inherit;">
                    <h3>Total Produk</h3>
                    <p id="total-products">{{$totalProducts}}</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center p-3">
                    <a href="/penjualan" style="text-decoration: none; color: inherit;">
                        <h3>Penjualan Hari Ini</h3>
                        <p id="sales-today">{{$salesToday}}</p>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center p-3">
                    <a href="/penjualan" style="text-decoration: none; color: inherit;">
                    <h3>Total Pendapatan</h3>
                    <p id="total-revenue">Rp 50,000,000</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center p-3">
                    <a href="/laporan" style="text-decoration: none; color: inherit;">
                    <h3>Pengguna Terdaftar</h3>
                    <p id="registered-users">350</p>
                </div>
            </div>
        </div>

        <!-- Alert -->
        <div class="alert alert-primary" role="alert">
            A simple primary alert—check it out!
        </div>

        <!-- Sales Chart -->
        <div class="chart-container mt-5">
            <h2>Grafik Penjualan Bulanan</h2>
            <canvas id="salesChart"></canvas>
        </div>
</body>
</html>
