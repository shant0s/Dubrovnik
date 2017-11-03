<div class="login-box-body">
    <label>Vehicle Image <span class="text-danger">*</span></label>
    <input class="<?php echo ($is_edit) ? 'required' : '' ?>" type="file" name="img_name">
    <div class="login-box-body">
        <?php if ($is_edit) { ?>
            <div>
                <img src="<?php echo base_url('uploads/fleet/' . $fleet->img_name) ?>" width="250px">
            </div>
        <?php } ?>
    </div>
</div>