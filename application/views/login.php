<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body, html {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f2f5;
        }
        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        p {
            color: red;
        }
        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }
        .input-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .login-button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #4CAF50;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .login-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h1>Login</h1>

    <?php if ($this->session->flashdata('error')): ?>
        <p><?php echo $this->session->flashdata('error'); ?></p>
    <?php endif; ?>

    <form action="<?php echo site_url('auth/loginProcess'); ?>" method="post">
        <div class="input-group">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
        </div>

        <div class="input-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>

        <button type="submit" class="login-button">Login</button>
    </form>
</div>

</body>
</html>
