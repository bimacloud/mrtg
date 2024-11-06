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
                    MRTG Configuration <small>Details for Site</small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="<?php echo site_url('site'); ?>">Site Management</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-cog"></i> Configuration
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Site Configuration Info -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-info-circle"></i> Site Configuration Details</h3>
                    </div>
                    <div class="panel-body">
                        <dl class="dl-horizontal">
                            <dt>Username:</dt>
                            <dd><?php echo htmlspecialchars($site['username']); ?></dd>

                            <dt>OID:</dt>
                            <dd><?php echo htmlspecialchars($site['oid']); ?></dd>

                            <dt>SNMP Community:</dt>
                            <dd><?php echo htmlspecialchars($site['snmp_community']); ?></dd>

                            <dt>IP Address:</dt>
                            <dd><?php echo htmlspecialchars($site['ip_address']); ?></dd>

                            <dt>VLAN ID:</dt>
                            <dd><?php echo htmlspecialchars($site['vlan_id']); ?></dd>

                            <dt>Graph Path:</dt>
                            <dd><?php echo htmlspecialchars($site['graph']); ?></dd>

                            <dt>Layanan ID:</dt>
                            <dd><?php echo htmlspecialchars($site['layanan_id']); ?></dd>

                            <!-- Tampilkan Status File Konfigurasi -->
                            <dt>Configuration File Status:</dt>
                            <dd>
                                <?php
                                $file_path = "/etc/site/" . (($site['role_id'] == 3) ? "reseller" : "pop") . "/" . $site['username'] . ".cfg";
                                if (file_exists($file_path)) {
                                    echo "<span class='text-success'>Configuration file exists</span>";
                                } else {
                                    echo "<span class='text-danger'>Configuration file not created</span>";
                                }
                                ?>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- Configuration Actions -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-wrench"></i> Configuration Actions</h3>
                    </div>
                    <div class="panel-body">
                        <a href="<?php echo site_url('site/generate_config/' . $site['id']); ?>" class="btn btn-primary">
                            <i class="fa fa-cog"></i> Generate Configuration File
                        </a>
                        
                        <a href="<?php echo site_url('site/create_folder/' . $site['id']); ?>" class="btn btn-success">
                            <i class="fa fa-folder"></i> Create Folder
                        </a>
                        
                        <!-- Tombol Generate Index -->
                        <a href="<?php echo site_url('site/generate_index/' . $site['id']); ?>" class="btn btn-info">
                            <i class="fa fa-file"></i> Generate Index
                        </a>

                        <a href="<?php echo site_url('site'); ?>" class="btn btn-default">
                            <i class="fa fa-arrow-left"></i> Back to Site Management
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
