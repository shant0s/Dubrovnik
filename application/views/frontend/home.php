<div class="home-slider">
    <?php foreach ($banner as $result): ?>
        <?php $imageurl = 'uploads/banner/' . $result->filename; ?>
        <section class="banner" style="background: url(<?php echo $imageurl; ?>);">
            <div class="container">
                <?php if ($result->description) { ?>
                    <h1 class="text">
                        <?php echo $result->description; ?>
                    </h1>
                <?php } ?>
            </div>
        </section>

    <?php endforeach; ?>
</div>


<!--<section class="banner" style="background: url(assets/images/banner.jpg);">
    <div class="container">
        <h1 class="text">Ride in style <br>
            <i></i>Ride with <span>Dubrovnik</span>
        </h1>
    </div>
</section>-->
<section class="about section">
    <div class="container">
        <h2 class="prime-title">About us</h2>
        <article>
            <?php $about_us = get_page_by_slug('home-page-about-dubrovnik-airport-taxis') ?>
            <?= $about_us->desc ?>
        </article>
    </div>
</section>
<section class="service section">
    <div class="container">
        <h2 class="prime-title">Services</h2>
        <div class="service-slider">
            <div class="service-item">
                <div class="row">
                    <div class="col-md-6">
                        <figure class="item-pic">
                            <img src="assets/images/service.jpg">
                        </figure>
                    </div>
                    <div class="col-md-6">
                        <div class="item-content">
                            <div class="serve-title">
                                <img src="assets/images/plane.png">
                                <h3>Airport Transfer</h3>
                            </div>
                            <article>
                                <?php $airport = get_page_by_slug('home-page-airport-transfer') ?>
                                <?= $airport->desc ?>
                            </article>
