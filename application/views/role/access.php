<div id="page-wrapper">
    <div class="container-fluid">
        <h1>Manage Access for <?php echo htmlspecialchars($role['role_name']); ?></h1>

        <form action="<?php echo site_url('role/save_access/'.$role['id']); ?>" method="post">
            <div class="form-group">
                <label for="access">Select Menus:</label>
                <?php foreach ($menus as $menu): ?>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="access[<?php echo $menu; ?>]" <?php echo in_array($menu, array_column($access, 'menu_name')) ? 'checked' : ''; ?>> <?php echo $menu; ?>
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>
            <button type="submit" class="btn btn-primary">Save Access</button>
        </form>

        <a href="<?php echo site_url('role/index'); ?>" class="btn btn-default">Back to Role List</a>
    </div>
</div>
