<main class="bg-light-gray template quote-system">
    <section class="step-head ">
        <div class="container">
            <div class="booking-step-wrapper">
                <div class="step-icon-wrapper">
                    <div class="step-icon active">
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
                    <div class="step-icon">
                        <div class="step-title">Confirmation</div>
                        <span>4</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-5 ">
                    <div class="custom-form">
                        <form id="dt-quote" action="<?= site_url('quote') ?>" method="post">
                            <div class="form-group">
                                <label class="control-label">Pick up Address</label>
                                <input type="text" id="start" name="start" class="form-control" placeholder="Enter Pick Up Address" required="">
                                <span class="start">                
                                    <input type="hidden" data-geo="lat" name="start_lat">               
                                    <input type="hidden" data-geo="lng" name="start_lng">               
                                </span>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Drop off Address</label>
                                <input type="text" id="end" name="end" class="form-control" placeholder="Enter Drop Off Address" required="">
                                <span class="end">   
                                    <input type="hidden" data-geo="lat" name="end_lat">       
                                    <input type="hidden" data-geo="lng" name="end_lng">          
                                </span>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Date</label>
                                        <input type="text" name="pickupdate" class="form-control datepicker" placeholder="Enter Date" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Time</label>
                                        <input type="text" name="pickuptime" class="form-control timepicker" placeholder="Enter Time" required="">
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-block btn-green" type="submit">Estimate Fare</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-3">
                    <div class="sidebar">
                        <h3>Having Trouble?</h3>
                        <ul class="list-unstyled">
                            <li>
                                <h4>Call Us</h4>
                                <p><a href="#"><i class="fa fa-phone"></i> 033 0333 92 62</a></p>
                            </li>
                            <li>
                                <h4>Email Us</h4>
                                <p><a href="#"><i class="fa fa-envelope-o"></i> info@lutonairport.cab</a></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>