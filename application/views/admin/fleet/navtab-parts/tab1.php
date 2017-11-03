<div class="row login-box-body">
    <div class="col-md-12">
        <label>Vehicle Name <span class="text-danger">*</span></label>
        <input class="form-control required" type="text" name="title" placeholder="Enter name of Vehicle"
               value="<?php echo ($is_edit) ? $fleet->title : '' ?>" required="">
    </div>
    <div class="col-md-3">
        <label>Passengers <span class="text-danger">*</span></label>
        <input class="form-control required" type="text" name="passengers" placeholder="Enter passenger limit"
               value="<?php echo ($is_edit) ? $fleet->passengers : '' ?>" required="">
    </div>
    <div class="col-md-3">
        <label>Suitcases <span class="text-danger">*</span></label>
        <input class="form-control required" type="text" name="suitcases" placeholder="Enter suitcase limit"
               value="<?php echo ($is_edit) ? $fleet->suitcases : '' ?>" required="">
    </div>
    <div class="col-md-3">
        <label>Luggage <span class="text-danger">*</span></label>
        <input class="form-control required" type="text" name="luggage" placeholder="Enter luggage limit"
               value="<?php echo ($is_edit) ? $fleet->luggage : '' ?>" required="">
    </div>
    <div class="col-md-3">
        <label>Baby Seats <span class="text-danger">*</span></label>
        <input class="form-control required" type="text" name="baby_seats" placeholder="Enter baby seat limit"
               value="<?php echo ($is_edit) ? $fleet->baby_seats : '' ?>" required="">
    </div>
    <div class="col-md-12">
        <label>Vehicle Description <span class="text-danger">*</span></label>
        <textarea name="desc" placeholder="Enter Vehicle description" rows="5"
                  class="form-control"><?php echo ($is_edit) ? $fleet->desc : '' ?></textarea>

    </div>
</div>
