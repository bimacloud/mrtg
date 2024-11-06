<div id="page-wrapper">
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Create New Site
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="<?php echo site_url('site'); ?>">Site Management</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-plus"></i> Create Site
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <form action="<?php echo site_url('site/save'); ?>" method="post" class="form-horizontal">
                    
                    <!-- User Field -->
                    <div class="form-group">
                        <label for="user_id" class="col-sm-2 control-label">User</label>
                        <div class="col-sm-10">
                            <select name="user_id" id="user_id" class="form-control" required>
                                <option value="">Select User</option>
                                <?php foreach ($users as $user): ?>
                                    <option value="<?php echo $user['id']; ?>"><?php echo $user['username']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <!-- Layanan ID Field -->
                    <div class="form-group">
                        <label for="layanan_id" class="col-sm-2 control-label">Layanan ID</label>
                        <div class="col-sm-10">
                            <input type="text" name="layanan_id" id="layanan_id" class="form-control" required>
                        </div>
                    </div>

                    <!-- Graph Path Field -->
                    <div class="form-group">
                        <label for="graph" class="col-sm-2 control-label">Graph Path</label>
                        <div class="col-sm-10">
                            <input type="text" name="graph" id="graph" class="form-control" required>
                        </div>
                    </div>

                    <!-- IP Address Field -->
                    <div class="form-group">
                        <label for="ip_address" class="col-sm-2 control-label">IP Address</label>
                        <div class="col-sm-10">
                            <input type="text" name="ip_address" id="ip_address" class="form-control" required>
                        </div>
                    </div>

                    <!-- VLAN ID Field -->
                    <div class="form-group">
                        <label for="vlan_id" class="col-sm-2 control-label">VLAN ID</label>
                        <div class="col-sm-10">
                            <input type="text" name="vlan_id" id="vlan_id" class="form-control" required>
                        </div>
                    </div>

                    <!-- OID Field -->
                    <div class="form-group">
                        <label for="oid" class="col-sm-2 control-label">OID</label>
                        <div class="col-sm-10">
                            <input type="text" name="oid" id="oid" class="form-control" required>
                        </div>
                    </div>

                    <!-- SNMP Community Field -->
                    <div class="form-group">
                        <label for="snmp_community" class="col-sm-2 control-label">SNMP Community</label>
                        <div class="col-sm-10">
                            <input type="text" name="snmp_community" id="snmp_community" class="form-control" required>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Create Site</button>
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
