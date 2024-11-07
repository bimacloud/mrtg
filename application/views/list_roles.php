<div id="page-wrapper">
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Role Management</h1>
                <ol class="breadcrumb">
                    <li class="active"><i class="fa fa-dashboard"></i> Role Management</li>
                </ol>
            </div>
        </div>

        <!-- Alert Info -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>

        <a href="<?php echo site_url('role/create'); ?>" class="btn btn-primary">Create New Role</a>
        <br><br>

        <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-table"></i> List of Roles</div>
            <div class="panel-body">
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
                                        <a href="<?php echo site_url('role/edit/'.$role['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="<?php echo site_url('role/delete/'.$role['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                                        <a href="<?php echo site_url('role/access/'.$role['id']); ?>" class="btn btn-info btn-sm">Manage Access</a>
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
