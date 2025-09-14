<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Login Admin - E-Prolegtin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #0d3b3d, #1a5e63);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            background: #fff;
        }

        .login-header {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .login-header img {
            width: 70px;
            margin-bottom: 10px;
        }

        .btn-primary {
            background-color: #0d3b3d;
            border: none;
        }

        .btn-primary:hover {
            background-color: #124c4f;
        }

        .forgot-link {
            font-size: 0.9rem;
            text-decoration: none;
            color: #0d3b3d;
        }

        .forgot-link:hover {
            text-decoration: underline;
        }

        .alert {
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                <div class="card login-card p-4">
                    <div class="login-header">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo E-Prolegtin">
                        <h4 class="fw-bold text-dark">Admin E-Prolegtin</h4>
                        <p class="text-muted">Masuk ke dashboard admin</p>
                    </div>

                    {{-- ALERT SUCCESS --}}
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    {{-- ALERT ERROR --}}
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                    @endif


                    <form method="POST" action="{{ route('admin.login.submit') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">📧 Email</label>
                            <input type="email" name="email" class="form-control" placeholder="admin@example.com" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">🔑 Password</label>
                            <div class="input-group">
                                <input type="password" name="password" class="form-control" id="password" placeholder="••••••" required>
                                <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">👁</button>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-2">Login</button>
                    </form>

                    {{-- ALERT ERROR --}}
                    @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                        {{ $errors->first() }}
                    </div>
                    @endif

                    <div class="mt-3 text-center">
                        <a href="{{ route('admin.password.change') }}">Ganti Password?</a>
                    </div>
                    <div class="mt-2 text-center">
                        <a href="{{ route('slide1') }}" class="forgot-link">Kembali ke Beranda</a>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function togglePassword() {
                const passInput = document.getElementById("password");
                passInput.type = passInput.type === "password" ? "text" : "password";
            }
        </script>
</body>

</html>