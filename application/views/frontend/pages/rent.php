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
                                        <input type="text" class="form-control" name="fname" placeholder="First Name"
                                               required>
                                    </div>
                                    <div class="col-sm-6 pad-5-left">
                                        <input type="text" class="form-control" name="lname" placeholder="Last Name"
                                               required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6 pad-5-right">
                                        <!--                                        <input type="email" class="form-control" name="email" placeholder="Enter Your Email">-->
                                        <input type="email" class="form-control" name="email"
                                               placeholder="Enter Your Email" required/>
                                    </div>
                                    <div class="col-sm-6 pad-5-left">
                                        <input type="text" class="form-control" name="phone"
                                               placeholder="Enter Your Phone Number" required>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact">
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
                                               placeholder="Enter Pick Up Address" required>
                                    </div>
                                    <div class="col-sm-6 pad-5-left">
                                        <input type="text" class="form-control" name="dropoffAddress"
                                               placeholder="Enter Drop Off Address" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6 pad-5-right">
                                        <input type="date" class="form-control" name="date"
                                               placeholder="Select Pick Up Date" required>
                                    </div>
                                    <div class="col-sm-6 pad-5-left">
                                        <input type="time" class="form-control" name="pickupTime"
                                               placeholder="Select Pick Up Time" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <select class="form-control" name="vehicleType" required>
                                            <option value="">Select Vehicle Type</option>
                                            <?php foreach ($fleets as $fleet): ?>
                                                <option value="<?= $fleet->title; ?>"><?= $fleet->title; ?></option>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
    </section>

    <section class="contact">
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
                                        <select class="form-control" name="paymentType" required>
                                            <option value="">Select Payment Type</option>
                                            <option value="Card">Card</option>
                                            <option value="Cash">Cash</option>
                                            <option value="Paypal">Paypal</option>
                                        </select>
                                    </div>

                                </div>

                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn-custom1" type="submit">Submit Now</button>
                            </div>
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

