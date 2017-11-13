<div id="holiday-rate-success-indicator" style="display: none">
    <div class="alert alert-success">
        <strong>Successfully Saved!</strong>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="pull-right">
            <a href="#!" class="btn btn-flat btn-success" id="btn-add-holiday-rate"><i class="fa fa-plus"></i> Add</a>
        </div>
        <table class="table table-striped datatable-tb">
            <thead>
            <tr>
                <th width="3%">#</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Charge</th>
                <th>Shift</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php if ($holiday_rates): foreach ($holiday_rates as $index => $rate): ?>
                <tr class="rush-hour-charge">
                    <input type="hidden" name="holiday_rate_id" class="form-control holiday-rate-id"
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
<div id="modal-holiday-rate-add-edit" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Google Miles Rate | Add/Edit</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="holiday_rate_id">
                <div class="form-group">
                    <label>Start Date</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="text" class="form-control datepicker" name="start_time" value="">
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
                        <input type="text" class="form-control" name="end_date" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label>End Time</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                        <input type="text" class="form-control" name="end_time" value="">
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
                <button type="button" class="btn btn-primary" id="btn-save-rate">Save Rate</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    $(document).ready(function () {
        var modal_holiday_rate_add_edit = $('#modal-holiday-rate-add-edit');
        $('.datatable-tb').dataTable();
        $('.timepicker').timepicker();

        $('#btn-add-holiday-rate').click(function () {
            modal_holiday_rate_add_edit.find('[name=holiday_rate_id]').val('');
            modal_holiday_rate_add_edit.modal();
        });

    });
</script>