<section class="banner" style="background: url(assets/images/banner.jpg);">
    <div class="container">
        <h1 class="text">Ride in style <br>
            <i></i>Ride with <span>Dubrovnik</span>
        </h1>
    </div>
</section>
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
                            <a href="<?= site_url('price'); ?>" class="btn-custom1">View Prices</a>
                            <a href="<?= site_url('rent'); ?>" class="btn-custom2">Book Now</a>
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
                            <a href="<?= site_url('price'); ?>" class="btn-custom1">View Prices</a>
                            <a href="<?= site_url('rent'); ?>" class="btn-custom2">Book Now</a>
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
                            <a href="<?= site_url('price'); ?>" class="btn-custom1">View Prices</a>
                            <a href="<?= site_url('rent'); ?>" class="btn-custom2">Book Now</a>
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
                            <a href="<?= site_url('price'); ?>" class="btn-custom1">View Prices</a>
                            <a href="<?= site_url('rent'); ?>" class="btn-custom2">Book Now</a>
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
                            <a href="<?= site_url('price'); ?>" class="btn-custom1">View Prices</a>
                            <a href="<?= site_url('rent'); ?>" class="btn-custom2">Book Now</a>
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
                            <a href="<?= site_url('price'); ?>" class="btn-custom1">View Prices</a>
                            <a href="<?= site_url('rent'); ?>" class="btn-custom2">Book Now</a>
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
                            <a href="<?= site_url('price'); ?>" class="btn-custom1">View Prices</a>
                            <a href="<?= site_url('rent'); ?>" class="btn-custom2">Book Now</a>
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
<section class="fleet section">
    <div class="container">
        <h2 class="prime-title">Fleet</h2>
        <div class="fleet-slider">
            <div class="item-wrap">
                <div class="fleet-item">
                    <div class="fleet-img">
                        <img src="assets/images/mercedes.png">
                    </div>
                    <h3>Mercedes S Class</h3>
                    <article>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna liqua.
                    </article>
                    <div class="car-details">
                        <div class="row">
                            <div class="col-xs-6"><span>3 pax</span></div>
                            <div class="col-xs-6"><span>3 lugg</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item-wrap">
                <div class="fleet-item">
                    <div class="fleet-img">
                        <img src="assets/images/van.png">
                    </div>
                    <h3>Mercedes S Class</h3>
                    <article>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna liqua.
                    </article>
                    <div class="car-details">
                        <div class="row">
                            <div class="col-xs-6"><span>3 pax</span></div>
                            <div class="col-xs-6"><span>3 lugg</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item-wrap">
                <div class="fleet-item">
                    <div class="fleet-img">
                        <img src="assets/images/mercedes.png">
                    </div>
                    <h3>Mercedes S Class</h3>
                    <article>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna liqua.
                    </article>
                    <div class="car-details">
                        <div class="row">
                            <div class="col-xs-6"><span>3 pax</span></div>
                            <div class="col-xs-6"><span>3 lugg</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item-wrap">
                <div class="fleet-item">
                    <div class="fleet-img">
                        <img src="assets/images/mercedes.png">
                    </div>
                    <h3>Mercedes S Class</h3>
                    <article>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna liqua.
                    </article>
                    <div class="car-details">
                        <div class="row">
                            <div class="col-xs-6"><span>3 pax</span></div>
                            <div class="col-xs-6"><span>3 lugg</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="book-xtra" style="background: url(assets/images/booking-bg.jpg);">
    <div class="container">
        <article>Have a awesome ride with us.</article>
        <a href="rent.php" class="btn-custom3 pull-right">Book now</a>
    </div>
</section>

<section class="testimonials section">
    <div class="container">
        <h2 class="prime-title">Testimonial</h2>
        <div class="testimonial-slider">
            <div class="testimonial-item">
                <article>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</article>
                <div class="media">
                    <div class="media-left media-middle">
                        <img src="assets/images/testimonial.jpg" class="media-object" alt="testimonials">
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Mladenka Marušić</h4>
                        <span>Michaelkirchstr. 28, 31559 Haste</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-item">
                <article>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</article>
                <div class="media">
                    <div class="media-left media-middle">
                        <img src="assets/images/testimonial.jpg" class="media-object" alt="testimonials">
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Mladenka Marušić</h4>
                        <span>Michaelkirchstr. 28, 31559 Haste</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

