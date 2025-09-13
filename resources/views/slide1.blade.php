<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>E-Prolegtin - Badan Karantina Indonesia</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        /* Header atas (logo + bahasa) */
        .top-header {
            background-color: #0d3b3d;
            color: white;
        }

        /* Navbar utama */
        .main-nav {
            background-color: #f8f9fa;
            /* abu-abu muda */
            border-top: 2px solid #0d3b3d;
            border-bottom: 2px solid #0d3b3d;
        }

        .main-nav .nav-link {
            font-weight: 600;
            color: #000;
            padding: 10px 20px;
        }

        .main-nav .nav-link:hover {
            background-color: #ffbe80;
            /* warna krem/oranye pas hover */
            color: #000;
        }

        .top-bar {
            background-color: #0d3b3d;
            padding: 10px 20px;
        }

        .top-bar img {
            height: 60px;
        }

        .navbar-custom {
            background-color: #f8f9fa;
            border-top: 2px solid #0d3b3d;
            border-bottom: 2px solid #0d3b3d;
        }

        .hero {
            background: url('{{ asset(' images/ship-bg.jpg') }}') center/cover no-repeat;
            color: white;
            padding: 100px 20px;
            text-align: center;
        }

        .hero .title-banner {
            font-size: 1.8rem;
            font-weight: bold;
            background: #ffbe80;
            color: #000;
            display: inline-block;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .stats {
            background: #0d3b3d;
            color: white;
            padding: 30px 0;
        }

        .stat-box {
            text-align: center;
        }

        .stat-box h2 {
            margin: 0;
            font-size: 2rem;
        }

        .hero {
            background: url('{{ asset(' images/ship-bg.jpg') }}') center/cover no-repeat;
            color: white;
            padding: 100px 20px;
            text-align: center;
        }

        .welcome-text {
            font-size: 1.2rem;
            font-weight: 500;
            background: rgba(0, 0, 0, 0.5);
            /* hitam transparan */
            display: inline-block;
            padding: 5px 15px;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .title-banner {
            font-size: 1.8rem;
            font-weight: bold;
            background: #ffbe80;
            color: #000;
            display: inline-block;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .instansi-text {
            font-size: 1.2rem;
            font-weight: 500;
            background: rgba(0, 0, 0, 0.5);
            /* hitam transparan */
            display: inline-block;
            padding: 5px 15px;
            border-radius: 4px;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">



    {{-- Navbar Menu --}}
    {{-- Header Atas --}}
    <header class="top-header d-flex justify-content-between align-items-center px-3 py-2">
        {{-- Logo --}}
        <div class="logo d-flex align-items-center">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" height="70" class="me-2">
            <span class="fw-bold text-white">E-PROLEGTIN</span>
        </div>

        {{-- Dropdown Bahasa --}}
        <div class="language-switch">
            <select class="form-select form-select-sm">
                <option>Bahasa</option>
                <option value="id">Indonesia</option>
                <option value="en">English</option>
            </select>
        </div>
    </header>

    {{-- Navbar Utama --}}
    <nav class="main-nav">
        <ul class="nav justify-content-center">
            <li class="nav-item"><a class="nav-link" href="#">Beranda</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Tentang Kami</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('form.create') }}">E-Prolegtin</a></li>
            <li class="nav-item"><a class="nav-link" href="#">JDIH</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Login</a></li>
        </ul>
    </nav>

    {{-- Hero Section --}}
    <section class="hero d-flex flex-column justify-content-center align-items-center text-center">

        {{-- Teks Selamat Datang --}}
        <p class="welcome-text mb-2">Selamat Datang di</p>

        {{-- Banner Judul --}}
        <h1 class="title-banner">Sistem Program Legislasi Karantina (E-Prolegtin)</h1>

        {{-- Nama Instansi --}}
        <h2 class="instansi-text mt-2">Badan Karantina Indonesia</h2>

        {{-- Search Bar --}}
        <div class="search-bar mt-4">
            <form class="input-group" action="{{ route('search') }}" method="GET">
                {{-- Dropdown Advanced Search --}}
                <select name="category" class="form-select form-select-lg" style="max-width: 200px;">
                    <option value="all">Advanced Search</option>
                    <option value="peraturan">Peraturan</option>
                    <option value="monografi">Monografi</option>
                    <option value="artikel">Artikel</option>
                    <option value="putusan">Putusan</option>
                </select>

                {{-- Input search --}}
                <input type="text" name="q" class="form-control form-control-lg" placeholder="Masukkan kata kunci" value="{{ request('q') }}">

                {{-- Tombol Cari --}}
                <button type="submit" class="btn btn-dark btn-lg">Cari</button>
            </form>
        </div>

    </section>



    {{-- Statistik --}}
    <section class="stats">
        <div class="container">
            <div class="row">
                <div class="col-md-3 stat-box">
                    <h2>66</h2>
                    <p>Peraturan</p>
                </div>
                <div class="col-md-3 stat-box">
                    <h2>0</h2>
                    <p>Monografi</p>
                </div>
                <div class="col-md-3 stat-box">
                    <h2>0</h2>
                    <p>Artikel</p>
                </div>
                <div class="col-md-3 stat-box">
                    <h2>1</h2>
                    <p>Putusan</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-dark text-white text-center py-4 mt-auto">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4 text-center text-md-start mb-3 mb-md-0">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" width="180">
                </div>
                <div class="col-md-4 text-center">
                    <h5 class="mb-1">E-Prolegtin</h5>
                    <small>Badan Karantina Indonesia</small>
                </div>
                <div class="col-md-4 text-center text-md-end">
                    <small>&copy; {{ date('Y') }} Badan Karantina Indonesia</small><br>
                    <small>Jl. Harsono RM No.3 Ragunan, Jakarta Selatan</small>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>