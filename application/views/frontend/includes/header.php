<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="icon" type="image/png" href="assets/images/favicon.png" />
    <title>Dubrovnik</title>

    <!-- Bootstrap -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/slick/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="assets/slick/slick/slick-theme.css"/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800,900|Muli:300,400,600,700,800,900" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="assets/css/master.css" rel="stylesheet">

</head>
<body>
<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="social-icons">
                <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
            <div class="contacts-info">
                <ul>
                    <li><img src="assets/images/mail.png" alt="mail"><a href="mailto:info@dubrovnik-transfers.com">info@dubrovnik-transfers.com</a></li>
                    <li class="xtra"><img src="assets/images/mail.png" alt="mail"><a href="mailto:info@dubrovniktransfers.com">info@dubrovniktransfers.com</a></li>
                    <li class="hiden"><a href="tel:+385 0 959 060 606"><i class="fa fa-phone"></i> +385 0 959 060 606</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="container">
        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= site_url(); ?>"> <img src="assets/images/dubrovnik-logo.png"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right phone">
                    <li>
                        <div class="row">
                            <div class="col-sm-2">
                                <img src="assets/images/phone.png">
                            </div>
                            <div class="col-sm-10">
                                <h4>Call us anytime</h4>
                                <h3><a href="tel:+385 0 959 060 606">+385 0 959 060 606</a></h3>
                            </div>
                        </div>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?= site_url(); ?>">Home</a></li>
                    <li class="dropdown">
                        <a href="<?= site_url('services'); ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Service <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= site_url('airport-transfer'); ?>">Airport transfers</a></li>
                            <li><a href="<?= site_url('minibus-service'); ?>">Minibus Service</a></li>
                            <li><a href="<?= site_url('bus-coach-service'); ?>">Bus (coach) service</a></li>
                            <li><a href="<?= site_url('chauffer-service'); ?>">Chauffer Service</a></li>
                            <li><a href="<?= site_url('excursions'); ?>">Excursions</a></li>
                            <li><a href="<?= site_url('group-travel'); ?>">Group Travel</a></li>
                            <li><a href="<?= site_url('other-services'); ?>">Other Services</a></li>
                        </ul>
                    </li>
                    <li><a href="<?= site_url('fleet'); ?>">Fleet</a></li>
                    <li><a href="<?= site_url('price'); ?>">Price</a></li>
                    <li><a href="<?= site_url('rent'); ?>">Rent a car</a></li>
                    <li><a href="<?= site_url('contact'); ?>">Contact</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>