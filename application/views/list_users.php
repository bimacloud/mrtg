
<div id="page-wrapper">
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    User Management <small>Overview</small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> User Management
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
                    <i class="fa fa-info-circle"></i> <strong>Manage your Users here!</strong> Use this page to view, edit, and manage all users.
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- User Table Panel -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-table fa-fw"></i> List of Users</h3>
                    </div>
                    <div class="panel-body">
                        <a href="<?php echo site_url('User/create'); ?>" class="btn btn-primary">Create New User</a>
                        <br><br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
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
                                                <a href="<?php echo site_url('User/edit/'.$user['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="<?php echo site_url('User/delete/'.$user['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
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