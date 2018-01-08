<?php $count = segment(4) + 1; ?>
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-md-12">
        <?php flash() ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Fleet</h3>
                <span class="pull-right add-new">
                    <a href="<?php echo base_url('admin/fleet/add_update') ?>"
                       class="btn btn-success">Add New</a>
                </span>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table class="table table-striped" id="dt-table">
                    <thead>
                    <tr>
                        <th style="width: 70px">#</th>
                        <th>Image</th>
                        <th>Car Name</th>
                        <th>Capacity</th>
                        <th style="width: 150px">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (!empty($fleets)) {
                    foreach ($fleets as $fleet) { ?>
                        <tr>
                            <td><?php echo $count++; ?></td>
                            <td><img src="<?= base_url('uploads/fleet/' . $fleet->img_name) ?>" width="100"></td>
                            <td><?php echo $fleet->title ?></td>
                            <td class="sorting_1">
                                <i class="fa fa-users"> <?= $fleet->passengers ?></i>
                                <i class="fa fa-suitcase"> <?= $fleet->luggage ?></i>
                                <i class="fa fa-briefcase"> <?= $fleet->suitcases ?></i>
                                <i class="fa fa-child"> <?= $fleet->baby_seats ?></i>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-info"
                                   href="<?php echo base_url('admin/fleet/add_update/' . $fleet->id) ?>">Edit</a>
                                <a class="btn btn-sm btn-danger"
                                   href="<?php echo base_url('admin/fleet/delete/' . $fleet->id) ?>"
                                   onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                    <?php }} ?>
                    </tbody>
                </table>
            </div><!-- /.box-body -->

        </div><!-- /.box -->
    </div>
</div><!-- /.row -->
<script>
    $(document).ready(function () {
        $('#dt-table').dataTable();
    });
</script>