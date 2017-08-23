<?php $nav = $this->uri->segment(3); ?>
<header>
    <div class="dshbd-hdr">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 col-sm-4 col-xs-4">
                    <div class="dshbd-hdr-logo">
                        <a href="<?= site_url() ?>" id="cd-logo" >
                            <figure>
                                <img src="<?= base_url('assets') ?>/images/logo.png" alt="Logo">
                            </figure>
                        </a>
                    </div>
                </div>
                <div class="col-md-7 col-sm-4 col-xs-3">
                    <div class="navigation">
                        <nav class="navbar navbar-default" role="navigation">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse navbar-ex1-collapse">
                                <ul class="nav navbar-nav">
                                    <li class=" <?php if ($nav == 'profile') echo 'active'; ?>"><a href="<?= site_url('accounts/passenger/profile') ?>">Profile</a></li>
                                    <li class=" <?php if ($nav == '') echo 'active'; ?>"><a href="<?= site_url() ?>">Make New Bookings</a></li>
                                    <li class=" <?php if ($nav == 'booking_history') echo 'active'; ?>"><a href="<?= site_url('accounts/passenger/booking_history') ?>">Booking History</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-5">
                    <div class="dshbd-nav">
                        <!--which one is better OR .dshbd-drawer-navigation nav > ul.cd-navigation.cd-single-item-wrapper-->
                        <nav id="cd-top-nav">
                            <ul class="list-unstyled">
                                <li><a href="<?= site_url('accounts/passenger/profile') ?>"><i class="fa fa-user"> </i> <span>Hi, <?= $passenger->full_name; ?></span></a></li>
                                <li><a href="<?= site_url('accounts/passenger/logout') ?>" class="btn cstm-btn">Logout</a></li>
                            </ul>
                        </nav>                 
                    </div>
                </div>
            </div>        
        </div>
    </div>
</header>

<div class="clearfix"></div>