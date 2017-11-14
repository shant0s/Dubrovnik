<div id="rush-hr-success-indicator" style="display: none">
    <div class="alert alert-success">
        <strong>Successfully Saved!</strong>
    </div>
</div>
<?php flash()?>
<div class="row">
    <div class="col-md-12">
        <div class="pull-right">
        </div>
        <table class="table table-striped datatable-tb">
            <thead>
            <tr>
                <th width="3%">#</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Charge</th>
                <th>Status</th>
                <th>Shift</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php if ($rush_hour): foreach ($rush_hour as $index => $rate): ?>
                <tr class="rush-hour-charge">
                    <input type="hidden" name="rush_hrs_id" class="form-control rush-hrs-id"
                           value="<?= $rate->id ?>">
                    <td>
                        <?= ++$index ?>
                    </td>
                    <td>
                        <input type="text" name="start_time" class="form-control start-time timepicker"
                               value="<?= $rate->start_time ?>">
                    </td>
                    <td>
                        <input type="text" name="end_time" class="form-control end-time timepicker"
                               value="<?= $rate->end_time ?>">

                    </td>
                    <td>
                        <div class="input-group rate-change"><span class="input-group-addon"><?= CURRENCY ?></span>
                            <input type="text" name="charge" class="form-control charge"
                                   value="<?= $rate->charge ?>">
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                         <select class="form-control status" name="status">
                             <option value="<?= $rate->status ?>"><?=$rate->status?'Active':'Inactive'?></option>
                             <option value="1">Active</option>
                             <option value="0">Inactive</option>
                         </select>
                        </div>
                    </td>
                    <td>
                        <input type="hidden" name="shift" class="form-control shift" value="<?= $rate->shift ?>">
                        <?= $rate->shift ?>
                    </td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                Action <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="#!" class="btn-save-rush-hour"><i class="fa fa-save"></i> Save</a></li>
                                <!--                                    <li><a  class="btn-delete-rate" href="#!" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i> Delete</a></li>-->
                            </ul>
                        </div>
                    </td>
                </tr>
                <?php
            endforeach;
            endif;
            ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.datatable-tb').dataTable();
        $('.timepicker').timepicker();
        $('.btn-save-rush-hour').click(function () {
            var start_time = $(this).parents('.rush-hour-charge').find('.start-time').val();
            var end_time = $(this).parents('.rush-hour-charge').find('.end-time').val();
            var charge = $(this).parents('.rush-hour-charge').find('.charge').val();
            var shift = $(this).parents('.rush-hour-charge').find('.shift').val();
            var rush_hrs_id = $(this).parents('.rush-hour-charge').find('.rush-hrs-id').val();
            var status = $(this).parents('.rush-hour-charge').find('.status').val();

            $.ajax({
                type: 'POST',
                url: '<?= site_url('admin/fleet_manager/ajaxPostRushHoursCharge') ?>',
                dataType: 'json',
//                context: this,
                data: {
                    'start_time': start_time,
                    'end_time': end_time,
                    'fleet_id': fleet_id,
                    'rush_hrs_id': rush_hrs_id,
                    'shift': shift,
                    'charge': charge,
                    'status': status
                },
                success: function (response) {
                    if (response.status) {
//                        $("#rush-hr-success-indicator").fadeIn(100).delay(1000).fadeOut();
                        load_ajax_view_rush_hour_rate();
                    }

                }
            });
        });
    });
</script>
