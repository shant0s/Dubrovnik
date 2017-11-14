<?php $count = segment(4) + 1; ?>
<div class="row">
    <div class="col-md-12">
        <?php flash() ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Client Information</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table class="table table-striped" id="dt-table">
                    <thead>
                    <tr>
                        <th style="width: 5px">#</th>
                        <th>Booking Ref.ID</th>
                        <th>Journey Details</th>
                        <th>Contact Details</th>
                        <th>Amount</th>
                        <th>Payment</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (!empty($booking_infos)) :
                        foreach ($booking_infos as $booking_info) :
                            ?>
                            <tr>
                                <td><?php
                                    echo $count;
                                    $count++;
                                    ?></td>
                                <td><?php echo $booking_info->booking_ref_id ?></td>
                                <td>
                                    <strong> Pickup Address:</strong> <?php echo $booking_info->pickup_address ?><br>
                                    <strong> Dropoff Address:</strong> <?php echo $booking_info->dropoff_address ?><br>
                                    <strong> Pickup
                                        Date/Time.:</strong> <?php echo $booking_info->pickup_date . " / " . $booking_info->pickup_time ?>
                                    <br>
                                    <strong>
                                        Type:</strong> <?php echo ucwords(str_replace('_', " ", $booking_info->journey_type)) ?>
                                    <br>
                                </td>
                                <td>
                                    <strong> Name:</strong> <?php echo $booking_info->client_name ?><br>
                                    <strong> Email:</strong> <?php echo $booking_info->client_email ?><br>
                                    <strong> Phone No.:</strong> <?php echo $booking_info->client_phone ?><br>
                                    <strong>Address:</strong> <?php echo $booking_info->client_address ?>
                                </td>
                                <td><?php echo CURRENCY . $booking_info->total_fare ?></td>
                                <td class="text-center">
                                    <span class="label label-primary"><?=ucwords($booking_info->pay_method) ?></span><br>
                                    <span class="label label-<?= $booking_info->is_paid?'success':'danger' ?>"><?= $booking_info->is_paid?'Paid':'Not Paid' ?></span>
                                </td>
                                <td>
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-info dropdown-toggle"
                                                data-toggle="dropdown" aria-expanded="false">Action
                                            <span class="fa fa-caret-down"></span></button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="<?php echo site_url('admin/booking/view/' . $booking_info->id) ?>">View
                                                    More</a></li>
                                            <li>
                                                <a href="<?php echo base_url('admin/booking/delete/' . $booking_info->id) ?>"
                                                   onclick="return confirm('Are you sure?')">Delete</a></li>
                                            <li>
                                                <a href="<?php echo base_url('admin/booking/mark_as_paid/' . $booking_info->id) ?>"
                                                   onclick="return confirm('Are you sure?')">Mark As Paid</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        endforeach;
                        ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div><!-- /.box-body -->

        </div><!-- /.box -->
    </div>
</div><!-- /.row -->
<script>
    $(document).ready(function () {
        $('#dt-table').dataTable();
    });
</script>