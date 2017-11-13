<div class="row box-body">
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
                    RUSH HOUR CHARGE
                </a>
            </h4>
        </div>
        <div id="add-rush-hour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="rush-hour">
            <div class="panel-body" id="ajax-rush-hour-rate">
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="holiday-rate">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#add-holiday-rate"
                   aria-expanded="false" aria-controls="add-rush-hour">
                    HOLIDAY CHARGE
                </a>
            </h4>
        </div>
        <div id="add-holiday-rate" class="panel-collapse collapse" role="tabpanel" aria-labelledby="holiday-rate">
            <div class="panel-body" id="ajax-holiday-rate">
            </div>
        </div>
    </div>
</div>

<script>
    var fleet_id = '<?= isset($fleet->id) ? $fleet->id : '' ?>';
    var SITE_URL = '<?= site_url() ?>';
    $(document).ready(function () {
        load_ajax_view_rush_hour_rate();
        load_ajax_view_holiday_rate();
    });

    function load_ajax_view_rush_hour_rate() {
        $.ajax({
            url: SITE_URL + "admin/fleet_manager/ajax_rush_hour_rate_view/" + fleet_id,
            dataType: 'json',
            success: function (response) {

                if (!response.status) {
                    $('#ajax-rush-hour-rate').html("<div class='alert alert-info'><i class='fa fa-info-circle'></i> Please add rest of the info & save the fleet in order to manage rush hour charge.</div>");
                    return;
                }
                $('#ajax-rush-hour-rate').html(response.data.html);

            }
        });
    }
    function load_ajax_view_holiday_rate() {
        $.ajax({
            url: SITE_URL + "admin/fleet_manager/ajax_holiday_rate_view/" + fleet_id,
            dataType: 'json',
            success: function (response) {

                if (!response.status) {
                    $('#ajax-holiday-rate').html("<div class='alert alert-info'><i class='fa fa-info-circle'></i> Please add rest of the info & save the fleet in order to manage rush hour charge.</div>");
                    return;
                }
                $('#ajax-holiday-rate').html(response.data.html);

            }
        });
    }
</script>