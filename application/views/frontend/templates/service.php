<section class="banner-inner" style="background: url(assets/images/airporttransfer.jpg);">
    <div class="container">
        <?php if($service_data->name): ?>
        <h1 class="text">
            <?=  $service_data->name; ?>
        </h1>
        <?php endif; ?>
    </div>
</section>
<section class="service-inner section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="service-content">
                    <?= $service_data->desc; ?>
<!--                    <a href="--><?//= site_url('price'); ?><!--" class="btn-custom1">View Prices</a>-->
<!--                    <a href="--><?//= site_url('rent'); ?><!--" class="btn-custom2">Book Now</a>-->
                    <a href="<?= site_url('rent'); ?>" class="btn-custom1">Book Now</a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="content-img">
                    <img src="assets/images/service.jpg" alt="airport transfer">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section content">
    <div class="container">
        <div class="service-content">
            <?= $service_data->long_desc; ?>
        </div>
    </div>
</section>


