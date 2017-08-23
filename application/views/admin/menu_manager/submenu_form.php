<?php
$isNew = true;
if (segment(4) != '') {
    $isNew = false;
    if ($check_action != 'submenu_add') {
        $submenu_name = $submenus->name;
        $submenu_slug = $submenus->slug;
    }else{
        $submenu_name=NULL;
        $submenu_slug=NULL;
    }
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">


            </div><!-- /.box-header -->
            <div class="box-body">
                <form action="" method="post" class="forms" enctype="multipart/form-data">                  
                    
                    <table class="table table-bordered">
                        <tbody>                        
                            <tr>
                                <td>
                                    <label>Sub Menu Name <span class="text-danger">*</span></label>
                                    <input type="text" placeholder="Enter sub menu name" class="form-control required" name="name" value="<?php echo!$isNew ? $submenu_name : '' ?>" required="">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>URL<span class="text-danger">*</span></label>
                                    <input type="text" placeholder="Enter full URL" class="form-control required" name="slug" value="<?php echo!$isNew ? $submenu_slug : '' ?>">
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