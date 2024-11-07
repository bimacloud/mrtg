<div id="page-wrapper">
    <div class="container-fluid">

        <h1>Edit Role</h1>

        <form action="<?php echo site_url('role/update/'.$role['id']); ?>" method="post">
            <label for="role_name">Role Name:</label>
            <input type="text" name="role_name" id="role_name" value="<?php echo htmlspecialchars($role['role_name']); ?>" required>
            <br><br>

            <button type="submit" class="btn btn-primary">Update Role</button>
        </form>

    </div>
</div>
