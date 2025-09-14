<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Reset Password - E-Prolegtin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #eef2f7;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
            width: 400px;
        }

        .btn-primary {
            background: #0d3b3d;
            border: none;
        }

        .input-group-text {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="card p-4">
        <h5 class="text-center mb-3 fw-bold">🔒 Reset Password Admin</h5>

        {{-- ALERT --}}
        @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif


        <form method="POST" action="{{ route('admin.password.update') }}">
            @csrf

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Password Lama</label>
                <input type="password" name="old_password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Password Baru</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Konfirmasi Password Baru</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Reset Password</button>
        </form>

    </div>

    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            const input = document.getElementById('password');
            input.type = input.type === 'password' ? 'text' : 'password';
        });

        document.getElementById('togglePasswordConfirm').addEventListener('click', function() {
            const input = document.getElementById('password_confirmation');
            input.type = input.type === 'password' ? 'text' : 'password';
        });
    </script>
</body>

</html>