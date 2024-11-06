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
                                                <a href="<?php echo site_url('site/generate_config/'.$site['id']); ?>" class="btn btn-default btn-sm"><i class="fa fa-cog"></i> Config</a>
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

<!-- Modal untuk menampilkan iframe Graph -->
<div class="modal fade" id="iframeModal" tabindex="-1" role="dialog" aria-labelledby="iframeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="iframeModalLabel">Graph View</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe id="iframe-content" src="" title="Embedded Graph" width="100%" height="600"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Fungsi untuk mengubah src iframe dan membuka modal
    function loadIframe(graphPath) {
        const baseUrl = "http://monitor.puskomedia.net.id"; // URL dasar
        document.getElementById('iframe-content').src = baseUrl + graphPath;
        $('#iframeModal').modal('show'); // Buka modal
    }
</script>
