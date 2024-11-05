<div id="page-wrapper">
    <div class="container-fluid">

        <!-- Tampilkan Pesan Flash -->
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Site Management <small>Overview</small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Site Management
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
                    <i class="fa fa-info-circle"></i> <strong>Manage your Sites here!</strong> Use this page to view, edit, manage, and configure all sites.
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- Site Table Panel -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-table fa-fw"></i> List of Sites</h3>
                    </div>
                    <div class="panel-body">
                        <a href="<?php echo site_url('site/create'); ?>" class="btn btn-primary">Create New Site</a>
                        <br><br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Layanan ID</th>
                                        <th>Graph Path</th>
                                        <th>IP Address</th>
                                        <th>VLAN ID</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($sites as $site): ?>
                                        <tr>
                                            <td><?php echo $site['id']; ?></td>
                                            <td><?php echo $site['username']; ?></td>
                                            <td><?php echo $site['layanan_id']; ?></td>
                                            <td><?php echo $site['graph']; ?></td>
                                            <td><?php echo $site['ip_address']; ?></td>
                                            <td><?php echo $site['vlan_id']; ?></td>
                                            <td>
                                                <a href="javascript:void(0);" onclick="loadIframe('<?php echo $site['graph']; ?>');" class="btn btn-info btn-sm"><i class="fa fa-bar-chart-o"></i> View</a>
                                                <a href="<?php echo site_url('site/edit/'.$site['id']); ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="<?php echo site_url('site/delete/'.$site['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i> Delete</a>
                                                <a href="<?php echo site_url('site/config/'.$site['id']); ?>" class="btn btn-secondary btn-sm"><i class="fa fa-cog"></i> Config</a>
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
