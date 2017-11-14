<main class="templates quote-system">
    <section class="step-head">
        <div class="container">
            <div class="booking-step-wrapper">
                <div class="step-icon-wrapper">
                    <div class="step-icon">
                        <div class="step-title">Enter Details</div>
                        <span>1</span>
                    </div>
                    <div class="step-icon">
                        <div class="step-title">Vehicle Selection</div>
                        <span>2</span>
                    </div>
                    <div class="step-icon">
                        <div class="step-title">Transfer Details</div>
                        <span>3</span>
                    </div>
                    <div class="step-icon active">
                        <div class="step-title">Confirmation</div>
                        <span>4</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section quote-system-wrap bg-light-gray">
        <div class="container">
            <div class="quote-sys-wrapper">
                <div class="row">
                    <div class="col-md-4">
                        <div class="sidebar-quote">
                            <h3 class="title">Trip Details</h3>
                            <!--<h3 class="title">Trip Details <span><a href="./"><i class="fa fa-edit"></i> Edit</a></span></h3>-->
                            <p class="clearfix"><i class="fa fa-map-marker"></i><strong>From:</strong> <span> <?= $quote['start'] ?></span></p>
                            <p class="clearfix"><i class="fa fa-map-marker"></i><strong>To:</strong> <span> <?= $quote['end'] ?></span></p>
                            <p class="clearfix"><i class="fa fa-road"></i><strong>Distance:</strong> <span> <?= $google_data['distance'] . DISTANCE ?> (<?= $google_data['duration'] ?>)</span></p>
                            <p><i class="fa fa-calendar"></i><strong>Date:</strong> <span><?= $quote['pickupdate'] ?></span></p>
                            <p><i class="fa fa-clock-o"></i> <strong>Time:</strong> <span><?= $quote['pickuptime'] ?></span></p>
                            <div class="vec-desc-hide">
                                <figure>
                                    <div  class="vec-img">
                                        <img src="<?= base_url('uploads/fleet/' . $vehicle_info['vehicle_img_name']) ?>" class="img-responsive" alt="<?= $vehicle_info['vehicle_name'] ?>">
                                    </div>
                                    <figcaption>
                                        <ul class="list-unstyled details">
                                            <li><i class="fa fa-user"></i> X<?= $fleet->passengers ?></li>
                                            <li><i class="fa fa-suitcase"></i> X<?= $fleet->luggage ?></li>
                                            <li><i class="fa fa-briefcase"></i> X<?= $fleet->suitcases ?></li>
                                        </ul>
                                    </figcaption>
                                </figure>
                                <h5><?= $vehicle_info['vehicle_name'] ?></h5>
                            </div>
                        </div>
                        <div class="rate">
                            <p class="clearfix"><strong class="text-uppercase">Total Fare:</strong> <span><big><?= CURRENCY . $grand_total_charge['total'] ?></big> </span></p>
                            <h6>Inclusive of <?= CURRENCY . $grand_total_charge['additional_charge'] ?> additional charges.</h6>
                            <h6>Airport Parking Fee: <?= CURRENCY . $grand_total_charge['additional_airport_pickup_charge'] ?></h6>
                            <h6>Baby Seat Charge: <?= CURRENCY . $grand_total_charge['additional_baby_seater_charge'] ?></h6>
                            <h6>Meet & Greet Charge: <?= CURRENCY . $grand_total_charge['additional_meet_and_greet'] ?></h6>                            
                            <h6>Waiting Time Charge: <?= CURRENCY . $grand_total_charge['additional_waiting_time'] ?></h6>
                            <h6>Paypal/Card Charge: <?= CURRENCY . $grand_total_charge['additional_card_service_charge'] ?></h6>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="quote-inr-wrap">
                            <form action="thank-you.php">
                                <div class="form-wrapper">
                                    <fieldset>
                                        <legend class="title">Personal Details</legend>
                                        <div class="row cstm-col">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">Name of Passenger <span class="text-danger">*</span></label> 
                                                    <p class="form-control-static"><?php echo $booking_post['client_name'] ?></p>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">Address <span class="text-danger">*</span></label> 
                                                    <p class="form-control-static"><?php echo $booking_post['client_address'] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row cstm-col">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">Tel</label> 
                                                    <p class="form-control-static"><?php echo $booking_post['client_phone'] ?></p>
                                                </div>
                                            </div>                                         
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">Email <span class="text-danger">*</span></label> 
                                                    <p class="form-control-static"><?php echo $booking_post['client_email'] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="form-wrapper">
                                    <fieldset>
                                        <legend class="title">Travel Details</legend>
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label class="control-label">Passengers <span class="text-danger">*</span></label>
                                                <p class="form-control-static"><?php echo $booking_post['client_passenger_no'] ?></p>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="control-label">Child Seats <span class="text-danger">*</span></label>
                                                <p class="form-control-static"><?php echo $booking_post['client_baby_no'] ?></p>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="control-label">Luggage <span class="text-danger">*</span></label>
                                                <p class="form-control-static"><?php echo $booking_post['client_luggage'] ?></p>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="control-label">Suitcase <span class="text-danger">*</span></label>
                                                <p class="form-control-static"><?php echo $booking_post['client_hand_luggage'] ?></p>
                                            </div>
                                        </div>                                      
                                        <div class="row cstm-col">                                          
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Waiting Time <span class="text-danger">*</span></label>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <p class="form-control-static"><?php echo $booking_post['waiting_time'] ?> mins</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php if ($vehicle_info['journey_type'] == 'two_way'): ?>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Return Date<span class="text-danger">*</span></label>
                                                        <p class="form-control-static"><?php echo $booking_post['return_date'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Return Time<span class="text-danger">*</span></label>
                                                        <p class="form-control-static"><?php echo $booking_post['return_time'] ?></p>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">Pickup address line</label>
                                                    <p class="form-control-static"><?php echo $booking_post['pickup_address_line'] ?></p>
                                                </div>                                               
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">Dropoff address line</label>
                                                    <p class="form-control-static"><?php echo $booking_post['dropoff_address_line'] ?></p>
                                                </div>                                               
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <?php if (isAirport($quote['start'])): ?>
                                    <div class="form-wrapper">
                                        <fieldset>
                                            <legend class="title">Flight Details</legend>                                        
                                            <div class="row cstm-col">                                          
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Flight Number</label>
                                                        <p class="form-control-static"><?php echo $booking_post['flight_no'] ?></p>
                                                    </div>                                               
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Flight Arrival From</label>
                                                        <p class="form-control-static"><?php echo $booking_post['flight_arrive_from'] ?></p>
                                                    </div>                                               
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Meet & Greet <span class="text-danger">*</span></label>
                                                        <div class="row cstm-col radio">
                                                            <div class="col-sm-4">
                                                                <label class="control-label">
                                                                    <input type="radio" name="option" checked="">
                                                                    <span class="cr"><i class="fa fa-circle"></i></span>
                                                                    <?php echo ucfirst($booking_post['meet_and_greet']) ?>
                                                                </label>
                                                            </div>                                  
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                <?php endif; ?>
                                <div class="form-wrapper">
                                    <fieldset>
                                        <legend class="title">Other Details</legend>
                                        <div class="form-group">
                                            <label class="control-label">Payment Type <span class="text-danger">*</span></label>
                                            <div class="row cstm-col radio">
                                                <div class="col-sm-4">
                                                    <label class="control-label">
                                                        <input type="radio" name="option" checked="">
                                                        <span class="cr"><i class="fa fa-circle"></i></span>
                                                        <?php echo ucfirst($booking_post['pay_method']) ?>
                                                    </label>
                                                </div>                                  
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Special Instructions</label>
                                            <p class="form-control-static"><?=$booking_post['message']?></p>
                                        </div>
                                        <div class="form-group">
                                            <label class="checkbox-inline terms">
                                                <input type="checkbox" name="" required="" aria-required="true" checked="" disabled=""> <span class="text-danger">*</span> I accept the <a href="<?= site_url('terms-and-conditions')?>" target="_blank">Terms &amp; Conditions</a>.
                                            </label>
                                        </div>
                                        <ul class="list-inline">
                                            <li>
                                                <!--<a href="<?php echo site_url('quote/booking/' . "edit") ?>" class="btn btn-gold">Edit Details</a>-->
                                            </li>
                                            <li>
                                                <a href="<?php echo site_url('quote/finish') ?>" class="btn btn-green">Confirm Booking</a>
                                            </li>
                                        </ul>
                                    </fieldset>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>