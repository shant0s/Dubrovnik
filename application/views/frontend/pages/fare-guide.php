<div class="inner-banner">    <div class="container">        <h1>Airport Prices</h1>        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>    </div></div><div class="shadow-overlay"></div><main class="template template-fare-guide">    <section class="section-break">        <div class="container">            <div class="section-heading">                <h2>Luggage Guide</h2>                <span>                    <img src="<?= site_url('assets') ?>/images/title-border.png" alt="border">                </span>            </div>            <div class="vehicle-wrapper">                <div class="row">                    <?php foreach ($fleets as $fleet): ?>                        <div class="col-md-3">                            <div class="vehicle">                                <figure>                                    <img src="<?= base_url('uploads/fleet/' . $fleet->img_name) ?>" style="width: 265px"                                         alt="<?= $fleet->title ?>">                                </figure>                                <article>                                    <div class="grad-bg">                                        <h3><?= $fleet->title ?></h3>                                    </div>                                    <ul class="list-group">                                        <li class="list-group-item">                                            <span><?= $fleet->passengers; ?> <i class="fa fa-users"></i></span>                                            Adults                                        </li>                                        <li class="list-group-item">                                            <span><?= $fleet->luggage; ?> <i class="fa fa-suitcase"></i></span>                                            Luggage                                        </li>                                        <li class="list-group-item">                                            <span><?= $fleet->suitcases; ?> <i class="fa fa-briefcase"></i></span>                                            Suitcase                                        </li>                                        <div class="clearfix"></div>                                    </ul>                                </article>                            </div>                        </div>                    <?php endforeach; ?>                </div>            </div>        </div>    </section>    <section class="section fare-bg">        <div class="container">            <div class="section-heading">                <h2>Luggage Guide</h2>                <span>                    <img src="<?= site_url('assets') ?>/images/title-border.png" alt="border">                </span>            </div>            <div class="custom-modal">                <!-- Nav tabs -->                <ul class="nav nav-tabs" role="tablist">                    <li role="presentation" class="active"><a href="#saloon" aria-controls="saloon" role="tab"                                                              data-toggle="tab">Saloon</a></li>                    <li role="presentation"><a href="#estate" aria-controls="estate" role="tab"                                               data-toggle="tab">Estate</a></li>                    <li role="presentation"><a href="#7-seater" aria-controls="7-seater" role="tab" data-toggle="tab">7                            Seater</a></li>                </ul>                <!-- Tab panes -->                <div class="tab-content">                    <?php $guide = get_page_by_slug('fare-guide-page-luggage-guide') ?>                    <?= $guide->desc ?>                </div>            </div>        </div>    </section></main>