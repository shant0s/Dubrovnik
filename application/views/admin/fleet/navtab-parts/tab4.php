<div class="row box-body">
    <div id="add-success-indicator" style="display: none">
        <div class="alert alert-success">
            <strong>Successfully Saved!</strong>
        </div>
    </div>

    <div class="col-md-4">
        <label class="control-label">Card fee / Merchant fee / Paypal fee<span class="text-danger">*</span></label>
        <div class="col-md-12">
            <input type="text" name="card_fee" class="form-control"
                   value="<?php echo ($is_edit && $additional_rate) ? $additional_rate->card_fee : '' ?>">
            <label class="radio-inline">
                <input type="radio" name="card_fee_type"
                       value="<?php echo ($is_edit) ? 'By_Amount' : '' ?>" <?php echo ($is_edit && $additional_rate) ? (($additional_rate->card_fee_type == 'By_Amount') ? 'checked' : '') : '' ?>
                       id="amount">By Amount(<?= CURRENCY ?>)
            </label>
            <label class="radio-inline">
                <input type="radio" name="card_fee_type"
                       value="<?php echo ($is_edit) ? 'By_Percentage' : '' ?>" <?php echo ($is_edit && $additional_rate) ? (($additional_rate->card_fee_type == 'By_Percentage') ? 'checked' : '') : '' ?>
                       id="percentage">By Percentage(%)
            </label>

        </div>
    </div>

    <div class="col-md-3">
        <label class="control-label">Baby Seaters / Boosters<span class="text-danger">*</span></label>
        <div class="input-group">
            <span class="input-group-addon"><?= CURRENCY ?></span>
            <input type="text" name="baby_seater" class="form-control"
                   value="<?php echo ($is_edit && $additional_rate) ? $additional_rate->baby_seater : '' ?>"
            >
            <span class="input-group-addon">per seater</span>
        </div>
    </div>

    <div class="col-md-2">
        <label class="control-label">Airport pickup fee<span class="text-danger">*</span></label>
        <div class="input-group">
            <span class="input-group-addon"><?= CURRENCY ?></span>
            <input type="text" name="airport_pickup_fee" class="form-control"
                   value="<?php echo ($is_edit && $additional_rate) ? $additional_rate->airport_pickup_fee : '' ?>"
            >
        </div>
    </div>

    <div class="col-md-2">
        <label class="control-label">Round Trip Discount<span class="text-danger">*</span></label>
        <div class="input-group">
            <input type="text" name="round_trip" class="form-control"
                   value="<?php echo ($is_edit && $additional_rate) ? $additional_rate->round_trip : '' ?>">
            <span class="input-group-addon">%</span>
        </div>
    </div>
    <div class="col-md-2">
        <label class="control-label">Meet $ Greet<span class="text-danger">*</span></label>
        <div class="input-group">
            <span class="input-group-addon"><?= CURRENCY ?></span>
            <input type="text" name="meet_and_greet" class="form-control"
                   value="<?php echo ($is_edit && $additional_rate) ? $additional_rate->meet_and_greet : '' ?>">
        </div>
    </div>
</div>
<div class="panel-group login-box-body">
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="rush-hour">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#add-rush-hour"
                   aria-expanded="false" aria-controls="add-rush-hour">
                    Google Miles Rate
                </a>
            </h4>
        </div>
        <div id="add-rush-hour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="rush-hour">
            <div class="panel-body" id="ajax-google-miles-rate">
            </div>
        </div>
    </div>
</div>
