<?php $count = segment(4) + 1; ?>
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-md-12">
        <?php flash() ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Contact Manager</h3>
                <span class="pull-right add-new">
                    <a href="<?php echo site_url('admin/content/add_update_contact') ?>" class="btn btn-success">Add New</a>
                </span>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table class="table table-striped" id="dt-pages">
                    <thead>
                        <tr>
                            <th style="width:3%">S.No</th>
                            <th>Address</th>
                            <th>Telephone</th>
                            <th>Mail 1</th>
                            <th>Mail 2</th>
                            <th width="12%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($contacts)):
                            foreach ($contacts as $contact):
                                ?>
                                <tr>
                                    <td><?php echo $count++; ?></td>

                                    <td><?php echo $contact->address; ?></td>
                                    <td><?php echo $contact->telephone; ?></td>
                                    <td><?php echo $contact->mail1; ?></td>
                                    <td><?php echo $contact->mail2; ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-info" href="<?php echo site_url('admin/content/add_update_contact/' . $contact->id) ?>">Edit</a>
                                        <a class="btn btn-sm btn-danger" href="<?php echo site_url('admin/content/delete_contact/' . $contact->id) ?>" onclick="return confirm('Are you sure?')">Delete</a>
                                    </td>
                                </tr>
                                <?php
                            endforeach;

                        else:
                            ?>
                            <tr>
                                <td colspan="6">No Data</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div><!-- /.row -->

<script>
    $(function () {
        $('#dt-contacts').dataTable();
    });
</script>