<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create User</title>
</head>
<body>

<h1>Create New User</h1>

<form action="<?php echo site_url('User/save'); ?>" method="post">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required>
    <br><br>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>
    <br><br>

    <label for="role_id">Role:</label>
    <select name="role_id" id="role_id" required>
        <option value="">Select Role</option>
        <?php foreach ($roles as $role): ?>
            <option value="<?php echo $role['id']; ?>"><?php echo $role['role_name']; ?></option>
        <?php endforeach; ?>
    </select>
    <br><br>

    <button type="submit">Create User</button>
</form>

</body>
</html>
