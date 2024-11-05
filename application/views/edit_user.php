<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
</head>
<body>

<h1>Edit User</h1>

<form action="<?php echo site_url('User/update/'.$user['id']); ?>" method="post">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" value="<?php echo $user['username']; ?>" required>
    <br><br>

    <label for="password">Password (leave blank to keep current):</label>
    <input type="password" name="password" id="password">
    <br><br>

    <label for="role_id">Role:</label>
    <select name="role_id" id="role_id" required>
        <?php foreach ($roles as $role): ?>
            <option value="<?php echo $role['id']; ?>" <?php if ($role['id'] == $user['role_id']) echo 'selected'; ?>>
                <?php echo $role['role_name']; ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br><br>

    <button type="submit">Update User</button>
</form>

</body>
</html>
