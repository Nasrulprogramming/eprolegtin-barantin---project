<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <title>{{ __('E-Prolegtin - Badan Karantina Indonesia') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        .top-header {
            background-color: #bf996f;
            color: white;
        }

        .main-nav {
            background-color: #f8f9fa;
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
            color: #000;
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
            padding: 30px 0;
        }

        .stat-box {
            text-align: center;
        }

        .stat-box h2 {
            margin: 0;
            font-size: 2rem;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

    {{-- Header Atas --}}
    <header class="top-header d-flex justify-content-between align-items-center px-3 py-2">
        <div class="logo d-flex align-items-center">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                <img src="{{ asset('images/llogo.png') }}" alt="Logo" width="150" class="me-2">

            </a>

        </div>

        {{-- Dropdown Bahasa --}}
        <div class="language-switch">

        </div>
    </header>

    {{-- Navbar --}}
    <nav class="main-nav">
        <ul class="nav justify-content-center">
            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">{{ __('Beranda') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="#">{{ __('Tentang Kami') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('form.create') }}">{{ __('E-Prolegtin') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="#">{{ __('JDIH') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="#">{{ __('Login') }}</a></li>
        </ul>
    </nav>
    {{-- Main Content --}}
    <main class="container my-5">
        @yield('content')
    </main>

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