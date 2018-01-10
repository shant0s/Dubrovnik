<?php
$isNew = true;
if (segment(4) != '') {
    $filename = $page->filename;
    $isNew = false;
    $name = $page->name;
    $desc = $page->desc;
    $long_desc = $page->long_desc;
    $is_active = $page->is_active;
}
?>
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Page Manager | <?php echo ($isNew) ? 'Add' : 'Update' ?></h3>

            </div><!-- /.box-header -->
            <div class="row">
                <form action="" method="post" class="forms" enctype="multipart/form-data">
                    <div class="col-sm-8">
                        <!-- <form action="" method="post" class="forms" enctype="multipart/form-data"> -->
                        <input type="hidden" id="is_active" value="1" class="required" name="is_active">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>
                                        <label>Page Name <span class="text-danger">*</span></label>
                                        <input type="text" placeholder="Enter page name" class="form-control required" name="name" value="<?php echo!$isNew ? $name : '' ?>" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Page Description 1<span class="text-danger">*</span></label>
                                        <textarea name="desc" placeholder="Enter page description" class="form-control required" id="desc"><?php echo!$isNew ? $desc : '' ?></textarea>
                                        <label for="desc" class="error" style="display:none;">This field is required</label>
                                        <script type="text/javascript">
                                            var editor = CKEDITOR.replace('desc',
                                                    {
                                                        customConfig: '<?php echo base_url('assets/admin/js/plugins/ckeditor/my_config.js') ?>'
                                                    });
                                            CKFinder.setupCKEditor(editor, '<?php echo base_url('assets/admin/js/plugins/ckfinder/') ?>');
                                        </script>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Page Description 2<span class="text-danger">*</span></label>
                                        <textarea name="long_desc" placeholder="Enter page description" class="form-control required" id="long_desc"><?php echo!$isNew ? $long_desc : '' ?></textarea>
                                        <label for="desc" class="error" style="display:none;">This field is required</label>
                                        <script type="text/javascript">
                                            var editor = CKEDITOR.replace('long_desc',
                                                    {
                                                        customConfig: '<?php echo base_url('assets/admin/js/plugins/ckeditor/my_config.js') ?>'
                                                    });
                                            CKFinder.setupCKEditor(editor, '<?php echo base_url('assets/admin/js/plugins/ckfinder/') ?>');
                                        </script>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <!--  </form> -->
                    </div><!-- /.box-body -->
                    <div class="col-sm-4">
                        <div class="box-body">  

                            <input type="hidden" name="is_active" value="1">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>
                                            <label>Template <span class="text-danger">*</span></label>
                                            <select name="template" class="form-control" required="">
                                                <option value="<?php echo !$isNew ? $page->template : '' ?>"><?= !$isNew ? ucwords(str_replace('_', ' ', $page->template)) : 'Select Template'?></option>
                                                <option value="normal_page">Normal Page</option>
<!--                                                <option value="airport_page">Airport Page</option>-->
                                                <option value="service_page">Service Page</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>Page Image <span class="text-danger">*</span></label>
                                            <input type="file" name="page" class="<?php echo ($isNew) ? 'required' : '' ?>">
                                        </td>
                                    </tr>
                                    <?php if (!$isNew && $filename): ?>
                                        <tr>
                                            <td>
                                                <img width="100%" src="<?php echo base_url('uploads/page/' . $filename) ?>" class="img-responsive">
                                            </td>
                                        </tr>
                                    <?php endif; ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <tr><td><input id="has-ckeditor" class="btn btn-primary" type="submit" value="Save"></td></tr>
                    </div>
                </form>
            </div>

        </div><!-- /.box -->
    </div>
</div><!-- /.row -->