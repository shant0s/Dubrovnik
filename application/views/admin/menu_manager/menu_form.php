<?php
$isNew = true;
if (segment(4) != '') {
    $isNew = false;
    $name = $menus->name;
    $slug = $menus->slug;
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header"></div><!-- /.box-header -->
            <div class="box-body">
                <form action="" method="post" class="forms" enctype="multipart/form-data">                   

                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>
                                    <label>Menu Name <span class="text-danger">*</span></label>
                                    <input type="text" placeholder="Enter main menu name" class="form-control required" name="name" value="<?php echo!$isNew ? $name : '' ?>" required="">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>URL<span class="text-danger">*</span></label>
                                    <input type="text" placeholder="Enter full URL" class="form-control required" name="slug" value="<?php echo!$isNew ? $slug : '' ?>">
                                </td>
                            </tr>

                            <tr><td><input id="has-ckeditor" class="btn btn-primary" type="submit" value="Save"></td></tr>            
                        </tbody>
                    </table>
                    <!--  </form> -->
                </form>
            </div>

        </div><!-- /.box -->
    </div>
</div><!-- /.row -->