<?php $nav = $this->uri->segment(1); ?>
<header>
   <div class="container">
      <div class="row">
         <div class="col-md-4">
             <a href="<?= site_url()?>">
               <figure class="logo">
                  <img src="<?=site_url('assets')?>/images/logo.png" alt="Greenline Taxis">
               </figure>
            </a>
         </div>
         <div class="col-md-5">
            <nav class="navbar navbar-default">
               <!-- Brand and toggle get grouped for better mobile display -->
               <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  </button>
                   <a class="navbar-brand" href="<?= site_url()?>">
                     <figure class="logo">
                         <img src="<?=site_url('assets')?>/images/logo.png" alt="<?=SITE_NAME?>">
                     </figure>
                  </a>
               </div>
               <!-- Collect the nav links, forms, and other content for toggling -->
               <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav navbar-right">
                      <li <?php if ($nav == '') echo 'class="active"'; ?>><a href="<?= site_url()?>">Home</a></li>
                      <li <?php if ($nav == 'about') echo 'class="active"'; ?>><a href="<?= site_url('about')?>">About</a></li>
                      <li <?php if ($nav == 'services') echo 'class="active"'; ?>><a href="<?= site_url('services')?>">Services</a></li>
                      <li <?php if ($nav == 'fare-guide') echo 'class="active"'; ?>><a href="<?= site_url('fare-guide')?>">Fare Guide</a></li>
                      <li <?php if ($nav == 'contact') echo 'class="active"'; ?>><a href="<?= site_url('contact')?>">Contact</a></li>
                  </ul>
               </div>
               <!-- /.navbar-collapse -->
            </nav>
         </div>
<!--         <div class="col-md-1 login-wrapper">
            <p>Login As</p>
            <a href="#" class="btn btn-green">Driver</a>
            <a href="#" class="btn btn-green">Customer</a>
         </div>-->
         <div class="col-md-2">
            <div class="top-contact">
               <ul class="list-unstyled">
                  <li>
                     <h5>Call Us</h5>
                  </li>
                  <li><a href="tel:<?=SITE_NUMBER?>"><?=SITE_NUMBER?></a></li>
                  <li><a href="mailto:<?=SITE_EMAIL?>"> <?=SITE_EMAIL?></a></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</header>