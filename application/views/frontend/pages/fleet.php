<section class="banner-inner" style="background: url(assets/images/fleets.jpg);">
    <div class="container">
        <h1 class="text">Our <span>Fleet</span>
        </h1>
    </div>
</section>

<section class="section">
    <div class="container">
        <?php
        $counter = 0;
        foreach ($fleets as $fleet):

            if ($counter % 2 == 0) {
                ?>
                <div class="fleet-inner">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <article>
                                <h3 class="tertiary-title"><?php echo $fleet->title; ?></h3>
                                <h5>Mercedes-Benz C Class, Toyota Prius, VW Passat, Vauxhall Insignia, or similar</h5>
                                <article><?php echo $fleet->desc; ?></article>
                                <ul class="list-inline">
                                    <li><i class="fa fa-users"></i> Max <?php echo $fleet->passengers; ?></li>
                                    <li><i class="fa fa-suitcase"></i> Max <?php echo $fleet->luggage; ?></li>
                                </ul>
                                <a href="<?php echo site_url('rent#booking-form'); ?>" class="btn-custom1">Book Now</a>
                            </article>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <figure class="text-center">
                                <img src="<?php echo base_url('uploads/fleet/' . $fleet->img_name); ?>"
                                     alt="Economy Class">
                            </figure>
                        </div>
                    </div>

                </div>
            <?php } else { ?>
                <div class="fleet-inner">
                    <div class="row">

                        <div class="col-md-6 col-sm-6">
                            <figure class="text-center">
                                <img src="<?php echo base_url('uploads/fleet/' . $fleet->img_name); ?>"
                                     alt="Economy Class">
                            </figure>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <article>
                                <h3 class="tertiary-title"><?php echo $fleet->title; ?></h3>
                                <h5>Mercedes-Benz C Class, Toyota Prius, VW Passat, Vauxhall Insignia, or similar</h5>
                                <article><?php echo $fleet->desc; ?></article>
                                <ul class="list-inline">
                                    <li><i class="fa fa-users"></i> Max <?php echo $fleet->passengers; ?></li>
                                    <li><i class="fa fa-suitcase"></i> Max <?php echo $fleet->luggage; ?></li>
                                </ul>
                                <a href="<?php echo site_url('rent#booking-form'); ?>" class="btn-custom1">Book Now</a>
                            </article>
                        </div>
                    </div>
                </div>
                <?php
            }
            $counter++;
        endforeach;
        ?>
    </div>
</section>


