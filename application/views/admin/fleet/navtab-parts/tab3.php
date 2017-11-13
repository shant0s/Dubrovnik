<div class="panel-group login-box-body" id="accordion" role="tablist" aria-multiselectable="true">
    <div id="success-indicator" style="display: none">
        <div class="alert alert-success">
            <strong>Successfully Saved!</strong>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="heading3">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="true"
                   aria-controls="collapse3">
                    Zone Rates (Flat rates)
                </a>
            </h4>
        </div>
        <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
            <div class="panel-body">
                <div class="form-group">
                    <a href="<?= site_url('admin/zone_manager') ?>" class="btn btn-success" target="_blank"><i
                                class="fa fa-map-marker"></i> Manage Coverage Zones</a>
                </div>
                <div class="form-group">
                    <label>Manage rate for zone (From)</label>
                    <select class="form-control" id="from-zone">
                        <option value="">- select zone -</option>
                        <?php
                        if ($zones):
                            foreach ($zones as $zone):
                                ?>
                                <option value="<?= $zone->id ?>"><?= $zone->name ?></option>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <div id="ajax-zone-rates"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="heading4">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse4"
                   aria-expanded="false" aria-controls="collapse4">
                    Google Miles Rate
                </a>
            </h4>
        </div>
        <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
            <div class="panel-body" id="ajax-google-miles-rate">
            </div>
        </div>
    </div>
</div>
<script>

    var fleet_id =<?= $fleet->id ?>;
    var SITE_URL = '<?= site_url() ?>';
    $(document).ready(function () {

        load_ajax_view_google_miles_rate();

        $('#from-zone').change(function () {
            load_ajax_view_zone_rates($(this).val());
        });

    });

    function load_ajax_view_google_miles_rate() {
        $.ajax({
            url: SITE_URL + "admin/fleet_manager/ajax_google_miles_rate/" + fleet_id,
            dataType: 'json',
            success: function (response) {

                if (!response.status) {
                    alert(response.message);
                    return;
                }

                $('#ajax-google-miles-rate').html(response.data.html);

            }
        });
    }

    function load_ajax_view_zone_rates(from_id) {

        if (!from_id) {
            return;
        }

        $('#ajax-zone-rates').html('<span class="fa fa-spinner fa-spin"></span>');

        $.ajax({
            type: 'POST',
            url: '<?= site_url('admin/fleet_manager/ajaxZonerate') ?>',
            dataType: 'json',
            data: {
                'from_id': from_id,
                'fleet_id': fleet_id
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                var response_data = response.data;
                if (response.status) {
                    var locationsTable = "";
                    locationsTable +=
                        '<table id="example1" class="table table-bordered table-striped">'
                        + '<thead>'
                        + '<tr>'
                        + '<th width="5%">S.N.</th>'
                        + '<th width="30%"><strong class="box-title" id="route-information"></strong></th>'
                        + '<th width="50%">To<br><span class="route-information"></span></th>'
                        + '</tr>'
                        + '</thead>'
                        + '<tbody>';

                    for (var i = 0; i < response_data.length; i++) {
                        locationsTable += '<tr>';
                        locationsTable += '<td>' + (i + 1) + '</td>';
                        locationsTable += '<td>' + response_data[i].name + '</td>';
                        locationsTable += '<td><div class="input-group rate-change"><span class="input-group-addon"><?=CURRENCY?></span><input type="text" class="form-control rate" data-from-id="' + from_id + '" data-to-id="' + response_data[i].id + '" value="' + response_data[i].rate + '"><span class="input-group-addon"><select class="rate_type">'

                        var rate_types = ['per_mile', 'fix'];
                        $.each(rate_types, function (index, rate_type) {
                            locationsTable += '<option value="' + rate_type + '" ' + (response_data[i].rate_type == rate_type ? 'selected' : '') + '>' + rate_type + '</option>';
                        });
                        locationsTable += '</select></span>';
                        locationsTable += '<span class="input-group minimum_fare"><span class="input-group-addon"><?=CURRENCY?></span><input type="text" class="form-control minimum_rate" value="' + response_data[i].minimum_rate + '"><span class="input-group-addon">minimum fare</span></span>'
                        locationsTable += '</div></td>'
                    }

                    locationsTable += '</tbody>'
                        + '<tfoot>'
                        + '<tr>'
                        + '</tr>'
                        + '</tfoot>'
                        + '</table>';
                    $('#ajax-zone-rates').html(locationsTable);
                    $('.rate,.rate_type,.minimum_rate').change(function () {
                        var rate = $(this).parents('.rate-change').find('.rate').val();
                        var minimum_rate = $(this).parents('.rate-change').find('.minimum_rate').val();
                        var rate_type = $(this).parents('.rate-change').find('.rate_type :selected').val();
                        var from_id = $(this).parents('.rate-change').find('.rate').attr('data-from-id');
                        var to_id = $(this).parents('.rate-change').find('.rate').attr('data-to-id');
                        $.ajax({
                            type: 'POST',
                            url: '<?= site_url('admin/fleet_manager/ajaxPostZoneRate') ?>',
                            dataType: 'json',
                            context: this,
                            data: {
                                'rate': rate,
                                'from_id': from_id,
                                'fleet_id': fleet_id,
                                'to_id': to_id,
                                'rate_type': rate_type,
                                'minimum_rate': minimum_rate
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function (response) {
                                if (response.status) {
                                    $("#success-indicator").fadeIn(100).delay(1000).fadeOut();
                                }

                            }
                        });
                    });
                } else {
                    $('#ajax-zone-rates').html('');
                }
            }
        });
    }

</script>