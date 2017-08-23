<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Testimonial Manager | <?php echo ($isNew) ? 'Add' : 'Update' ?></h3>

            </div><!-- /.box-header -->
            <div class="row">
                <form action="" method="post" class="forms" enctype="multipart/form-data">
                    <div class="col-sm-8">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>
                                        <label>Designation <span class="text-danger">*</span></label>
                                        <input type="text" placeholder="Enter Full Name" class="form-control required" name="designation" value="<?php echo!$isNew ? $testimonial->designation : '' ?>" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Content <span class="text-danger">*</span></label>
                                        <textarea name="content" placeholder="Enter Content" rows="4" class="form-control required" required><?php echo!$isNew ? $testimonial->content : '' ?></textarea>
                                        <label class="error" style="display:none;">This field is required</label>                                      
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <!--  </form> -->
                    </div><!-- /.box-body -->                    
                    <div class="col-md-5">
                        <tr><td><input id="has-ckeditor" class="btn btn-primary" type="submit" value="Save"></td></tr>
                    </div>
                </form>
            </div>

        </div><!-- /.box -->
    </div>
</div><!-- /.row -->