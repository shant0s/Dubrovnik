<?php flash() ?>
<div class="row">
    <div class="col-md-4">
        <h4><u>Base Fare</u></h4>
        
        <input type="hidden" id="base-rate-id" value="<?= $base_rate ? $base_rate->id : '' ?>">
        <div class="form-group">
            <label>From</label>
            <div class="input-group">
                <input type="text" class="form-control" value="0" disabled>
                <span class="input-group-addon">mile</span>                                        
            </div>
        </div>
        <div class="form-group">
            <label>To</label>
            <div class="input-group">
                <input type="text" id="base-rate-end" class="form-control" value="<?= $base_rate ? $base_rate->end : '' ?>">
                <span class="input-group-addon">miles</span>
            </div>
        </div>
        <div class="form-group">
            <label>Fix base amount</label>
            <div class="input-group">
                <span class="input-group-addon">£</span>
                <input type="text" id="base-rate-rate" class="form-control" value="<?= $base_rate ? $base_rate->rate : '' ?>">
            </div>
        </div>
        <button id="btn-save-base-rate" type="button" class="btn btn-success">Save base rate</button>
    </div>
    <div class="col-md-8">
        <h4 class="btn-block"><u>Fare Breakdown</u>
            <div class="pull-right">
                <a href="#!" class="btn btn-sm btn-success" id="btn-add-rate"><i class="fa fa-plus"></i> Add new rate</a>
            </div>
        </h4>
        <br>
        <table class="table table-bordered" id="datatable-google-miles-rate">
            <thead>
                <tr>
                    <th width="3%">#</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Rate/Mile</th>
                    <th width="5%">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($rates): foreach ($rates as $index => $rate): ?>
                        <tr>
                            <td><?= ++$index ?></td>
                            <td><?= $rate->start ?> miles</td>
                            <td><?= $rate->end ?> miles</td>
                            <td><?= CURRENCY . $rate->rate ?>/mile</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a data-rate-id="<?= $rate->id ?>" href="#!" class="btn-edit-rate"><i class="fa fa-edit"></i> Edit</a></li>
                                        <li><a data-rate-id="<?= $rate->id ?>" class="btn-delete-rate" href="#!" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i> Delete</a></li>
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

<div id="modal-rate-add-edit" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Google Miles Rate | Add/Edit</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="rate_id">
                <div class="form-group">
                    <label>Start</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="start" value="">
                        <span class="input-group-addon">mile(s)</span>
                    </div>
                </div>
                <div class="form-group">
                    <label>End</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="end" value="">
                        <span class="input-group-addon">mile(s)</span>
                    </div>
                </div>
                <div class="form-group">
                    <label>Rate</label>
                    <div class="input-group">
                        <span class="input-group-addon"><?= CURRENCY ?></span>
                        <input type="text" class="form-control" name="rate" value="">
                        <span class="input-group-addon">/mile</span>
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

    var fleet_id = <?= $fleet->id ?>;
    var SITE_URL = '<?= site_url() ?>';

    $(document).ready(function () {

        var modal_rate_add_edit = $('#modal-rate-add-edit');
        $('#datatable-google-miles-rate').dataTable();


        $('#btn-add-rate').click(function () {
            modal_rate_add_edit.find('[name=rate_id]').val('');
            modal_rate_add_edit.modal();
        });

        $('.btn-edit-rate').click(function () {

            var rate_id = $(this).attr('data-rate-id');

            $.ajax({
                url: SITE_URL + "admin/fleet_manager/ajax_google_rate/" + rate_id,
                dataType: 'json',
                success: function (response) {
                    if (!response.status) {
                        alert(response.msg);
                        return;
                    }

                    modal_rate_add_edit.find('[name=rate_id]').val(response.data.id);
                    modal_rate_add_edit.find('[name=start]').val(response.data.start);
                    modal_rate_add_edit.find('[name=end]').val(response.data.end);
                    modal_rate_add_edit.find('[name=rate]').val(response.data.rate);

                    modal_rate_add_edit.modal();

                }
            });

        });

        $('#btn-save-rate').click(function () {

            $.ajax({
                url: SITE_URL + "admin/fleet_manager/ajax_save_google_rate",
                data: {
                    rate_id: modal_rate_add_edit.find('[name=rate_id]').val(),
                    fleet_id: fleet_id,
                    is_min: 0,
                    start: modal_rate_add_edit.find('[name=start]').val(),
                    end: modal_rate_add_edit.find('[name=end]').val(),
                    rate: modal_rate_add_edit.find('[name=rate]').val(),
                },
                method: 'post',
                dataType: 'json',
                success: function (response) {
                    if (!response.status) {
                        alert(response.message);
                        return;
                    }

                    modal_rate_add_edit.modal('hide');
                    $('.modal-backdrop').remove();
                    load_ajax_view_google_miles_rate();
                }
            });


        });
        
        $('#btn-save-base-rate').click(function () {

            $.ajax({
                url: SITE_URL + "admin/fleet_manager/ajax_save_google_rate",
                data: {
                    rate_id: $('#base-rate-id').val(),
                    fleet_id: fleet_id,
                    is_min: 1,
                    start: 0,
                    end: $('#base-rate-end').val(),
                    rate: $('#base-rate-rate').val()
                },
                method: 'post',
                dataType: 'json',
                success: function (response) {
                    if (!response.status) {
                        alert(response.message);
                        return;
                    }

                    load_ajax_view_google_miles_rate();
                }
            });


        });

        $('.btn-delete-rate').click(function () {

            var rate_id = $(this).attr('data-rate-id');
            $.ajax({
                url: SITE_URL + "admin/fleet_manager/ajax_delete_google_rate/" + rate_id,
                dataType: 'json',
                success: function (response) {
                    if (!response.status) {
                        alert(response.message);
                        return;
                    }

                    load_ajax_view_google_miles_rate();
                }
            });


        });

    });



</script>