<section class="quote-confirmation">
    <?php $this->load->view('frontend/includes/navigation'); ?>
    <div class="quote-confirm"></div>
    <div class="container-fluid">
        <h1>Confirm your Booking</h1>
        <div class="container">
            <div class="booking-form">
                <fieldset>        
                    <legend>Booking Information</legend>
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
                                    <li><p>Trip Fare</p><i class="fa fa-money"></i> <?= CURRENCY . $vehicle_fare ?></li>
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
                                                    <input type="text" name="client_name" class="form-control" placeholder="Enter Your Name" value="<?php echo (!$is_edit || $passenger) ? $passenger->full_name : '' ?>" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                                    <input type="text" name="client_address" class="form-control" placeholder="Enter Your Address" value="<?php echo (!$is_edit || $passenger) ? $passenger->address : '' ?>" required="">                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                    <input type="text" name="client_phone" class="form-control" placeholder="Enter Your Telephone/Mobile no" value="<?php echo (!$is_edit || $passenger) ? $passenger->phone_no : '' ?>" required="">                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                                    <input type="email" name="client_email" class="form-control" placeholder="Enter Your E-mail Address" value="<?php echo (!$is_edit || $passenger) ? $passenger->email : '' ?>" required="">
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
                                                    <select class="form-control" name="client_passanger_no" placeholder="Pax." required="">
                                                        <option value="<?php echo (!$is_edit) ? $booking_post_infos['client_passanger_no'] : '' ?>"><?php echo (!$is_edit) ? $booking_post_infos['client_passanger_no'] : '-Pax-' ?></option>                                                
                                                        <?php for ($i = 1; $i <= $fleet->passengers; $i++): ?>
                                                            <option value="<?= $i ?>"><?= $i ?></option>
                                                        <?php endfor; ?>   
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-child"></i></span>
                                                    <select class="form-control" name="client_baby_no" placeholder="Baby Seat">
                                                        <option value="<?php echo (!$is_edit) ? $booking_post_infos['client_baby_no'] : 0 ?>"><?php echo (!$is_edit) ? $booking_post_infos['client_baby_no'] : '-Baby Seat-' ?></option>
                                                        <?php for ($i = 0; $i <= $fleet->baby_seats; $i++): ?>
                                                            <option value="<?= $i ?>"><?= $i ?></option>
                                                        <?php endfor; ?> 
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-suitcase"></i></span>
                                                    <select class="form-control" name="client_luggage" placeholder="Lugg.">
                                                        <option value="<?php echo (!$is_edit) ? $booking_post_infos['client_luggage'] : 0 ?>"><?php echo (!$is_edit) ? $booking_post_infos['client_luggage'] : '-Lugg.-' ?></option>
                                                        <?php for ($i = 0; $i <= $fleet->luggage; $i++): ?>
                                                            <option value="<?= $i ?>"><?= $i ?></option>
                                                        <?php endfor; ?> 
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                                    <select class="form-control" name="waiting_time" required="">
                                                        <option value="<?php echo (!$is_edit) ? $booking_post_infos['waiting_time'] : '' ?>"><?php echo (!$is_edit) ? $booking_post_infos['waiting_time'] : 'Waiting Time' ?></option>
                                                        <option value="30">30 Mins</option>
                                                        <option value="60">1 Hr</option>
                                                        <option value="90">1 Hr 30 Mins</option>
                                                        <option value="120">2 Hr</option>
                                                        <option value="150">2 Hr 30 Mins</option>
                                                        <option value="180">3 Hr</option>
                                                        <option value="210">3 Hr 30 Mins</option>
                                                        <option value="240">4 Hr</option>
                                                        <option value="270">4 Hr 30 Mins</option>
                                                    </select>	
                                                </div>
                                            </div>
                                        </div>                                                                                
                                    </div>                
                                    <div class="row">
                                        <?php if (isAirport($quote['start'])): ?>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" placeholder="Enter Flght Number" name="flight_no" value="<?php echo (!$is_edit) ? $booking_post_infos['flight_no'] : '' ?>" required="">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" placeholder="Enter Flight Arrival From" name="flight_arrive_from" value="<?php echo (!$is_edit) ? $booking_post_infos['flight_arrive_from'] : '' ?>" required="">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label class="col-md-4">Meet & Greet</label>                            
                                                    <div class="col-md-8">                               
                                                        <label class="checkbox-inline">                             
                                                            <input type="radio" name="meet_and_greet" value="yes" required="" <?php echo (!$is_edit && $booking_post_infos['meet_and_greet'] == 'yes') ? 'checked' : '' ?>> Yes
                                                        </label>                                                          
                                                        <label class="checkbox-inline">          
                                                            <input type="radio" name="meet_and_greet" value="no" required="" <?php echo (!$is_edit && $booking_post_infos['meet_and_greet'] == 'no') ? 'checked' : '' ?>> No
                                                        </label>                        
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($vehicle_info['journey_type'] == 'two_way'): ?>
                                            <div class="col-md-6">                                      
                                                <div class="input-group">
                                                    <input type="text" class="form-control datepicker" placeholder="Enter Return Date" name="return_date" required="">
                                                    <label class="input-group-addon"><i class="fa fa-calendar"></i></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <input type="text" class="form-control timepicker" placeholder="Enter Return Time" name="return_time" required="">
                                                    <label class="input-group-addon"><i class="fa fa-clock-o"></i></label>
                                                </div>                                                
                                            </div> 
                                        <?php endif; ?>
                                    </div> 
                                    <div class="row">
                                        <div class="col-md-6">
                                            <textarea class="form-control" rows="2" name="pickup_address_line" placeholder="Pickup Address Line (If Any)" ><?php echo (!$is_edit) ? $booking_post_infos['pickup_address_line'] : '' ?></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <textarea class="form-control" rows="2" name="dropoff_address_line" placeholder="Dropoff Address Line (If Any)" ><?php echo (!$is_edit) ? $booking_post_infos['dropoff_address_line'] : '' ?></textarea>
                                        </div>
                                    </div>
                                    <legend>Others Details</legend>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-4">Payment Method</label>                            
                                                <div class="col-md-8">                               
                                                    <label class="checkbox-inline">                             
                                                        <input type="radio" name="pay_method" value="cash" required="" <?php echo (!$is_edit && $booking_post_infos['pay_method'] == 'cash') ? 'checked' : '' ?>> Cash
                                                    </label>                                                          
                                                    <label class="checkbox-inline">          
                                                        <input type="radio" name="pay_method" value="paypal" required="" <?php echo (!$is_edit && $booking_post_infos['pay_method'] == 'paypal') ? 'checked' : '' ?>> Paypal
                                                    </label>                        
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <textarea class="form-control" rows="3" name="message" placeholder="Mention your Special Instructions/Information (If Any)" ><?php echo (!$is_edit) ? $booking_post_infos['message'] : '' ?></textarea>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-8">
                                            <input class="checkbox-inline" type="checkbox" name="" required=""> I agree the <b><a href="termscondition.php" target="_blank">terms and conditions</a></b>                       
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="input-group btn-block">
                                                    <input type="submit" class="btn blue-btn" value="Submit">
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