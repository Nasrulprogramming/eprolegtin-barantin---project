<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Reset Password Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow" style="width: 400px;">
        <h4 class="text-center mb-3">🔑 Reset Password</h4>
        <p class="text-center">Admin: <strong>{{ $admin->name }}</strong></p>

        <form method="POST" action="{{ route('admin.reset.password', $admin->id) }}">
            @csrf
            <div class="mb-3">
                <label>Password Baru</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-warning w-100">Reset</button>
        </form>
    </div>
</body>

</html>