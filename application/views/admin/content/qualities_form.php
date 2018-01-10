
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <?php flash() ?>
                <h3 class="box-title">Quality Manager | <?php echo 'Update' ?></h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <form action="" method="post" class="forms" enctype="multipart/form-data">
                    <input type="hidden" name="is_active" value="1">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-horizontal">
                                    <label>Title 1<span class="text-danger">*</span></label>
                                    <input type="type" name="title1" class="required" value="<?php echo $qualities->title1; ?>" required>
                                    <?php echo form_error('title1', '<div class="error">', '</div>'); ?>
                                    </div>
                                </td>
                                
                            </tr>
                            <tr>
                                <td>
                                    <label>Title 2<span class="text-danger">*</span></label>
                                    <input type="type" name="title2" class="required" value="<?php echo $qualities->title2; ?>" required>
                                    <?php echo form_error('title2', '<div class="error">', '</div>'); ?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td>
                                    <label>Title 3<span class="text-danger">*</span></label>
                                    <input type="type" name="title3" class="required" value="<?php echo $qualities->title3; ?>" required>
                                    <?php echo form_error('title3', '<div class="error">', '</div>'); ?>
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