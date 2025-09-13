<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Terima Kasih</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }

        .wrap {
            width: 600px;
            margin: 80px auto;
            background: #fff;
            padding: 40px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #28a745;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 18px;
            background: #007bff;
            color: #fff;
            border-radius: 6px;
            text-decoration: none;
        }

        a:hover {
            background: #0056b3;
        }
    </style>
</head>

<body>
    <div class="wrap">
        <h1>✅ Data Berhasil Dikirim</h1>
        <p>Terima kasih sudah mengisi form E-Prolegtin.</p>
        <a href="{{ route('slide1') }}">Kembali ke Halaman Utama</a>
    </div>
</body>

</html>