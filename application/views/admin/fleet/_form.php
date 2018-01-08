<div class="row">
    <div class="col-md-12">
        <div class="box">
            <form action="" method="post" class="forms" enctype="multipart/form-data">
            <div class="box-header">
                <h3 class="box-title">Fleet | <?php echo ($is_edit) ? 'Update' : 'Add' ?></h3>
                <div class="pull-right">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Save</button>
                </div>
            </div><!-- /.box-header -->

            <div class="box-body">
<!--                <ul class="nav nav-tabs" role="tablist">-->
<!--                    <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">General Info</a></li>-->
<!--                    <li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">Photos</a></li>-->
<!--                    <li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">Rates</a></li>-->
<!--                    <li role="presentation"><a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab">Additional Rates</a></li>-->
<!--                </ul>-->

                <!-- Tab panes -->
                <div class="row box-body">
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

            </div><!-- /.box-body -->
            </form>
        </div><!-- /.box -->
    </div>
</div><!-- /.row -->
