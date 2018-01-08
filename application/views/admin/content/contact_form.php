<?php
$isNew = true;
if ($this->uri->segment(4) != '') {
    $contact = $contact;
    $isNew = false;
//    $is_active = $banner->is_active;
}
?>
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Contact Manager | <?php echo ($isNew) ? 'Add' : 'Update' ?></h3>
                <span class="pull-right add-new">
                    <a href="<?php echo site_url('admin/content/add_update_contact') ?>" class="btn btn-success">Add New</a>
                </span>
            </div><!-- /.box-header -->
            <div class="box-body">
                <form action="" method="post" class="forms">
                    <input type="hidden" name="is_active" value="1">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>
                                    <label>Address<span class="text-danger">*</span></label>
                                    <textarea name="address" placeholder="Enter contact address" class="form-control required" id="address"><?php echo!$isNew ? $contact->address: '' ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Telephone<span class="text-danger">*</span></label>
                                    <input type="text" placeholder="Enter telephone" class="form-control required" name="telephone" value="<?php echo!$isNew ? $contact->telephone : '' ?>" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Mail 1<span class="text-danger">*</span></label>
                                    <input type="text" placeholder="Enter email address" class="form-control required" name="mail1" value="<?php echo!$isNew ? $contact->mail1 : '' ?>" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Mail 2<span class="text-danger">*</span></label>
                                    <input type="text" placeholder="Enter alternative email address" class="form-control required" name="mail2" value="<?php echo!$isNew ? $contact->mail2 : '' ?>" required>
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