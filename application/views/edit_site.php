
<div id="page-wrapper">
    <div class="container-fluid">

        <h1 class="page-header">Edit Site</h1>

        <form action="<?php echo site_url('site/update/'.$site['id']); ?>" method="post" class="form-horizontal">
            <div class="form-group">
                <label for="user_id" class="control-label col-sm-2">User:</label>
                <div class="col-sm-10">
                    <select name="user_id" id="user_id" class="form-control" required>
                        <?php foreach ($users as $user): ?>
                            <option value="<?php echo $user['id']; ?>" <?php if ($user['id'] == $site['user_id']) echo 'selected'; ?>>
                                <?php echo $user['username']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="layanan_id" class="control-label col-sm-2">Layanan ID:</label>
                <div class="col-sm-10">
                    <input type="text" name="layanan_id" id="layanan_id" class="form-control" value="<?php echo $site['layanan_id']; ?>" required>
                </div>
            </div>

            <div class="form-group">
                <label for="graph" class="control-label col-sm-2">Graph Path:</label>
                <div class="col-sm-10">
                    <input type="text" name="graph" id="graph" class="form-control" value="<?php echo $site['graph']; ?>" required>
                </div>
            </div>

            <div class="form-group">
                <label for="ip_address" class="control-label col-sm-2">IP Address:</label>
                <div class="col-sm-10">
                    <input type="text" name="ip_address" id="ip_address" class="form-control" value="<?php echo $site['ip_address']; ?>" required>
                </div>
            </div>

            <div class="form-group">
                <label for="vlan_id" class="control-label col-sm-2">VLAN ID:</label>
                <div class="col-sm-10">
                    <input type="text" name="vlan_id" id="vlan_id" class="form-control" value="<?php echo $site['vlan_id']; ?>" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Update Site</button>
                </div>
            </div>
        </form>

    </div>
</div>
