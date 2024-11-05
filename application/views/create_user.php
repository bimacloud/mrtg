
<div id="page-wrapper">
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Create New User
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="<?php echo site_url('user'); ?>">User Management</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-plus"></i> Create User
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Form untuk Membuat User Baru -->
        <div class="row">
            <div class="col-lg-12">
                <form action="<?php echo site_url('User/save'); ?>" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label for="username" class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" name="username" id="username" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="role_id" class="col-sm-2 control-label">Role</label>
                        <div class="col-sm-10">
                            <select name="role_id" id="role_id" class="form-control" required>
                                <option value="">Select Role</option>
                                <?php foreach ($roles as $role): ?>
                                    <option value="<?php echo $role['id']; ?>"><?php echo $role['role_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Create User</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
