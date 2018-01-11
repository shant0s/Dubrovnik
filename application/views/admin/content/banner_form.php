<?php
$isNew = true;
if ($this->uri->segment(4) != '') {
    $banner = $banner;
    $isNew = false;
    $filename = $banner->filename;
    $is_active = $banner->is_active;
}
?>
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Banner Manager | <?php echo ($isNew) ? 'Add' : 'Update' ?></h3>
                <span class="pull-right add-new">
                    <a href="<?php echo site_url('admin/content/add_update_banner') ?>" class="btn btn-success">Add New</a>
                </span>
            </div><!-- /.box-header -->
            <div class="box-body">
                <form action="" method="post" class="forms" enctype="multipart/form-data">
                    <input type="hidden" name="is_active" value="1">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>
                                    <label>Banner Image <span class="text-danger">*</span></label>
                                    <input type="file" name="banner" class="<?php echo ($isNew) ? 'required' : '' ?>" >
                                </td>
                            </tr>
                            <?php if (!$isNew) { ?>
                                <tr>
                                    <td>
                                        <img width="30%" src="<?php echo base_url('uploads/banner/' . $filename) ?>" class="img-responsive">
                                    </td>
                                </tr>
                            <?php } ?>
                        <tbody id="p_scents">
                            <tr>
                                <td>
                                    <textarea class="form-control" name="caption" placeholder="Enter banner caption"><?= !$isNew ? $banner->caption : '' ?></textarea>
                                </td>
                            </tr>
                        </tbody>
                        <tr>
                            <td>
                                <label>Banner Description <span class="text-danger">*</span></label>
                                <textarea name="description" placeholder="Enter banner description" class="form-control required" id="description"><?php echo!$isNew ? $banner->description : '' ?></textarea>
                                <label for="description" class="error" style="display:none;">This field is required</label>
                                <script type="text/javascript">
                                    var editor = CKEDITOR.replace('description',
                                            {
                                                customConfig: '<?php echo base_url('assets/admin/js/plugins/ckeditor/my_config.js') ?>'
                                            });
                                    CKFinder.setupCKEditor(editor, '<?php echo base_url('assets/admin/js/plugins/ckfinder/') ?>');
                                </script>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="btn btn-primary" type="submit" value="Save">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div><!-- /.row -->