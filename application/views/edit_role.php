<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Role</title>
</head>
<body>

<h1>Edit Role</h1>

<form action="<?php echo site_url('Role/update/'.$role['id']); ?>" method="post">
    <label for="role_name">Role Name:</label>
    <input type="text" name="role_name" id="role_name" value="<?php echo $role['role_name']; ?>" required>
    <br><br>

    <button type="submit">Update Role</button>
</form>

</body>
</html>
