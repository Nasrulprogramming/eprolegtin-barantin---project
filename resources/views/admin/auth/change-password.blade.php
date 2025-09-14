<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Reset Password - Admin</title>
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
        <h5 class="text-center mb-3 fw-bold">🔑 Reset Password Admin</h5>

        {{-- Alert sukses --}}
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Alert error --}}
        @if ($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('admin.password.update') }}">
            @csrf

            {{-- EMAIL --}}
            <div class="mb-3">
                <label class="form-label">📧 Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            {{-- PASSWORD LAMA --}}
            <div class="mb-3">
                <label class="form-label">🔒 Password Lama</label>
                <div class="input-group">
                    <input type="password" name="old_password" id="old_password" class="form-control" required>
                    <span class="input-group-text toggle-password" data-target="old_password">👁</span>
                </div>
            </div>

            {{-- PASSWORD BARU --}}
            <div class="mb-3">
                <label class="form-label">🔑 Password Baru</label>
                <div class="input-group">
                    <input type="password" name="password" id="password" class="form-control" required>
                    <span class="input-group-text toggle-password" data-target="password">👁</span>
                </div>
            </div>

            {{-- KONFIRMASI PASSWORD --}}
            <div class="mb-3">
                <label class="form-label">🔑 Konfirmasi Password Baru</label>
                <div class="input-group">
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                    <span class="input-group-text toggle-password" data-target="password_confirmation">👁</span>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100">Update Password</button>
        </form>
    </div>

    <script>
        document.querySelectorAll('.toggle-password').forEach(item => {
            item.addEventListener('click', function() {
                let target = document.getElementById(this.dataset.target);
                if (target.type === "password") {
                    target.type = "text";
                    this.textContent = "🙈";
                } else {
                    target.type = "password";
                    this.textContent = "👁";
                }
            });
        });
    </script>
</body>

</html>