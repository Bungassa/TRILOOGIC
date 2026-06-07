<!DOCTYPE html>
<html>
<head>
    <title>Reset Password OTP</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px;">
        <h2 style="color: #825449; text-align: center;">Ekky Family Refleksi</h2>
        <p>Halo,</p>
        <p>Anda menerima email ini karena ada permintaan untuk mengatur ulang password akun Anda.</p>
        <p>Berikut adalah kode OTP Anda. Kode ini berlaku selama 15 menit:</p>
        <div style="text-align: center; margin: 20px 0;">
            <span style="font-size: 32px; font-weight: bold; letter-spacing: 5px; color: #333; background: #f4f4f4; padding: 10px 20px; border-radius: 5px;">{{ $otp }}</span>
        </div>
        <p>Jika Anda tidak meminta reset password, Anda dapat mengabaikan email ini dengan aman.</p>
        <br>
        <p>Terima kasih,<br>Tim Ekky Refleksi</p>
    </div>
</body>
</html>
