<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Lupa Password - E-Prolegtin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f4f6f9;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background: #0d3b3d;
            border: none;
        }
    </style>
</head>

<body>
    <div class="card p-4 col-md-4">
        <h5 class="text-center mb-3 fw-bold">Reset Password Admin</h5>
        <p class="text-muted small text-center">Masukkan email admin, link reset akan dikirim.</p>
        <form method="POST" action="{{ route('admin.password.email') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">📧 Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Kirim Link Reset</button>
        </form>
    </div>
</body>

</html>