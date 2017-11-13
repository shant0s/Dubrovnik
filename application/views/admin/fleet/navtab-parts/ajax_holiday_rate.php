<?php flash()?>
<div class="row">
    <div class="col-md-12">
        <div class="pull-right">
            <a href="#!" class="btn btn-flat btn-success" id="btn-add-holiday-rate"><i class="fa fa-plus"></i> Add</a>
        </div>
        <table class="table table-striped datatable-tb">
            <thead>
            <tr>
                <th width="3%">#</th>
                <th>Start Date</th>
                <th>Start Time</th>
                <th>End Date</th>
                <th>End Time</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php if ($holiday_rates): foreach ($holiday_rates as $index => $rate): ?>
                <tr class="rush-hour-charge">
                    <input type="hidden" name="holiday_rate_id" class="form-control holiday-rate-id"
                           value="<?= $rate->id ?>">
                    <td><?= ++$index ?></td>
                    <td><?= $rate->starting_date ?></td>
                    <td><?= $rate->starting_time ?></td>
                    <td><?= $rate->ending_date ?></td>
                    <td><?= $rate->ending_time ?></td>
                    <td>
                        <?= $rate->is_active ? "<span class='label label-success'>Active</span>" : "<span class='label label-danger'>Inactive</span>"; ?>
                    </td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                Action <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a data-rate-id="<?= $rate->id ?>" href="#!" class="btn-edit-holiday-rate"><i class="fa fa-save"></i> Edit</a></li>
                                <li><a data-rate-id="<?= $rate->id ?>" class="btn-delete-holidate-rate" href="#!" onclick="return confirm('Are you sure?')"><i
                                                class="fa fa-trash"></i> Delete</a></li>
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
<div id="modal-holiday-rate-add-edit" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Holiday Charge | Add/Edit</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="holiday_rate_id">
                <div class="form-group">
                    <label>Start Date</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="text" class="form-control datepicker" name="start_date" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label>Start Time</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                        <input type="text" class="form-control timepicker" name="start_time" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label>End Date</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="text" class="form-control datepicker" name="end_date" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label>End Time</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                        <input type="text" class="form-control timepicker" name="end_time" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label>Status </label>
                    <div class="input-group">
                        <label class="radio-inline">
                            <input type="radio" name="is_active" value="1" required="">Active
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="is_active" value="0" required="">Inactive
                        </label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-save-holiday-rate">Save Rate</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>

    $(document).ready(function () {
        var modal_holiday_rate_add_edit = $('#modal-holiday-rate-add-edit');
        $('.datatable-tb').dataTable();
        $('.timepicker').timepicker();
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            startDate: new Date(),
            autoclose: true,
            todayHighlight: true,
        });

        $('#btn-add-holiday-rate').click(function () {
            modal_holiday_rate_add_edit.find('[name=holiday_rate_id]').val('');
            modal_holiday_rate_add_edit.modal();
        });

        $('#btn-save-holiday-rate').click(function () {
            $.ajax({
                url: SITE_URL + "admin/fleet_manager/AjaxSaveHolidayRate",
                data: {
                    holiday_rate_id: modal_holiday_rate_add_edit.find('[name=holiday_rate_id]').val(),
                    fleet_id: fleet_id,
                    start_date: modal_holiday_rate_add_edit.find('[name=start_date]').val(),
                    start_time: modal_holiday_rate_add_edit.find('[name=start_time]').val(),
                    end_date: modal_holiday_rate_add_edit.find('[name=end_date]').val(),
                    end_time: modal_holiday_rate_add_edit.find('[name=end_time]').val(),
                    is_active: modal_holiday_rate_add_edit.find('[name=is_active]').val(),
                },
                method: 'post',
                dataType: 'json',
                success: function (response) {
                    if (!response.status) {
                        alert(response.message);
                        return;
                    }
                    modal_holiday_rate_add_edit.modal('hide');
                    $('.modal-backdrop').remove();
                    load_ajax_view_holiday_rate();

                }
            });
        });

        $('.btn-edit-holiday-rate').click(function () {

            var rate_id = $(this).attr('data-rate-id');

            $.ajax({
                url: SITE_URL + "admin/fleet_manager/AjaxHolidayRate/" + rate_id,
                dataType: 'json',
                success: function (response) {
                    if (!response.status) {
                        alert(response.msg);
                        return;
                    }

                    modal_holiday_rate_add_edit.find('[name=holiday_rate_id]').val(response.data.id);
                    modal_holiday_rate_add_edit.find('[name=start_date]').val(response.data.starting_date);
                    modal_holiday_rate_add_edit.find('[name=start_time]').val(response.data.starting_time);
                    modal_holiday_rate_add_edit.find('[name=end_date]').val(response.data.ending_date);
                    modal_holiday_rate_add_edit.find('[name=end_time]').val(response.data.ending_time);
//                    modal_holiday_rate_add_edit.find('[name=is_active]').val(response.data.is_active);

                    modal_holiday_rate_add_edit.modal();
                }
            });

        });

        $('.btn-delete-holidate-rate').click(function () {

            var rate_id = $(this).attr('data-rate-id');
            $.ajax({
                url: SITE_URL + "admin/fleet_manager/AjaxDeleteHolidayRate/" + rate_id,
                dataType: 'json',
                success: function (response) {
                    if (!response.status) {
                        alert(response.message);
                        return;
                    }

                    load_ajax_view_holiday_rate();
                }
            });


        });

    });
</script>