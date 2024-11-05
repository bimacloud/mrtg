
<div id="page-wrapper">
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
               <h1 class="page-header">
                    Configure MRTG for <?php echo isset($site['username']) ? $site['username'] : 'Unknown'; ?>
                </h1>

                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="<?php echo site_url('site'); ?>">Site Management</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-cog"></i> Configure MRTG
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Form Konfigurasi MRTG -->
        <div class="row">
            <div class="col-lg-12">
                <form action="<?php echo site_url('site/save_config/'.$site['id']); ?>" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label for="oid" class="col-sm-2 control-label">OID</label>
                        <div class="col-sm-10">
                            <input type="text" name="oid" id="oid" class="form-control" required>
                            <small class="form-text text-muted">Masukkan OID yang digunakan untuk target MRTG.</small>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="snmp_community" class="col-sm-2 control-label">SNMP Community</label>
                        <div class="col-sm-10">
                            <input type="text" name="snmp_community" id="snmp_community" class="form-control" required>
                            <small class="form-text text-muted">Masukkan SNMP Community untuk akses ke target.</small>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ip_address" class="col-sm-2 control-label">IP Address</label>
                        <div class="col-sm-10">
                            <input type="text" name="ip_address" id="ip_address" class="form-control" required>
                            <small class="form-text text-muted">Masukkan IP Address dari target.</small>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Save Configuration</button>
                            <a href="<?php echo site_url('site'); ?>" class="btn btn-default">Cancel</a>
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

