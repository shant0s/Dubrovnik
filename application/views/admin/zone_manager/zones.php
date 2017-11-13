<div class="row">
    <div class="col-md-12">
        <?php flash() ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title btn-block">All Zones
                    <span class="pull-right">
                        <a href="<?= site_url('admin/zone_manager/add_edit') ?>" class="btn btn-success"><i class="fa fa-plus-square"></i> Add New</a>
                    </span>
                </h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table class="table table-hover table-striped datatable">
                    <thead>
                        <tr>
                            <th width="3%">S.No</th>
                            <th>Zone Title</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($zones):
                            foreach ($zones as $index => $zone):
                                ?>
                                <tr>
                                    <td><?= ++$index ?></td>
                                    <td><?= $zone->title ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="<?= site_url('admin/zone_manager/add_edit/' . $zone->id) ?>"><i class="fa fa-edit text-primary"></i> Edit</a></li>
                                                <li><a href="<?= site_url('admin/zone_manager/delete/' . $zone->id) ?>"><i class="fa fa-trash text-danger"></i> Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            endforeach;
                        endif;
                        ?>
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div><!-- /.row -->
<script>
    $(function(){
        $('.datatable').dataTable();
    });
</script>