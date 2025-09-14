<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <title>{{ __('E-Prolegtin - Badan Karantina Indonesia') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: column;
            overflow: hidden;
            /* hilangin scroll */
        }

        .top-header {
            background-color: #bf996f;
            color: white;
            flex: 0 0 auto;
            /* tinggi sesuai isi */
        }

        .main-nav {
            background-color: #f8f9fa;
            border-top: 2px solid #0d3b3d;
            border-bottom: 2px solid #0d3b3d;
            flex: 0 0 auto;
        }

        .main-nav .nav-link {
            font-weight: 600;
            color: #000;
            padding: 10px 20px;
        }

        .main-nav .nav-link:hover {
            background-color: #ffbe80;
            color: #000;
        }

        .content-wrapper {
            flex: 1 0 auto;
            /* isi tengah fleksibel */
            display: flex;
            flex-direction: column;
        }

        .hero {
            background: url("/images/home4.jpg") center/cover no-repeat;
            color: white;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 20px;
        }

        .welcome-text {
            font-size: 1.2rem;
            font-weight: 500;
            background: #bf996f;
            padding: 5px 15px;
            border-radius: 4px;
            margin-bottom: 10px;
            color: #0d3b3d;
        }

        .title-banner {
            font-size: 1.8rem;
            font-weight: bold;
            background: #0d3b3d;
            color: #bf996f;
            display: inline-block;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .instansi-text {
            font-size: 1.2rem;
            font-weight: 500;
            background: #bf996f;
            color: #0d3b3d;
            padding: 5px 15px;
            border-radius: 4px;
        }

        .stats {
            background: #bf996f;
            color: #0d3b3d;
            padding: 10px 0;
            flex: 0 0 25%;
            /* kasih 25% tinggi layar */
            display: flex;
            align-items: center;
        }

        .stat-box {
            text-align: center;
            width: 100%;
        }

        .stat-box h2 {
            margin: 0;
            font-size: 2rem;
        }

        footer {
            flex: 0 0 auto;
            /* footer fix di bawah */
        }

        social-icons a {
            text-decoration: none;
        }

        social-icons a:hover {
            color: #0d6efd;
        }

        .social-icons a {
            transition: color 0.3s ease;
        }

        .social-icons a.facebook:hover {
            color: #1877f2;
            /* Facebook biru */
        }

        .social-icons a.x-twitter:hover {
            color: #000000;
            /* X hitam */
        }

        .social-icons a.instagram:hover {
            color: #e4405f;
            /* Instagram pink */
        }

        .social-icons a.youtube:hover {
            color: #ff0000;
            /* YouTube merah */
        }

        .social-icons a.tiktok:hover {
            color: #25f4ee;
            /* TikTok cyan */
        }
    </style>
</head>

<body>

    {{-- Header Atas --}}
    <header class="top-header d-flex justify-content-between align-items-center px-3 py-2">
        <div class="logo d-flex align-items-center">
            <img src="{{ asset('images/llogo.png') }}" alt="Logo" height="90" width="200" class="me-2">
            <img src="{{ asset('images/berakhlak.png') }}" alt="Logo" height="70" class="me-2">
            <img src="{{ asset('images/pastimudahijo (1).png') }}" alt="Logo" height="50" width="200" class="me-2">
        </div>
        <div class="language-switch">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" width="180">
        </div>
    </header>



    {{-- Navbar --}}
    <nav class="main-nav">
        <ul class="nav justify-content-center">
            <li class="nav-item"><a class="nav-link" href="#">{{ __('Beranda') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="https://karantinaindonesia.go.id/" target="_blank">{{ __('Tentang Kami') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('form.create') }}">{{ __('E-Prolegtin') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="https://jdih.karantinaindonesia.go.id/" target="_blank">{{ __('JDIH') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="https://ppid.karantinaindonesia.go.id/" target="_blank">{{ __('PPID') }}</a></li>
        </ul>
    </nav>

    {{-- Konten Tengah --}}
    <div class="content-wrapper">
        {{-- Hero Section --}}
        <section class="hero">
            <p class="welcome-text mb-2">{{ __('Selamat Datang di') }}</p>
            <h1 class="title-banner">{{ __('Sistem Program Legislasi Karantina (E-Prolegtin)') }}</h1>
            <h2 class="instansi-text mt-2">{{ __('Badan Karantina Indonesia') }}</h2>

            <div class="search-bar mt-4">
                <form class="input-group" action="{{ route('search') }}" method="GET">
                    <select name="category" class="form-select form-select-lg" style="max-width: 200px;">
                        <option value="all">{{ __('Advanced Search') }}</option>
                        <option value="peraturan">{{ __('Usulan Regulasi') }}</option>
                        <option value="monografi">{{ __('Regulasi Proses') }}</option>
                        <option value="artikel">{{ __('Regulasi di Undangkan') }}</option>
                    </select>
                    <input type="text" name="q" class="form-control form-control-lg" placeholder="{{ __('Masukkan kata kunci') }}" value="{{ request('q') }}">
                    <button type="submit" class="btn btn-dark btn-lg">{{ __('Cari') }}</button>
                </form>
            </div>
        </section>

        {{-- Statistik --}}
        <section class="stats">
            <div class="container">
                <div class="row text-center w-100">
                    <div class="col-md-4 mb-3">
                        <div class="stat-box">
                            <h2>{{ $usulan }}</h2>
                            <p>{{ __('Usulan Regulasi') }}</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="stat-box">
                            <h2>{{ $proses }}</h2>
                            <p>{{ __('Regulasi Proses') }}</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="stat-box">
                            <h2>{{ $diundangkan }}</h2>
                            <p>{{ __('Regulasi di Undangkan') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- Footer --}}
    <footer class="bg-dark text-white text-center py-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 d-flex justify-content-center justify-content-md-start">
                    <div class="d-flex align-items-center gap-3">
                        <!-- Icon sosmed -->
                        <a href="https://www.facebook.com/badankarantinaindonesia/" target="_blank" class="text-white fs-4"> <i class="fab fa-facebook"></i></a>
                        <a href="https://x.com/BarantinRI" target="_blank" class="text-white fs-4"><i class="fa-brands fa-x-twitter"></i></a>
                        <a href="https://www.instagram.com/barantin_ri/?igsh=ZTduY295empwNndl#" target="_blank" class="text-white fs-4"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.youtube.com/@badankarantinaindonesia" target="_blank" class="text-white fs-4"><i class="fab fa-youtube"></i></a>
                        <a href="https://www.tiktok.com/@barantinri?_t=ZS-8zim0Qcupj0&_r=1" target="_blank" class="text-white fs-4"><i class="fab fa-tiktok"></i></a>

                        <!-- Teks sejajar lurus tengah sama icon -->
                        <span class="ms-3 d-flex align-items-center">Badan Karantina Indonesia</span>
                        <!-- <span class="fw ms-1">Badan Karantina Indonesia</span> -->
                    </div>


                    <div class="col-md-4 text-center">
                        <h5 class="mb-1">E-Prolegtin</h5>
                        <small>{{ __('Badan Karantina Indonesia') }}</small>
                    </div>
                    <div class="col-md-4 text-center text-md-end">
                        <small>&copy; {{ date('Y') }} {{ __('Badan Karantina Indonesia') }}</small><br>
                        <small>Biro Hukum dan Hubungan Masyarakat</small>
                    </div>
                </div>
            </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>