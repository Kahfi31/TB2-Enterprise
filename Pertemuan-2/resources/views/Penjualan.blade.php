<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Penjualan</title>
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Dashboard Penjualan</h2>
        <ul>
            <li><a href="{{ url('contoh') }}">Home</a></li>
            <li><a href="{{ url('produk') }}">Produk</a></li>
            <li><a href="{{ url('penjualan') }}">Penjualan</a></li>
            <li><a href="{{ url('laporan') }}">Laporan</a></li>
            <li><a href="#">Pengaturan</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content" style="margin-left: 220px; padding: 20px;">
        <h3>Selamat Datang di Dashboard Penjualan</h3>

        <!-- Dashboard Cards -->
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <a href="{{ url('contoh') }}" style="text-decoration: none; color: inherit;">
                        <div class="card-body">
                            <h5 class="card-title">Penjualan Hari Ini</h5>
                            <p class="card-text" style="font-size: 24px; color: green;">{{ $penjualan_hari_ini }}</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Penjualan Mingguan</h5>
                        <p class="card-text" style="font-size: 24px; color: blue;">{{ $penjualan_mingguan }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Penjualan Bulanan</h5>
                        <p class="card-text" style="font-size: 24px; color: purple;">{{ $penjualan_bulanan }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Pendapatan</h5>
                        <p class="card-text" style="font-size: 24px; color: green;">Rp {{ number_format($total_pendapatan, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grafik Penjualan Bulanan -->
        <div class="mt-4">
            <h4>Grafik Penjualan Bulanan</h4>
            <canvas id="monthlySalesChart" width="400" height="200"></canvas>
        </div>

        <!-- Grafik Penjualan Mingguan -->
        <div class="mt-4">
            <h4>Grafik Penjualan Mingguan</h4>
            <canvas id="weeklySalesChart" width="400" height="200"></canvas>
        </div>

        <!-- Grafik Penjualan Tahunan -->
        <div class="mt-4">
            <h4>Grafik Penjualan Tahunan</h4>
            <canvas id="yearlySalesChart" width="400" height="200"></canvas>
        </div>
    </div>

    <!-- Script untuk Chart.js -->
    <script>
        // Data dari controller untuk grafik penjualan bulanan
        const monthlySalesData = {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "Penjualan Bulanan",
                data: @json($penjualan_bulanan_grafik),
                backgroundColor: "rgba(75, 192, 192, 0.2)",
                borderColor: "rgba(75, 192, 192, 1)",
                borderWidth: 1
            }]
        };

        // Data untuk grafik penjualan mingguan
        const weeklySalesData = {
            labels: ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu"],
            datasets: [{
                label: "Penjualan Mingguan",
                data: @json($penjualan_mingguan_grafik),
                backgroundColor: "rgba(54, 162, 235, 0.2)",
                borderColor: "rgba(54, 162, 235, 1)",
                borderWidth: 1
            }]
        };

        // Data untuk grafik penjualan tahunan
        const yearlySalesData = {
            labels: ["2011", "2012", "2013", "2014", "2015", "2016", "2017", "2018", "2019", "2020", "2021", "2022", "2023"],
            datasets: [{
                label: "Penjualan Tahunan",
                data: @json($penjualan_tahunan_grafik),
                backgroundColor: "rgba(153, 102, 255, 0.2)",
                borderColor: "rgba(153, 102, 255, 1)",
                borderWidth: 1
            }]
        };

        // Konfigurasi untuk masing-masing chart
        const configMonthly = {
            type: "line",
            data: monthlySalesData,
            options: {
                scales: {
                    y: { beginAtZero: true }
                }
            }
        };

        const configWeekly = {
            type: "line",
            data: weeklySalesData,
            options: {
                scales: {
                    y: { beginAtZero: true }
                }
            }
        };

        const configYearly = {
            type: "line",
            data: yearlySalesData,
            options: {
                scales: {
                    y: { beginAtZero: true }
                }
            }
        };

        // Render setiap chart di canvas masing-masing
        new Chart(document.getElementById("monthlySalesChart"), configMonthly);
        new Chart(document.getElementById("weeklySalesChart"), configWeekly);
        new Chart(document.getElementById("yearlySalesChart"), configYearly);
    </script>
</body>
</html>
