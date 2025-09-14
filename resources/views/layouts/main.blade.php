<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>E-Prolegtin - Badan Karantina Indonesia</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }

        .navbar-custom {
            background-color: #0d3b3d;
        }

        footer {
            background: #0d3b3d;
            color: white;
            padding: 20px 0;
            margin-top: auto;
        }
    </style>
</head>

<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                <img src="{{ asset('images/llogo.png') }}" alt="Logo" width="120" class="me-2">
                E-PROLEGTIN
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">{{ __('Beranda') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">{{ __('Tentang Kami') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('form.create') }}">{{ __('E-Prolegtin') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">{{ __('JDIH') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">{{ __('Login') }}</a></li>

                </ul>
            </div>
        </div>
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