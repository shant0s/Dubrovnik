
    <section class="banner-inner" style="background: url(assets/images/rent.jpg);">
        <div class="container">
            <h1 class="text">Booking <span>Forms</span>
            </h1>
        </div>
    </section>

    <div>
        <?= flash(); ?>
    </div>
    <form action="<?php echo site_url('mail/rent_email'); ?>" method="post" class="form">
    <section class="contact ">
        <div class="container">

            <div class="contact-form">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center form-wrap banner-cont">
                            <h4 class="text-center">Personal Details </h4>

                            <h5 class="text-center">Enter the requested field below</h5>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6 pad-5-right">
                                        <input type="text" class="form-control" name="fname" placeholder="First Name">
                                    </div>
                                    <div class="col-sm-6 pad-5-left">
                                        <input type="text" class="form-control" name="lname" placeholder="Last Name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6 pad-5-right">
                                        <input type="text" class="form-control" name="email"
                                               placeholder="Enter Your Email">
                                    </div>
                                    <div class="col-sm-6 pad-5-left">
                                        <input type="text" class="form-control" name="phone"
                                               placeholder="Enter Your Phone Number">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact  section-contact">
        <div class="container">
            <div class="contact-form">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center form-wrap banner-cont">
                            <h4 class="text-center">Journey Details </h4>

                            <h5 class="text-center">Enter the requested field below</h5>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6 pad-5-right">
                                        <input type="text" class="form-control" name="pickupAddress"
                                               placeholder="Enter Pick Up Address">
                                    </div>
                                    <div class="col-sm-6 pad-5-left">
                                        <input type="text" class="form-control" name="dropoffAddress"
                                               placeholder="Enter Drop Off Address">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6 pad-5-right">
                                        <input type="date" class="form-control" name="date"
                                               placeholder="Select Pick Up Date">
                                    </div>
                                    <div class="col-sm-6 pad-5-left">
                                        <input type="time" class="form-control" name="pickupTime"
                                               placeholder="Select Pick Up Time">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <select class="form-control" name="vehicleType">
                                            <option value="">Select Vehicle Type</option>
                                            <option value="test1">asdsad</option>
                                            <option value="test2">asdasdsad</option>
                                        </select>
                                    </div>

                                </div>
                        </div>
                    </div>
            </div>
    </section>

    <section class="contact  section-contact">
        <div class="container">
            <div class="contact-form">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center form-wrap banner-cont">
                            <h4 class="text-center">Payment Type </h4>

                            <h5 class="text-center">Select the option below</h5>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <select class="form-control" name="paymentType">
                                            <option value="">Select Payment Type</option>
                                            <option value="card">card</option>
                                            <option value="cash">Cash</option>
                                            <option value="paypal">Paypal</option>
                                        </select>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div>

                            <input class="btn btn-primary" type="submit" value="Save">
                        </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <section class="choose section" style="background: url(assets/images/why-choose.jpg);">
        <div class="container">
            <ul class="">
                <li>
                    <i class="fa fa-star"></i>
                    <h4>Best Service</h4>
                </li>
                <li>
                    <i class="fa fa-money"></i>
                    <h4>Reasonable Price</h4>
                </li>
                <li>
                    <i class="fa fa-clock-o"></i>
                    <h4>Punctual Service</h4>
                </li>
            </ul>
        </div>
    </section>
</form>

