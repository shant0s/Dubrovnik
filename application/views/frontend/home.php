<div class="banner">
    <div class="container">
        <ul class="slick-banner">
            <?php foreach ($banner_imgs as $banner_img): ?>
                <li>
                    <figure>
                        <img src="<?= base_url('uploads/banner/' . $banner_img->filename) ?>" alt="banner image">
                    </figure>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="clearfix"></div>
    <a href="<?= site_url('get-quote') ?>">Get a Quote</a>
</div>
<div class="shadow-overlay"></div>
<main>
    <section class="hm-about">
        <div class="container">
            <div class="section-heading">
                <h2>About Luton Airport Taxis</h2>
                <span>
                    <img src="<?= site_url('assets') ?>/images/title-border.png" alt="border">
                </span>
                <p>
                    <?php $about_us = get_page_by_slug('home-page-about-luton-airport-taxis') ?>
                    <?= $about_us->desc ?>
                </p>
            </div>
            <div class="media-wrapper">
                <div class="row">
                    <div class="col-md-4">
                        <div class="media">
                            <figure>
                                <img src="<?= site_url('assets') ?>/images/services/airport-transfer.jpg" alt="Airport Transfers">
                            </figure>
                            <article>
                                <?php $airport = get_page_by_slug('home-page-airport-transfer') ?>
                                <?= $airport->desc ?>
                                <a href="<?= site_url('services') ?>" class="link">Read More <i class="fa fa-long-arrow-right"></i></a>
                            </article>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="media">
                            <figure>
                                <img src="<?= site_url('assets') ?>/images/services/executive-transfer.jpg" alt="Executive Transfers">
                            </figure>
                            <article>
                                <?php $executive = get_page_by_slug('home-page-executive-transfer') ?>
                                <?= $executive->desc ?>                         
                                <a href="<?= site_url('services') ?>" class="link">Read More <i class="fa fa-long-arrow-right"></i></a>
                            </article>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="media">
                            <figure>
                                <img src="<?= site_url('assets') ?>/images/services/courier-service.jpg" alt="Courier Service">
                            </figure>
                            <article>
                                <?php $mini_bus = get_page_by_slug('home-page-minibus-service') ?>
                                <?= $mini_bus->desc ?>
                                <a href="<?= site_url('services') ?>" class="link">Read More <i class="fa fa-long-arrow-right"></i></a>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section wna">
        <div class="container">
            <div class="section-heading">
                <h2>Why choose Luton airport Taxis</h2>
                <span>
                    <img src="<?= site_url('assets') ?>/images/title-border.png" alt="border">
                </span>        
            </div>
            <div class="why-us-wrapper">
                <div class="row">
                    <div class="col-md-3">
                        <div class="why-us-list">
                            <figure>
                                <img src="<?= site_url('assets') ?>/images/icons/fare-guide.png" alt="Fare Guide">
                            </figure>
                            <article>
                                <h3>Fare Guide</h3>
                                <!--<p>Lorem ipsum dolor sit amet, consectetur  et dolore aliqua. Ut enim ad veniam.</p>-->
                            </article>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="why-us-list">
                            <figure>
                                <img src="<?= site_url('assets') ?>/images/icons/online-booking.png" alt="Fare Guide">
                            </figure>
                            <article>
                                <h3>Online Booking</h3>
                                <!--<p>Lorem ipsum dolor sit amet, consectetur  et dolore aliqua. Ut enim ad veniam.</p>-->
                            </article>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="why-us-list">
                            <figure>
                                <img src="<?= site_url('assets') ?>/images/icons/affordable-price.png" alt="Fare Guide">
                            </figure>
                            <article>
                                <h3>Affordable Price</h3>
                                <!--<p>Lorem ipsum dolor sit amet, consectetur  et dolore aliqua. Ut enim ad veniam.</p>-->
                            </article>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="why-us-list">
                            <figure>
                                <img src="<?= site_url('assets') ?>/images/icons/sms-alert.png" alt="Fare Guide">
                            </figure>
                            <article>
                                <h3>SMS Alert</h3>
                                <!--<p>Lorem ipsum dolor sit amet, consectetur  et dolore aliqua. Ut enim ad veniam.</p>-->
                            </article>
                        </div>
                    </div>
                </div>
            </div>     
        </div>
    </section>
    <div class="shadow-overlay"></div>
    <section class="hm-review">
        <div class="container">
            <div class="section-heading">
                <h2>people always seems to be glad</h2>
                <span>
                    <img src="<?= site_url('assets') ?>/images/title-border.png" alt="border">
                </span>    
                <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>-->
            </div>
            <ul class="slick-review">
                <?php foreach ($testimonials as $testimonial): ?>
                    <li>
                        <div class="review">
                            <div class="row">                          
                                <div class="col-md-8">
                                    <i class="fa fa-quote-right"></i>
                                    <h4>- <?=$testimonial->designation?></h4>
                                </div>
                            </div>
                            <p><?=$testimonial->content?></p>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
    <section class="members">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-1 col-md-10">
                    <div class="row">
                        <div class="col-md-3">
                            <h2>Proud top be member of</h2>
                        </div>
                        <div class="col-md-9">
                            <ul class="slick-partner">
                                <li>
                                    <figure>
                                        <img src="<?= site_url('assets') ?>/images/milton-keynes.png" alt="Milton Keynes">
                                    </figure>
                                </li>
                                <li>
                                    <figure>
                                        <img src="<?= site_url('assets') ?>/images/heathrow-airport.png" alt="Heathrow Airport">
                                    </figure>
                                </li>
                                <li>
                                    <figure>
                                        <img src="<?= site_url('assets') ?>/images/luton-airport.png" alt="Luton Airport">
                                    </figure>
                                </li>
                                <li>
                                    <figure>
                                        <img src="<?= site_url('assets') ?>/images/luton-airport.png" alt="Luton Airport">
                                    </figure>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>