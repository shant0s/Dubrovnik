<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-client_name">
                    <strong><?= $booking_infos->client_name ?></strong>'s Booking Details (BK.Ref.ID:<?= $booking_infos->booking_ref_id ?>)
                    <span class="pull-right add-new"><a href="<?= site_url('admin/booking') ?>" class="btn btn-info">Go Back</a></span>
                </h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <form action="" method="post" class="forms" enctype="multipart/form-data">
                    <table class="table table-bordered">
                        <h4>Personal Details</h4>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"> Name</i></span>
                                        <input type="text" name="client_name" class="form-control" value="<?php echo $booking_infos->client_name ?>" readonly="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone"> Phone Number</i></span>
                                        <input type="text" name="client_phone" class="form-control" value="<?php echo $booking_infos->client_phone ?>" readonly="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-map-marker"> Address</i></span>
                                        <input type="text" name="client_address" class="form-control" value="<?php echo $booking_infos->client_address ?>" readonly="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope"> Email</i></span>
                                        <input type="email" name="client_email" class="form-control" placeholder=" E-mail Address" value="<?php echo $booking_infos->client_email ?>" readonly="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-users"> Passenger Number</i></span>
                                        <input class="form-control" name="client_passanger_no" value="<?php echo $booking_infos->client_passanger_no ?>" placeholder="Pax." readonly="">                                                                                                            
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-child"> Baby Seater Number</i></span>
                                        <input class="form-control" name="client_baby_no" value="<?php echo $booking_infos->client_baby_no ?>" placeholder="Baby Seat" readonly="">

                                    </div>
                                </div>
                            </div>
                         
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-suitcase"> Luggage Number</i></span>
                                        <input class="form-control" name="client_luggage" value="<?php echo $booking_infos->client_luggage ?>" placeholder="Lugg." readonly="">                                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4>Joureny Details</h4>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-map-marker"> Pick Up Address</i></span>
                                        <input type="text" name="pickup_address" class="form-control"  value="<?php echo $booking_infos->pickup_address ?>" readonly="">
                                    </div>
                                </div>
                            </div>                                                                        
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-map-marker"> Drop Off Address</i></span>
                                        <input type="text" name="dropoff_address" class="form-control" value="<?php echo $booking_infos->dropoff_address ?>" readonly="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-map-marker"> Pick Up Address Line</i></span>
                                        <input type="text" name="pickup_address_line" class="form-control"  value="<?php echo $booking_infos->pickup_address_line ?>" readonly="">
                                    </div>
                                </div>
                            </div>                                                                        
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-map-marker"> Drop Off Address Line</i></span>
                                        <input type="text" name="dropoff_address_line" class="form-control" value="<?php echo $booking_infos->dropoff_address_line ?>" readonly="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar-o"> Pick Up Date</i></span>
                                        <input type="text" name="pickup_date" class="form-control timepicker" value="<?php echo $booking_infos->pickup_date ?>" readonly="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-clock-o"> Drop Off Time</i></span>
                                        <input type="text" name="pickup_time" class="form-control timepicker" value="<?php echo $booking_infos->pickup_time ?>" readonly="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-map-marker"> Distance</i></span>
                                        <input type="text" name="distance" class="form-control timepicker" value="<?php echo $booking_infos->distance ?> <?= DISTANCE ?>" readonly="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-clock-o"> Duration</i></span>
                                        <input type="text" name="duration" class="form-control timepicker" value="<?php echo $booking_infos->duration ?>" readonly="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-gbp"> Total Journey Fare</i></span>
                                        <input type="text" name="total_fare" class="form-control timepicker" value="<?= CURRENCY ?> <?php echo $booking_infos->total_fare ?>" readonly="">
                                    </div>
                                </div>
                            </div>                           
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-map-marker"> Journey Type</i></span>
                                        <input type="text" name="journey_type" class="form-control timepicker" value="<?= ($booking_infos->journey_type=='one_way') ? ucfirst(str_replace('_',' ','one_way')) : ucfirst(str_replace('_',' ','two_way'))?>" readonly="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-car">  Vehicle Name</i></span>
                                        <input type="text" name="vehicle_name" class="form-control timepicker" value="<?php echo $booking_infos->vehicle_name ?>" readonly="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6" style="float: right;">
                                <img src="<?php echo base_url('uploads/fleet/' . $fleet->img_name) ?>">
                            </div>
                        </div>                            
                        <h4>Arrival Flight Details</h4>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-plane"> Number</i></span>
                                        <input type="text" name="flight_number" class="form-control" value="<?php echo $booking_infos->flight_number ?>" readonly="">
                                    </div>
                                </div>
                            </div>                                                                        
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-clock-o"> From</i></span>
                                        <input type="text" name="flight_arrive_from" class="form-control timepicker" value="<?php echo $booking_infos->flight_arrive_from ?>" readonly="">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div <?=($booking_infos->journey_type=='one_way')? 'style="display : none;"':''?>>
                        <h4>Return Date/Time</h4>
                        <div class="row" >
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar-o"> Date</i></span>
                                        <input type="text" name="client_return_date" class="form-control datepicker" value="<?php echo $booking_infos->client_return_date ?>" readonly="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-clock-o"> Time</i></span>
                                        <input type="text" name="client_return_time" class="form-control timepicker" value="<?php echo $booking_infos->client_return_time ?>" readonly="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <h4>Special Instruction</h4>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="input-group">                                                    
                                        <span class="input-group-addon"><i class="fa fa-comments"> Message</i></span>
                                        <textarea class="form-control" name="message" rows="3" readonly=""><?php echo $booking_infos->message ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-gbp"> Payment By</i></span>                                                    
                                        <input type="input" class="form-control" name="pay_method" value="<?= $booking_infos->pay_method ?>" readonly="">                                                    
                                    </div>                                               
                                </div>
                            </div>                                    
                        </div>
                        <tr>
                            <td colspan="2">
                                <a href="<?= site_url('admin/booking') ?>" class="btn btn-primary" type="submit">Go Back</a>
                            </td>
                        </tr>
                    </table>
                </form>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div><!-- /.row -->
