<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Reset Password - E-Prolegtin</title>
</head>

<body style="font-family: Arial, sans-serif; background:#f4f6f8; padding:20px;">
    <table align="center" width="600" style="background:#fff; border-radius:10px; overflow:hidden; box-shadow:0 4px 12px rgba(0,0,0,.1);">
        <tr>
            <td style="background:#0d3b3d; padding:20px; text-align:center;">
                <img src="{{ asset('images/logo.png') }}" alt="E-Prolegtin" style="height:60px;">
                <h2 style="color:#fff; margin:10px 0;">E-Prolegtin</h2>
            </td>
        </tr>
        <tr>
            <td style="padding:30px; color:#333;">
                <h3 style="margin-top:0;">Reset Password</h3>
                <p>Halo,</p>
                <p>Kami menerima permintaan untuk reset password akun admin Anda. Klik tombol di bawah untuk mengganti password:</p>

                <p style="text-align:center; margin:30px 0;">
                    <a href="{{ $resetUrl }}" style="background:#0d3b3d; color:#fff; padding:12px 25px; text-decoration:none; border-radius:6px; font-weight:bold;">
                        🔑 Reset Password
                    </a>
                </p>

                <p>Jika Anda tidak merasa melakukan permintaan ini, abaikan email ini.</p>
                <p>Salam,<br><strong>Tim E-Prolegtin</strong></p>
            </td>
        </tr>
        <tr>
            <td style="background:#f1f1f1; padding:15px; text-align:center; font-size:12px; color:#777;">
                &copy; {{ date('Y') }} Badan Karantina Indonesia — E-Prolegtin
            </td>
        </tr>
    </table>
</body>

</html>