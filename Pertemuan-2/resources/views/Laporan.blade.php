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
                            <h5 class="card-title">Total Produk</h5>
                            <p class="card-text" style="font-size: 24px; color: green;">{{ $total_produk }}</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pengguna Terdaftar</h5>
                        <p class="card-text" style="font-size: 24px; color: green;">{{ $pengguna_terdaftar }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <h4>Grafik Total Produk Bulanan</h4>
            <canvas id="monthlytotalChart" width="400" height="200"></canvas>
        </div>

        <div class="mt-4">
            <h4>Grafik Pengguna Terdaftar Bulanan</h4>
            <canvas id="monthlyterdaftarChart" width="400" height="200"></canvas>
        </div>

        <div class="mt-4">
            <h4>Grafik Total Produk Tahunan</h4>
            <canvas id="yearlytotalChart" width="400" height="200"></canvas>
        </div>

        <div class="mt-4">
            <h4>Grafik Pengguna Terdaftar Tahunan</h4>
            <canvas id="yearlyterdaftarChart" width="400" height="200"></canvas>
        </div>

        <!-- Script untuk Chart.js -->
        <script>
            const monthlyterdaftarData = {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Pengguna Terdaftar Bulanan",
                    data: @json($terdaftar_bulanan_grafik),
                    backgroundColor: "rgba(75, 192, 192, 0.2)",
                    borderColor: "rgba(75, 192, 192, 1)",
                    borderWidth: 1
                }]
            };

            const monthlytotalData = {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Total Produk Bulanan",
                    data: @json($total_bulanan_grafik),
                    backgroundColor: "rgba(54, 162, 235, 0.2)",
                    borderColor: "rgba(54, 162, 235, 1)",
                    borderWidth: 1
                }]
            };

            const yearlyterdaftarData = {
                labels: ["2011", "2012", "2013", "2014", "2015", "2016", "2017", "2018", "2019", "2020", "2021", "2022", "2023"],
                datasets: [{
                    label: "Pengguna Terdaftar Tahunan",
                    data: @json($terdaftar_tahunan_grafik),
                    backgroundColor: "rgba(153, 102, 255, 0.2)",
                    borderColor: "rgba(153, 102, 255, 1)",
                    borderWidth: 1
                }]
            };

            const yearlytotalData = {
                labels: ["2011", "2012", "2013", "2014", "2015", "2016", "2017", "2018", "2019", "2020", "2021", "2022", "2023"],
                datasets: [{
                    label: "Total Produk Tahunan",
                    data: @json($total_tahunan_grafik),
                    backgroundColor: "rgba(255, 99, 132, 0.2)",
                    borderColor: "rgba(255, 99, 132, 1)",
                    borderWidth: 1
                }]
            };

            // Konfigurasi untuk masing-masing chart
            const configMonthly1 = {
                type: "line",
                data: monthlyterdaftarData,
                options: {
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            };

            const configMonthly2 = {
                type: "line",
                data: monthlytotalData,
                options: {
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            };

            const configYearly1 = {
                type: "line",
                data: yearlyterdaftarData,
                options: {
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            };

            const configYearly2 = {
                type: "line",
                data: yearlytotalData,
                options: {
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            };

            // Render setiap chart di canvas masing-masing
            new Chart(document.getElementById("monthlyterdaftarChart"), configMonthly1);
            new Chart(document.getElementById("monthlytotalChart"), configMonthly2);
            new Chart(document.getElementById("yearlyterdaftarChart"), configYearly1);
            new Chart(document.getElementById("yearlytotalChart"), configYearly2);
        </script>
    </body>
</html>
