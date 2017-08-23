<section class="quote-confirmation">
    <?php $this->load->view('frontend/includes/navigation'); ?>
    <div class="quote-confirm"></div>
    <div class="container-fluid">
        <h1>Confirm your Booking</h1>
        <div class="container">
            <div class="booking-form">
                <fieldset>        
                    <legend>Booking Confirmation</legend>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="journey-info">
                                <h4>JOURNEY INFORMATION</h4>
                                <span class="google-map">
                                    <div class="map-container">
                                        <div id="map" style="width:100%; height: 200px"></div>                                            
                                    </div>
                                </span>
                                <ul class="list-unstyled">
                                    <li>
                                        <figure>
                                            <img src="<?= base_url('uploads/fleet/' . $vehicle_info['vehicle_img_name']) ?>" class="img-responsive" alt="<?= $vehicle_info['vehicle_name'] ?>">
                                        </figure>
                                    </li>
                                    <li><p>Trip Type</p><i class="fa fa-car"></i> <?= ucwords(str_replace('_', ' ', $vehicle_info['journey_type'])) ?></li>
                                    <li><p>Trip Fare</p><i class="fa fa-money"></i> <?= CURRENCY . $grand_total_charge['total'] ?></li>
                                    <li> <p>Pick Up Address</p> <i class="fa fa-map-marker" style="color: green;"></i><?= $quote['start'] ?></li>
                                    <?php if ($quote['via']): ?>
                                        <li><p>Via Point</p> <i class="fa fa-map-marker" ></i> <?= $quote['via'] ?></li>
                                    <?php endif; ?>
                                    <li><p>Drop Off Address</p> <i class="fa fa-map-marker" style="color: red;"></i><?= $quote['end'] ?></li>
                                    <li><p>Estimated Distance</p><i class="fa fa-road"></i> <?= $google_data['distance'] ?><?= DISTANCE ?></li>
                                    <li><p>Estimated Duration</p><i class="fa fa-clock-o"></i> <?= $google_data['duration'] ?></li>
                                    <li><i class="fa fa-arrow-left"></i><a href="<?= site_url('quote/vehicle_select') ?>">Change Vehicle</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="booking-details">
                                <legend>Personal Details</legend>
                                <form id="dt-quote" action="<?= site_url('quote/confirm') ?>" class="cstm-form" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                    <input type="text" name="client_name" class="form-control" placeholder="Enter Your Name" value="<?php echo $booking_post['client_name'] ?>" readonly="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                                    <input type="text" name="client_address" class="form-control" placeholder="Enter Your Address" value="<?php echo $booking_post['client_address'] ?>" readonly="">                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                    <input type="text" name="client_phone" class="form-control" placeholder="Enter Your Telephone/Mobile no" value="<?php echo $booking_post['client_phone'] ?>" readonly="">                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                                    <input type="email" name="client_email" class="form-control" placeholder="Enter Your E-mail Address" value="<?php echo $booking_post['client_email'] ?>" readonly="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <legend>Travel Details</legend>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-group"></i></span>
                                                    <input type="text" name="client_name" class="form-control"  value="<?php echo $booking_post['client_passanger_no'] ?>" readonly="">                                                   
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-child"></i></span>
                                                    <input type="text" name="client_name" class="form-control"  value="<?php echo $booking_post['client_baby_no'] ?>" readonly="">                                                   
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-suitcase"></i></span>
                                                    <input type="text" name="client_name" class="form-control"  value="<?php echo $booking_post['client_luggage'] ?>" readonly="">                                                                                                       
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                                    <input type="text" name="client_name" class="form-control"  value="<?php echo $booking_post['waiting_time'] ?>" readonly="">                                                                                                                                                          
                                                </div>
                                            </div>
                                        </div>
                                    </div>       
                                    <div class="row">
                                        <?php if (isAirport($quote['start'])): ?>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control"  value="<?php echo $booking_post['flight_no'] ?>" disabled="">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" value="<?php echo $booking_post['pickup_address_line'] ?>" disabled="">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label class="col-md-4">Meet & Greet</label>                            
                                                    <div class="col-md-8">                               
                                                        <label class="checkbox-inline">                             
                                                            <input type="radio"disabled="" <?php echo ($booking_post['meet_and_greet'] == 'yes') ? 'checked' : '' ?>> Yes
                                                        </label>                                                          
                                                        <label class="checkbox-inline">          
                                                            <input type="radio"disabled="" <?php echo ($booking_post['meet_and_greet'] == 'no') ? 'checked' : '' ?>> No
                                                        </label>                        
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($vehicle_info['journey_type'] == 'two_way'): ?>
                                            <div class="col-md-6">                                      
                                                <div class="input-group">
                                                    <input type="text" class="form-control" value="<?= $booking_post['return_date'] ?>" disabled="">
                                                    <label class="input-group-addon"><i class="fa fa-calendar"></i></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <input type="text" class="form-control"  value="<?= $booking_post['return_time'] ?>" disabled="">                                                    
                                                    <label class="input-group-addon"><i class="fa fa-clock-o"></i></label>
                                                </div>                                                
                                            </div> 
                                        <?php endif; ?>
                                    </div> 
                                    <div class="row">
                                        <div class="col-md-6">
                                            <textarea class="form-control" rows="2" disabled=""><?php echo $booking_post['pickup_address_line'] ?></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <textarea class="form-control" rows="2" disabled=""><?php echo $booking_post['dropoff_address_line'] ?></textarea>
                                        </div>
                                    </div>
                                    <legend>Others Details</legend>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-4">Payment Method</label>                            
                                                <div class="col-md-8">                               
                                                    <label class="checkbox-inline">                             
                                                        <input type="radio" disabled="" <?php echo ($booking_post['pay_method'] == 'cash') ? 'checked' : '' ?>> Cash
                                                    </label>                                                          
                                                    <label class="checkbox-inline">          
                                                        <input type="radio" disabled="" <?php echo ($booking_post['pay_method'] == 'paypal') ? 'checked' : '' ?>> Paypal
                                                    </label>                        
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <textarea class="form-control" rows="3" disabled><?php echo $booking_post['message'] ?></textarea>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input class="checkbox-inline" type="checkbox" checked="" disabled=""> I agree the <b><a href="termscondition.php" target="_blank">terms and conditions</a></b>                       
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="input-group btn-block">
                                                    <!--<a href="<?php echo site_url('quote/booking/' . "edit") ?>" class="btn blue-btn">Change Details</a>-->
                                                    <a href="<?php echo site_url('quote/finish') ?>" class="btn blue-btn">Confirm</a>                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</section>
<?php
$this->load->view('frontend/includes/map-js')?>