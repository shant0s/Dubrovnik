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
                <h3 class="box-title">Additional Rate Manager | <?php echo ($isNew) ? 'Add' : 'Update' ?></h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <form class="forms" action="<?php echo base_url('admin/rate_manager/additional_rate/' . $additional_rate->id) ?>" method="post">
                    <table class="table-bordered table">
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="control-label">Card fee / Merchant fee / Paypal fee<span class="text-danger">*</span></label>
                                        <div class="col-md-12">                                           
                                            <input type="text" name="card_fee" class="form-control" value="<?php echo $additional_rate->card_fee ?>" name="customerCode" required="">
                                            <label class="radio-inline">
                                                <input type="radio" name="card_fee_type" value="<?php echo (!$isNew) ? 'By_Amount': '' ?>" <?php echo ($additional_rate->card_fee_type=='By_Amount') ? 'checked': '' ?> id="amount">By Amount(<?=CURRENCY?>)
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="card_fee_type" value="<?php echo (!$isNew) ? 'By_Percentage': '' ?>" <?php echo ($additional_rate->card_fee_type=='By_Percentage') ? 'checked': '' ?> id="percentage">By Percentage(%)                                               
                                            </label>    
                                            
                                        </div>                                      
                                    </div>

                                    <div class="col-md-3">
                                        <label class="control-label">Baby Seaters / Boosters<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><?=CURRENCY?></span>
                                            <input type="text" name="baby_seater" class="form-control" value="<?php echo (!$isNew) ? $additional_rate->baby_seater : '' ?>" required="">
                                            <span class="input-group-addon">per seater</span>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <label class="control-label">Airport pickup fee<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><?=CURRENCY?></span>
                                            <input type="text" name="airport_pickup_fee" class="form-control" value="<?php echo (!$isNew) ? $additional_rate->airport_pickup_fee : '' ?>" required="">
                                        </div>
                                    </div>
                                                                                                       
                                    <div class="col-md-2">
                                        <label class="control-label">Round Trip Discount<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="text" name="round_trip" class="form-control" value="<?php echo (!$isNew) ? $additional_rate->round_trip : '' ?>" required="">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="control-label">Meet $ Greet<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><?=CURRENCY?></span>
                                            <input type="text" name="meet_and_greet" class="form-control" value="<?php echo (!$isNew) ? $additional_rate->meet_and_greet : '' ?>" required="">
                                        </div>
                                    </div>
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
