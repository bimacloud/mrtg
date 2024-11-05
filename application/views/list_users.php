<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List of Users</title>
</head>
<body>

<h1>List of Users</h1>
<a href="<?php echo site_url('User/create'); ?>">Create New User</a>
<br><br>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['role_name']; ?></td>
                <td>
                    <a href="<?php echo site_url('User/edit/'.$user['id']); ?>">Edit</a> |
                    <a href="<?php echo site_url('User/delete/'.$user['id']); ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
