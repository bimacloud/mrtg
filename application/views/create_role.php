<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Role</title>
</head>
<body>

<h1>Create New Role</h1>

<form action="<?php echo site_url('Role/save'); ?>" method="post">
    <label for="role_name">Role Name:</label>
    <input type="text" name="role_name" id="role_name" required>
    <br><br>

    <button type="submit">Create Role</button>
</form>

</body>
</html>
