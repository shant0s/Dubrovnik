<?php $count = segment(4) + 1; ?>  
<div class="row">
    <div class="col-md-12">
        <?php flash() ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Client Information</h3>                
            </div><!-- /.box-header -->            
            <div class="box-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th style="width: 40px">#</th>
                            <th>Booking Ref.ID</th>                                         
                            <th>Journey Details</th>                                         
                            <th>Contact Details</th>                                         
                            <th>Amount</th>
                            <th style="width: 100px">Payment By</th>
                            <th style="width: 150px">Action</th>
                        </tr>                                                                        
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
                                        <?php if ($booking_info->via_point): ?>
                                            <strong>Via point:</strong> <?php echo $booking_info->via_point ?>
                                        <?php endif; ?>
                                        <strong>  Dropoff Address:</strong> <?php echo $booking_info->dropoff_address ?><br>
                                        <strong> Pickup Date/Time.:</strong> <?php echo $booking_info->pickup_date . " / " . $booking_info->pickup_time ?><br>
                                        <strong> Type:</strong> <?php echo ucwords(str_replace('_', " ", $booking_info->journey_type)) ?><br>
                                    </td>
                                    <td>
                                        <strong> Name:</strong> <?php echo $booking_info->client_name ?><br>                                    
                                        <strong>  Email:</strong> <?php echo $booking_info->client_email ?><br>
                                        <strong> Phone No.:</strong> <?php echo $booking_info->client_phone ?><br>
                                        <strong>Address:</strong> <?php echo $booking_info->client_address ?>
                                    </td>
                                    <td><?php echo CURRENCY. $booking_info->total_fare ?></td>
                                    <td><?php echo $booking_info->pay_method ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-info" href="<?php echo site_url('admin/booking/view/' . $booking_info->id) ?>">View More</a>
                                        <a class="btn btn-sm btn-danger" href="<?php echo base_url('admin/booking/delete/' . $booking_info->id) ?>" onclick="return confirm('Are you sure?')">Delete</a>
                                    </td>
                                </tr>
                                <?php
                            endforeach;
                        else:
                            ?>
                            <tr>
                                <td>No data</td>
                                <td>No data</td>
                                <td>No data</td>
                                <td>No data</td>
                                <td>No data</td>
                                <td>No data</td>
                                <td>No data</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div><!-- /.box-body -->

        </div><!-- /.box -->
    </div>
</div><!-- /.row -->
