
<?php flash(); ?>
<div class="col-md-12">
    <div class="box">
        <div class="box-header with-border">                
            <h3 class="box-title">Zone Rate <strong>(*minimum fare only applies to per_mile rate*)</strong></h3>
        </div>
        <div class="box-header">
            <div class="col-md-6">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="from_id">From*</label>
                        <select name="from_id" id="from_id" class="form-control" required="">
                            <option value>-Select From Zone</option>
                            <?php foreach ($zone_data as $data): ?>
                                <option value="<?= $data->id ?>"><?= $data->name ?></option>                                
                            <?php endforeach; ?>                   
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="from_id">(Get Zone Rate*)</label>
                    <button class="btn btn-primary" type="button" id="btn_zones"><i class="fa fa-cogs"></i> Manage Rates</button>
                </div>
            </div>            
        </div>
        <div class="box-body spinner-wrap">              
            <div id="spinner">                                    
                <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
            </div>
            <div class="box-body" id="locations-table">
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#spinner').hide();
        $('#btn_zones').click(function () {
            $('#spinner').show();
            var from_id = $('[name=from_id]').val();
//            alert(from_id);
            $.ajax({
                type: 'POST',
                url: '<?= site_url('admin/zone_manager/ajaxZonerate') ?>',
                dataType: 'json',
                data: {
                    'from_id': from_id
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
                        $('#locations-table').html(locationsTable);
                        $('.rate,.rate_type,.minimum_rate').change(function () {
                            var rate = $(this).parents('.rate-change').find('.rate').val();
                            var minimum_rate = $(this).parents('.rate-change').find('.minimum_rate').val();
                            var rate_type = $(this).parents('.rate-change').find('.rate_type :selected').val();
                            var from_id = $(this).parents('.rate-change').find('.rate').attr('data-from-id');
                            var to_id = $(this).parents('.rate-change').find('.rate').attr('data-to-id');
                            $.ajax({
                                type: 'POST',
                                url: '<?= site_url('admin/zone_manager/ajaxPostZoneRate') ?>',
                                dataType: 'json',
                                context: this,
                                data: {
                                    'rate': rate,
                                    'from_id': from_id,
                                    'to_id': to_id,
                                    'rate_type': rate_type,
                                    'minimum_rate': minimum_rate
                                },
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                success: function (response) {
                                    var response_data = response.success;
                                    if (response_data == "true") {
                                        $("#success-indicator").fadeIn(100).delay(1000).fadeOut();
                                    }

                                }
                            });
                        });
                        $('#locations-table').show();
                    } else {
                        $('#locations-table').hide();
                    }
                    $('#spinner').hide();
                }
            });
        });

    });
</script>