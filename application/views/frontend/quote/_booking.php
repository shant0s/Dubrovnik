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
                    <div class="step-icon active">
                        <div class="step-title">Transfer Details</div>
                        <span>3</span>
                    </div>
                    <div class="step-icon">
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
                            <h3 class="title">Trip Details <span><a href="<?= site_url('quote/vehicle_select') ?>"><i class="fa fa-edit"></i> Change Vehicle</a></span></h3>
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
                            <p class="clearfix"><strong class="text-uppercase">Fare:</strong> <span><big><?= CURRENCY . $vehicle_fare ?></big> </span></p>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="quote-inr-wrap">
                            <form id="dt-quote" action="<?= site_url('quote/confirm') ?>" method="post">
                                <div class="form-wrapper">
                                    <fieldset>
                                        <legend class="title">Personal Details</legend>
                                        <div class="row cstm-col">
                                            <div class="col-sm-6">
                                                <div class="form-group">
            <!--                                       <label class="control-label">Name of Passenger <span class="text-danger">*</span></label> -->
                                                    <input type="text" name="client_name" class="form-control" placeholder="Enter Your Name" value="<?php echo ($is_edit || isset($passenger) && $passenger) ? $passenger->full_name : '' ?>" required="">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                   <!--<label class="control-label">Address <span class="text-danger">*</span></label>--> 
                                                    <input type="text" name="client_address" class="form-control" placeholder="Enter Your Address" value="<?php echo ($is_edit || isset($passenger) && $passenger) ? $passenger->address : '' ?>" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row cstm-col">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <!--<label class="control-label">Tel</label>--> 
                                                    <input type="text" name="client_phone" class="form-control" placeholder="Enter Your Telephone/Mobile no" value="<?php echo ($is_edit || isset($passenger) && $passenger) ? $passenger->phone_no : '' ?>" required="">
                                                </div>
                                            </div>                                            
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <!--<label class="control-label">Email <span class="text-danger">*</span></label>--> 
                                                    <input type="email" name="client_email" class="form-control" placeholder="Enter Your E-mail Address" value="<?php echo ($is_edit || isset($passenger) && $passenger) ? $passenger->email : '' ?>" required="">
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
                                                <label class="control-label">No. Of Passengers <span class="text-danger">*</span></label>
                                                <select class="form-control" name="client_passanger_no" placeholder="Pax." required="">
                                                    <option value="<?php echo ($is_edit) ? $booking_post_infos['client_passanger_no'] : '' ?>"><?php echo ($is_edit) ? $booking_post_infos['client_passanger_no'] : '-Pax-' ?></option>
                                                    <?php for ($i = 1; $i <= $fleet->passengers; $i++): ?>
                                                        <option value="<?= $i ?>"><?= $i ?></option>
                                                    <?php endfor; ?>   
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="control-label">No. Of Child Seats <span class="text-danger">*</span></label>
                                                <select class="form-control" name="client_baby_no" placeholder="Baby Seat">
                                                    <option value="<?php echo ($is_edit) ? $booking_post_infos['client_baby_no'] : 0 ?>"><?php echo ($is_edit) ? $booking_post_infos['client_baby_no'] : '-Baby Seat-' ?></option>
                                                    <?php for ($i = 0; $i <= $fleet->baby_seats; $i++): ?>
                                                        <option value="<?= $i ?>"><?= $i ?></option>
                                                    <?php endfor; ?> 
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="control-label">Luggage <span class="text-danger">*</span></label>
                                                <select class="form-control" name="client_luggage">
                                                    <option value="<?php echo ($is_edit) ? $booking_post_infos['client_luggage'] : 0 ?>"><?php echo ($is_edit) ? $booking_post_infos['client_luggage'] : '-Lugg.-' ?></option>
                                                    <?php for ($i = 0; $i <= $fleet->luggage; $i++): ?>
                                                        <option value="<?= $i ?>"><?= $i ?></option>
                                                    <?php endfor; ?> 
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="control-label">Suitcase <span class="text-danger">*</span></label>
                                                <select class="form-control" name="client_hand_luggage">
                                                    <option value="<?php echo ($is_edit) ? $booking_post_infos['client_luggage'] : 0 ?>"><?php echo ($is_edit) ? $booking_post_infos['client_luggage'] : '-Suitcase.-' ?></option>
                                                    <?php for ($i = 0; $i <= $fleet->suitcases; $i++): ?>
                                                        <option value="<?= $i ?>"><?= $i ?></option>
                                                    <?php endfor; ?> 
                                                </select>
                                            </div>
                                        </div>                                       
                                        <div class="row cstm-col">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Waiting Time <span class="text-danger">*</span></label>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <select class="form-control" name="waiting_time">
                                                                <option value="<?php echo ($is_edit) ? $booking_post_infos['waiting_time'] : '' ?>"><?php echo ($is_edit) ? $booking_post_infos['waiting_time'] : 'Waiting Time' ?></option>
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
                                            <?php if ($vehicle_info['journey_type'] == 'two_way'): ?>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Return Date <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control datepicker" placeholder="Enter Return Date" name="return_date" required="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Return Time <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control timepicker" placeholder="Enter Return Time" name="return_time" required="">
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="row cstm-col">
                                            <div class="form-group col-md-6">
                                                <label class="control-label">Pickup address line</label>
                                                <textarea class="form-control" rows="2" name="pickup_address_line" placeholder="Pickup Address Line (If Any)" ><?php echo ($is_edit) ? $booking_post_infos['pickup_address_line'] : '' ?></textarea>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label">Dropoff address line</label>
                                                <textarea class="form-control" rows="2" name="dropoff_address_line" placeholder="Dropoff Address Line (If Any)" ><?php echo ($is_edit) ? $booking_post_infos['dropoff_address_line'] : '' ?></textarea>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <?php if (isAirport($quote['start'])): ?>
                                    <div class="form-wrapper">
                                        <fieldset>
                                            <legend class="title">Flight Arrival Details</legend>
                                            <div class="row cstm-col">                                       
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Flight Number <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" placeholder="Enter Flght Number" name="flight_no" value="<?php echo ($is_edit) ? $booking_post_infos['flight_no'] : '' ?>" required="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Flight Arrival From <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" placeholder="Enter Flight Arrival From" name="flight_arrive_from" value="<?php echo ($is_edit) ? $booking_post_infos['flight_arrive_from'] : '' ?>" required="">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Meet &amp; Greet? <span class="text-danger">*</span></label>
                                                        <br>
                                                        <label class="radio-inline">
                                                           <input type="radio" name="meet_and_greet" value="yes" required="" <?php echo ($is_edit && $booking_post_infos['meet_and_greet'] == 'yes') ? 'checked' : '' ?>> Yes
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="meet_and_greet" value="no" required="" <?php echo ($is_edit && $booking_post_infos['meet_and_greet'] == 'no') ? 'checked' : '' ?>> No
                                                        </label>
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
                                                <div class="col-sm-5">
                                                    <label class="control-label">
                                                         <input type="radio" name="pay_method" value="cash" required="" <?php echo ($is_edit && $booking_post_infos['pay_method'] == 'cash') ? 'checked' : '' ?>>
                                                        <span class="cr"><i class="fa fa-circle"></i></span>
                                                        Cash on completion of journey
                                                    </label>
                                                </div>                                                
                                                <div class="col-sm-4">
                                                    <label class="control-label">
                                                        <input type="radio" name="pay_method" value="paypal" required="" <?php echo ($is_edit && $booking_post_infos['pay_method'] == 'paypal') ? 'checked' : '' ?>>
                                                        <span class="cr"><i class="fa fa-circle"></i></span>
                                                        Paypal
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Special Instructions</label>
                                            <textarea class="form-control ng-binding" rows="3" name="message" placeholder="Special Instructions (If Any)"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="checkbox-inline terms">
                                                <input type="checkbox" name="" required="" aria-required="true"> <span class="text-danger">*</span> I accept the <a href="<?= site_url('terms-and-conditions')?>" target="_blank">Terms &amp; Conditions</a>.
                                            </label>
                                        </div>
                                        <button class="btn btn-gold" type="submit">Submit</button>
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