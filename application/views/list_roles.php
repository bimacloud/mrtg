<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List of Roles</title>
</head>
<body>

<h1>List of Roles</h1>
<a href="<?php echo site_url('Role/create'); ?>">Create New Role</a>
<br><br>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Role Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($roles as $role): ?>
            <tr>
                <td><?php echo $role['id']; ?></td>
                <td><?php echo $role['role_name']; ?></td>
                <td>
                    <a href="<?php echo site_url('Role/edit/'.$role['id']); ?>">Edit</a> |
                    <a href="<?php echo site_url('Role/delete/'.$role['id']); ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
