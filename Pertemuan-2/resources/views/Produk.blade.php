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
            <li><a href="{{ url (Auth::user()->role.'/contoh') }}">Home</a></li>
            <li><a href="{{ url (Auth::user()->role.'/produk') }}">Produk</a></li>
            <li><a href="#">Penjualan</a></li>
            <li><a href="{{ url (Auth::user()->role.'/laporan') }}">Laporan</a></li>
            <li><a href="#">Pengaturan</a></li>
            <li>
                <form action="{{ url('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class = "text-decoration-none-bg-transparent border-0 text-white" style="font-size: 18px;">Logout</button>
                </form>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <header style="display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h1>Daftar Produk</h1>
                <p>Temukan produk terbaik untuk kebutuhan Anda</p>
            </div>
            <div>
                <button class="card-button">
                    <a class="text-decoration-none text-white" href="{{ url('/produk/add') }}">Add Product</a>
                </button>
            </div>
        </header>

        <!-- Product Grid -->
        <div class="product-grid">
            @foreach ($produk as $item)
                <div class="product-card">
                    <img src="{{ url ('storage/images/' . $item->image) }}" alt="{{ $item->nama_produk }}">
                    <h3>{{ $item->nama_produk }}</h3>
                    <p class="price">{{ $item->harga }}</p>
                    <p class="description">{{ $item->deskripsi }}</p>
                    <div style="display: flex; justify-content: center;">
                        <a class="btn btn-success mr-2" href="{{ url('produk/edit/' . $item->kode_produk) }}">Edit</a>
                        <form action="{{ url('produk/delete/' . $item->kode_produk) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Footer -->
        <footer>
            <p>&copy; 2024 Aplikasi Penjualan. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
