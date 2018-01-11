<section class="banner-inner" style="background: url(<?= base_url('assets/images/rent.jpg') ?>);">
    <div class="container">
        <h1 class="text">Booking <span>Forms</span>
        </h1>
    </div>
</section>

<div>
    <?= flash(); ?>
</div>
<form action="<?= site_url('mail/rent_email'); ?>" method="post" class="form" id="booking-form">
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
                                               required
                                               value="<?= set_value('fname'); ?>"
                                        >
                                        <?= form_error('fname', '<div class="is-error">', '</div>'); ?>
                                    </div>
                                    <div class="col-sm-6 pad-5-left">
                                        <input type="text" class="form-control" name="lname" placeholder="Last Name"
                                               required
                                               value="<?= set_value('lname'); ?>"
                                        >
                                        <?= form_error('lname', '<div class="is-error">', '</div>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6 pad-5-right">
                                        <!--                                        <input type="email" class="form-control" name="email" placeholder="Enter Your Email">-->
                                        <input type="email" class="form-control" name="email" required
                                               value="<?= set_value('email'); ?>"
                                               placeholder="Enter Your Email"/>
                                        <?= form_error('email', '<div class="is-error">', '</div>'); ?>
                                    </div>
                                    <div class="col-sm-6 pad-5-left">
                                        <input type="text" class="form-control" name="phone" required
                                               value="<?= set_value('phone'); ?>"
                                               placeholder="Enter Your Phone Number">
                                        <?= form_error('lname', '<div class="is-error">', '</div>'); ?>
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
                                        <input type="text" class="form-control" name="pickupAddress" required
                                               value="<?= set_value('pickupAddress'); ?>"
                                               placeholder="Enter Pick Up Address">
                                        <?= form_error('pickupAddress', '<div class="is-error">', '</div>'); ?>
                                    </div>
                                    <div class="col-sm-6 pad-5-left">
                                        <input type="text" class="form-control" name="dropoffAddress"
                                               value="<?= set_value('dropoffAddress'); ?>"
                                               placeholder="Enter Drop Off Address">
                                        <?= form_error('dropoffAddress', '<div class="is-error">', '</div>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6 pad-5-right">
                                        <input type="text" class="form-control" name="date" id="datepicker" required
                                               value="<?= set_value('date'); ?>"
                                               placeholder="Select Pick Up Date">
                                        <?= form_error('date', '<div class="is-error">', '</div>'); ?>
                                    </div>
                                    <div class="col-sm-6 pad-5-left">
                                        <input type="text" class="form-control" name="pickupTime" id="timepicker"
                                               required
                                               placeholder="Select Pick Up Time">
                                        <?= form_error('pickupTime', '<div class="is-error">', '</div>'); ?>
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
                                        <?= form_error('vehicleType', '<div class="is-error">', '</div>'); ?>
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
                                        <?= form_error('paymentType', '<div class="is-error">', '</div>'); ?>
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
    <section class="choose section" style="background: url(<?= base_url('assets/images/why-choose.jpg') ?>);">
        <div class="container">
            <ul class="">
                <li>
                    <i class="fa fa-star"></i>
                    <h4><?= (!empty($qualities->title1)) ? $qualities->title1 : ''; ?></h4>
                </li>
                <li>
                    <i class="fa fa-money"></i>
                    <h4><?= (!empty($qualities->title2)) ? $qualities->title2 : ''; ?></h4>
                </li>
                <li>
                    <i class="fa fa-clock-o"></i>
                    <h4><?= (!empty($qualities->title3)) ? $qualities->title3 : ''; ?></h4>
                </li>
            </ul>
        </div>
    </section>
</form>