<!--                            <a href="--><?//= site_url('price'); ?><!--" class="btn-custom1">View Prices</a>-->
<!--                            <a href="--><?//= site_url('rent'); ?><!--" class="btn-custom2">Book Now</a>-->
                            <a href="<?= site_url('rent#booking-form'); ?>" class="btn-custom1">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="service-item">
                <div class="row">
                    <div class="col-md-6">
                        <figure class="item-pic">
                            <img src="assets/images/minibus.jpg">
                        </figure>
                    </div>
                    <div class="col-md-6">
                        <div class="item-content">
                            <div class="serve-title">
                                <img src="assets/images/plane.png">
                                <h3>Minibus Service</h3>
                            </div>
                            <article class="">
                                <?php $minibus = get_page_by_slug('home-page-minibus-service') ?>
                                <?= $minibus->desc ?>
                            </article>
                            <!--                            <a href="--><?//= site_url('price'); ?><!--" class="btn-custom1">View Prices</a>-->
                            <!--                            <a href="--><?//= site_url('rent'); ?><!--" class="btn-custom2">Book Now</a>-->
                            <a href="<?= site_url('rent#booking-form'); ?>" class="btn-custom1">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="service-item">
                <div class="row">
                    <div class="col-md-6">
                        <figure class="item-pic">
                            <img src="assets/images/bus.jpg">
                        </figure>
                    </div>
                    <div class="col-md-6">
                        <div class="item-content">
                            <div class="serve-title">
                                <img src="assets/images/plane.png">
                                <h3>Bus Coach Service</h3>
                            </div>
                            <article class="">
                                <?php $bus = get_page_by_slug('home-page-bus-coach-service') ?>
                                <?= $bus->desc ?>
                            </article>
                            <!--                            <a href="--><?//= site_url('price'); ?><!--" class="btn-custom1">View Prices</a>-->
                            <!--                            <a href="--><?//= site_url('rent'); ?><!--" class="btn-custom2">Book Now</a>-->
                            <a href="<?= site_url('rent#booking-form'); ?>" class="btn-custom1">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="service-item">
                <div class="row">
                    <div class="col-md-6">
                        <figure class="item-pic">
                            <img src="assets/images/chauffeurs.jpg">
                        </figure>
                    </div>
                    <div class="col-md-6">
                        <div class="item-content">
                            <div class="serve-title">
                                <img src="assets/images/plane.png">
                                <h3>Chauffer Service</h3>
                            </div>
                            <article class="">
                                <?php $chauffeurs_service = get_page_by_slug('home-page-chauffeurs-service'); ?>
                                <?= $chauffeurs_service->desc ?>
                            </article>
                            <!--                            <a href="--><?//= site_url('price'); ?><!--" class="btn-custom1">View Prices</a>-->
                            <!--                            <a href="--><?//= site_url('rent'); ?><!--" class="btn-custom2">Book Now</a>-->
                            <a href="<?= site_url('rent#booking-form'); ?>" class="btn-custom1">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="service-item">
                <div class="row">
                    <div class="col-md-6">
                        <figure class="item-pic">
                            <img src="assets/images/excursion.jpg">
                        </figure>
                    </div>
                    <div class="col-md-6">
                        <div class="item-content">
                            <div class="serve-title">
                                <img src="assets/images/plane.png">
                                <h3>Excursion</h3>
                            </div>
                            <article class="">
                                <article class="">
                                    <?php $excursion_service = get_page_by_slug('home-page-excursions'); ?>
                                    <?= $excursion_service->desc ?>
                                </article>
                            </article>
                            <!--                            <a href="--><?//= site_url('price'); ?><!--" class="btn-custom1">View Prices</a>-->
                            <!--                            <a href="--><?//= site_url('rent'); ?><!--" class="btn-custom2">Book Now</a>-->
                            <a href="<?= site_url('rent#booking-form'); ?>" class="btn-custom1">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="service-item">
                <div class="row">
                    <div class="col-md-6">
                        <figure class="item-pic">
                            <img src="assets/images/group-transfer.jpg">
                        </figure>
                    </div>
                    <div class="col-md-6">
                        <div class="item-content">
                            <div class="serve-title">
                                <img src="assets/images/plane.png">
                                <h3>Group Travel</h3>
                            </div>
                            <article class="">
                                <?php $group_travel_service = get_page_by_slug('home-page-group-travel'); ?>
                                <?= $group_travel_service->desc ?>
                            </article>
                            <!--                            <a href="--><?//= site_url('price'); ?><!--" class="btn-custom1">View Prices</a>-->
                            <!--                            <a href="--><?//= site_url('rent'); ?><!--" class="btn-custom2">Book Now</a>-->
                            <a href="<?= site_url('rent#booking-form'); ?>" class="btn-custom1">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="service-item">
                <div class="row">
                    <div class="col-md-6">
                        <figure class="item-pic">
                            <img src="assets/images/speedboat.jpg">
                        </figure>
                    </div>
                    <div class="col-md-6">
                        <div class="item-content">
                            <div class="serve-title">
                                <img src="assets/images/plane.png">
                                <h3>Other Services</h3>
                            </div>
                            <article class="">
                                <?php $other_services = get_page_by_slug('home-page-other-services'); ?>
                                <?= $other_services->desc ?>
                            </article>
                            <!--                            <a href="--><?//= site_url('price'); ?><!--" class="btn-custom1">View Prices</a>-->
                            <!--                            <a href="--><?//= site_url('rent'); ?><!--" class="btn-custom2">Book Now</a>-->
                            <a href="<?= site_url('rent#booking-form'); ?>" class="btn-custom1">Book Now</a>
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
                <h4><?php echo (!empty($qualities->title1)) ? $qualities->title1 : ''; ?></h4>
            </li>
            <li>
                <i class="fa fa-money"></i>
                <h4><?php echo (!empty($qualities->title2)) ? $qualities->title2 : ''; ?></h4>
            </li>
            <li>
                <i class="fa fa-clock-o"></i>
                <h4><?php echo (!empty($qualities->title3)) ? $qualities->title3 : ''; ?></h4>
            </li>
        </ul>
    </div>
</section>
<section class="fleet section">
    <div class="container">
        <h2 class="prime-title">Fleet</h2>
        <div class="fleet-slider">
            <?php foreach ($fleets as $fleet): ?>
                <div class="item-wrap">
                    <div class="fleet-item">
                        <div class="fleet-img">
                            <img src="<?= base_url('uploads/fleet/' . $fleet->img_name) ?>">
                        </div>
                        <h3><?= $fleet->title ?></h3>
                        <article>
                            <?= $fleet->desc ?>
                        </article>
                        <div class="car-details">
                            <div class="row">
                                <div class="col-xs-6"><span><?= $fleet->passengers ?> pass</span></div>
                                <div class="col-xs-6"><span><?= $fleet->luggage ?> lugg</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</section>
<section class="book-xtra" style="background: url(assets/images/booking-bg.jpg);">
    <div class="container">
        <article>Have a awesome ride with us.</article>
        <a href="<?= site_url('rent#booking-form') ?>" class="btn-custom3 pull-right">Book now</a>
    </div>
</section>

<section class="testimonials section">
    <div class="container">
        <h2 class="prime-title">Testimonial</h2>
        <div class="testimonial-slider">
            <?php foreach ($testimonials as $testimonial): ?>
                <div class="testimonial-item">
                    <article><?= $testimonial->content ?></article>
                    <div class="media">
                        <div class="media-left media-middle">
                            <img src="<?= base_url('uploads/testimonial/' . $testimonial->image) ?>" class="media-object" alt="testimonials">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><?= $testimonial->designation ?></h4>
                            <span><?= $testimonial->address ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

