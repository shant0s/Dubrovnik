<?php
$slug = segment(2);
?>
<section class="banner-inner" style="background: url(<?= base_url('assets/images/price.jpg')?>);">
    <div class="container">
        <h1 class="text">Our <span>Pricing</span>
        </h1>
    </div>
</section>
<section class="price section">
    <div class="container">
        <h3 class="tertiary-title"><?= $title; ?></h3>
        <div class="service-content">
            <article>
                <?= $description; ?>
            </article>
        </div>

        <?php
        switch ($slug) {
            case 'price-dubrovnik-airport-to-dubrovnik-hotels':
                $price_inner = get_page_by_slug('price-dubrovnik-airport-to-dubrovnik-hotels');
                echo $price_inner->desc;
                break;

            case 'price-dubrovnik-airport-to-cavtat-hotels':
                $price_inner = get_page_by_slug('price-dubrovnik-airport-to-cavtat-hotels');
                echo $price_inner->desc;
                break;

            case 'price-dubrovnik-airport-to-zupa-dubrovacka-hotels':
                $price_inner = get_page_by_slug('price-dubrovnik-airport-to-zupa-dubrovacka-hotels');
                echo $price_inner->desc;
                break;

            case 'price-dubrovnik-airport-to-slano-ston-hotels':
                $price_inner = get_page_by_slug('price-dubrovnik-airport-to-slano-ston-hotels');
                echo $price_inner->desc;
                break;

            case 'price-dubrovnik-airport-to-other-places-in-surrounding-area':
                $price_inner = get_page_by_slug('price-dubrovnik-airport-to-other-places-in-surrounding-area');
                echo $price_inner->desc;
                break;

            case 'price-dubrovnik-airport-to-montenegro-destinations':
                $price_inner1 = get_page_by_slug('price-dubrovnik-airport-to-montenegro-destinations');
                echo $price_inner1->desc;
                break;
        }
        ?>


    </div>
</section>

<section class="book-xtra" style="background: url(<?= base_url('assets/images/booking-bg.jpg'); ?>);">
    <div class="container">
        <article>Have a awesome ride with us.</article>
        <a href="<?= site_url('rent'); ?>" class="btn-custom3 pull-right">Book now</a>
    </div>
</section>