
<div id="page-wrapper">
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Role Management <small>Overview</small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Role Management
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Alert Info -->
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="fa fa-info-circle"></i> <strong>Manage your Roles here!</strong> Use this page to view, edit, and manage all roles.
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- Role Table Panel -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-table fa-fw"></i> List of Roles</h3>
                    </div>
                    <div class="panel-body">
                        <a href="<?php echo site_url('Role/create'); ?>" class="btn btn-primary">Create New Role</a>
                        <br><br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
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
                                                <a href="<?php echo site_url('Role/edit/'.$role['id']); ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="<?php echo site_url('Role/delete/'.$role['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i> Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

