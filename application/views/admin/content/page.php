<?php $count = segment(4) + 1; ?>
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-md-12">
        <?php flash() ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Page Manager</h3>
                <span class="pull-right add-new">
                    <a href="<?php echo site_url('admin/content/add_update') ?>" class="btn btn-success">Add New</a>
                </span>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered" id="dt-pages">
                    <thead>
                        <tr>
                            <th style="width:3%"></th>
                            <th>Page Title</th>
                            <th>Page Slug</th>
                            <th>Template</th>
                            <th width="12%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($pages)):
                            foreach ($pages as $page):
                                ?>
                                <tr>
                                    <td><?php echo $count++; ?></td>
                                    
                                    <td><?php echo $page->name ?></td>
                                    <td><?php echo $page->slug ?></td>
                                    <td><?php echo ucwords(str_replace('_', ' ', $page->template)) ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-info" href="<?php echo site_url('admin/content/add_update/' . $page->id) ?>">Edit</a>
                                        <a class="btn btn-sm btn-danger" href="<?php echo site_url('admin/content/delete_page/' . $page->id) ?>" onclick="return confirm('Are you sure?')">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach;
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
        $('#dt-pages').dataTable();
    });
</script>