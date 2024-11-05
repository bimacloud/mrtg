<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

<h1>Login</h1>

<?php if ($this->session->flashdata('error')): ?>
    <p style="color: red;"><?php echo $this->session->flashdata('error'); ?></p>
<?php endif; ?>

<form action="<?php echo site_url('auth/loginProcess'); ?>" method="post">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required>
    <br><br>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>
    <br><br>

    <button type="submit">Login</button>
</form>

</body>
</html>
