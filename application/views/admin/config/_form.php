<?php
$isNew = true;
if (segment(4) != '') {
    $isNew = false;
    $username = $admins->username;
    $password = $admins->password;
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Admin User | <?php echo ($isNew) ? 'Add' : 'Update' ?></h3>

            </div><!-- /.box-header -->
            <div class="box-body">
                <form action="" method="post" class="forms" enctype="multipart/form-data">                                       
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>
                                    <label>Username<span class="text-danger">*</span></label>
                                    <input type="text" placeholder="Enter username" class="form-control" name="username" value="<?php echo (!$isNew) ? $username : ''; ?>" required=""/>                           
                                </td>
                            </tr>
                            <tr>
                                <td>

                                    <label>Password<span class="text-danger">*</span></label>
                                    <input type="password" placeholder="Enter password" class="form-control" name="password" value="<?php echo (!$isNew) ? $password : ''; ?>" required=""/>
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