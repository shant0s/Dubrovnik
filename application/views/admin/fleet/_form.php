<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Fleet Manager | <?php echo ($is_edit) ? 'Add' : 'Update' ?></h3>

            </div><!-- /.box-header -->
            <div class="box-body">
                <form action="" method="post" class="forms" enctype="multipart/form-data">
                    <table class="table table-bordered">
                        <tr>
                            <td>
                                <label>Vehicle Name <span class="text-danger">*</span></label>
                                <input class="form-control required" type="text" name="title" placeholder="Enter name of Vehicle" value="<?php echo (!$is_edit) ? $fleet->title : '' ?>" required="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Passengers <span class="text-danger">*</span></label>
                                <input class="form-control required" type="text" name="passengers" placeholder="Enter passenger limit" value="<?php echo (!$is_edit) ? $fleet->passengers : '' ?>" required="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Suitcases <span class="text-danger">*</span></label>
                                <input class="form-control required" type="text" name="suitcases" placeholder="Enter suitcase limit" value="<?php echo (!$is_edit) ? $fleet->suitcases : '' ?>" required="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Luggage <span class="text-danger">*</span></label>
                                <input class="form-control required" type="text" name="luggage" placeholder="Enter luggage limit" value="<?php echo (!$is_edit) ? $fleet->luggage : '' ?>" required="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Baby Seats <span class="text-danger">*</span></label>
                                <input class="form-control required" type="text" name="baby_seats" placeholder="Enter baby seat limit" value="<?php echo (!$is_edit) ? $fleet->baby_seats : '' ?>" required="">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Vehicle Description <span class="text-danger">*</span></label>
                                <textarea name="desc" placeholder="Enter Vehicle description" class="form-control"><?php echo (!$is_edit) ? $fleet->desc : '' ?></textarea>
                            </td>
                        </tr>                  
                        <tr>
                            <td>
                                <div class="row">    
                                    <div class="col-md-5">
                                        <label>Vehicle Image <span class="text-danger">*</span></label>
                                        <input class="<?php echo ($is_edit) ? 'required' : '' ?>" type="file" name="img_name">
                                        <?php if (!$is_edit) { ?>
                                            <div>
                                                <img src="<?php echo base_url('uploads/fleet/' . $fleet->img_name) ?>" width="100%">
                                            </div>
                                        <?php } ?>
                                    </div>
<!--                                    <div class="col-md-4" style="float:right;">
                                        <div class="alert alert-info">
                                            <h3><span class="label label-default">Information</span></h3>
                                             <p>
                                                Formula:
                                            </p>
                                            <p>
                                                Fare = Base Fare+(Distance-Minimum miles)*Rate per mile+(Duration*Rate per minute)
                                            </p>
                                            <p>
                                                If Fare value is greater than Minimum Fare then Fare value is taken.                                           
                                                If not then Minimum Fare is taken
                                            </p> 

                                        </div>
                                    </div>-->
                                </div>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="input-group">
                                    <label>Raise Percentage<span class="text-danger">*</span></label>
                                    <input type="text" name="raise_by" placeholder="Enter Raise Percentage" class="form-control" value="<?php echo (!$is_edit) ? $fleet->raise_by : '' ?>" required="">                                    
                                </div>                            
                            </td>
                        </tr>                      
                        <tr>
                            <td colspan="2">
                                <input class="btn btn-primary" type="submit" value="Save">
                            </td>
                        </tr>
                    </table>
                </form>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div><!-- /.row -->

<!--<script>
    function toggle_charge(type) {
        if (type == 1) {
            $('#charge').hide();
        } else {
            $('#charge').show();
        }
    }
</script>