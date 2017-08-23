<div class="col-md-12">
    <?php flash(); ?>        
    <div class="box"> 
        <div class="box-header with-border">                
            <h3 class="box-title">Zone Manager</h3>
            <span class="pull-right">
                <a href="<?= site_url('admin/zone_manager/add') ?>" class="btn btn-success">Add New Zone</a>
            </span>
        </div>        
        <div class="box-body">
            <table class="table table-bordered table-striped" id="dt-zone">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Zone Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($zones): ?>
                        <?php
                        $count = 1;
                        foreach ($zones as $zone):
                            ?>         
                            <tr>
                                <td><?= $count; ?></td>
                                <td><?= $zone->name ?></td>
                                <td class="dropdown open">
                                    <a class="btn btn-sm btn-info" href="<?= site_url('admin/zone_manager/update/' . $zone->id) ?>">Edit</a>
                                    <a class="btn btn-sm btn-danger" href="<?= site_url('admin/zone_manager/delete/' . $zone->id) ?>" onclick="return confirm('Are you sure?')">Delete</a>                                   
                                </td>
                            </tr>
                            <?php
                            $count++;
                        endforeach;
                        ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" class="text-center">--No data--</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(function () {
        $('#dt-zone').dataTable();
    });
</script>