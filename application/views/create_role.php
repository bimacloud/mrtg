<div id="page-wrapper">
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Create New Role
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="<?php echo site_url('role'); ?>">Role Management</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-plus"></i> Create Role
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Form untuk Membuat Role Baru -->
        <div class="row">
            <div class="col-lg-12">
                <form action="<?php echo site_url('Role/save'); ?>" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label for="role_name" class="col-sm-2 control-label">Role Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="role_name" id="role_name" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Create Role</button>
                            <a href="<?php echo site_url('role'); ?>" class="btn btn-default">Cancel</a>
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
