<?php
$isNew = false;
if (segment(4) != '') {
    $isNew = true;
}
?>
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-md-12">
        <?php flash() ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Base Fare | <?php echo ($isNew) ? 'Add' : 'Update' ?></h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="col-md-6">
                    <form class="forms" action="<?php echo base_url('admin/rate_manager/base_fare/') ?>" method="post">
                        <table class="table-bordered table">
                            <tr>
                                <td>
                                    <label>Start <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" disabled value="0">
                                        <span class="input-group-addon">mile</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>End <span class="text-danger">*</span></label>
                                    <div class="input-group">                                                                              
                                        <input type="text" class="form-control" value="<?php echo $base_fare->end ?>" name="end">
                                        <span class="input-group-addon">mile</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Amount <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><?=CURRENCY?></span>
                                        <input type="text" class="form-control" value="<?php echo $base_fare->rate ?>" name="amount">
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