<?php
$isNew = true;
if (segment(4) != '') {
    $isNew = false;
}
?>

<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-md-12">
        <?php flash() ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Fare Breakdown | <?php echo $isNew ? 'Add' : 'Update' ?></h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="col-md-6">
                    <form class="forms" action="" method="post">
                        <table class="table-bordered table">
                            <tr>
                                <td>
                                    <label>Start <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="<?php echo !$isNew ? $fare_breakdowns->start : '' ?>" name="start" <?php echo (segment(4)==2)? 'disabled=""':'';?>>
                                        <span class="input-group-addon">mile</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>End <span class="text-danger">*</span></label>
                                    <div class="input-group">                                                                              
                                        <input type="text" class="form-control" value="<?php echo !$isNew ? $fare_breakdowns->end : '' ?>" name="end">
                                        <span class="input-group-addon">mile</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Amount <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><?=CURRENCY?></span>
                                        <input type="text" class="form-control" value="<?php echo !$isNew ? $fare_breakdowns->rate : '' ?>" name="rate">
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
                </div>

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div><!-- /.row -->