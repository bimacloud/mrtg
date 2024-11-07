<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f8fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: #ffffff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 15px;
            color: #333;
        }
        .error-message {
            color: #e74c3c;
            margin-bottom: 15px;
            font-size: 14px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-size: 14px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
        button {
            background-color: #2f56dd;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #218838;
        }
        .info-text {
            margin-top: 15px;
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Verification Code</h1>
        <?php if ($this->session->flashdata('error')): ?>
            <div class="error-message">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>
        <p>Silahkan masukkan kode verifikasi (OTP) yang diterima dari aplikasi Telegram:</p>
        <form action="<?php echo site_url('auth/verifyCode'); ?>" method="post">
            <label for="verification_code">Enter Verification Code:</label>
            <input type="text" name="verification_code" id="verification_code" required>
            <button type="submit">Verify</button>
        </form>
        <p class="info-text">Tidak menerima kode verifikasi? Pastikan Telegram ID yang diinputkan pada saat registrasi benar.</p>
    </div>
</body>
</html>
