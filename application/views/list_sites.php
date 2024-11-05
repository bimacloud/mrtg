<div id="page-wrapper">
    <div class="container-fluid">
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

        <!-- Alert Info -->
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="fa fa-info-circle"></i>  <strong>Manage your Sites here!</strong> Use this page to view, edit, and manage all sites.
                </div>
            </div>
        </div>

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
                                                <!-- Tombol untuk membuka modal dengan iframe -->
                                                <a href="javascript:void(0);" onclick="loadIframe('<?php echo base_url($site['graph']); ?>');" class="btn btn-info btn-sm">
                                                    <i class="fa fa-bar-chart-o"></i> View
                                                </a>
                                                <a href="<?php echo site_url('site/edit/'.$site['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="<?php echo site_url('site/delete/'.$site['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
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

    </div>
</div>

<!-- Modal untuk menampilkan iframe -->
<div class="modal fade" id="iframeModal" tabindex="-1" role="dialog" aria-labelledby="iframeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="iframeModalLabel">View Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe id="iframe-content" src="" title="Embedded Content"></iframe>
            </div>
        </div>
    </div>
</div>
    <script>
        function loadIframe(url) {
            document.getElementById('iframe-content').src = url;
            $('#iframeModal').modal('show'); // Membuka modal
        }
    </script>