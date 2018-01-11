<footer class="footer">
    <div class="container">
        <div class="footer-link">
            <div class="row">
                <div class="col-sm-2 col-xs-6">
                    <div class="footer-item">
                        <h4>Quick Links</h4>
                        <ul>
                            <li><a href="<?= site_url(); ?>">Home</a></li>
                            <li><a href="<?= site_url('fleet'); ?>">Fleet</a></li>
                            <li><a href="<?= site_url('price'); ?>">Price</a></li>
                            <li><a href="<?= site_url('contact'); ?>">Contact</a></li>
                            <li><a href="<?= site_url('rent'); ?>">Rent a car</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <div class="footer-item xtra">
                        <h4>Service</h4>
                        <ul>
                            <li><a href="<?= site_url('airport-transfer') ?>">Airport transfers</a></li>
                            <li><a href="<?= site_url('minibus-service') ?>">Minibus Service</a></li>
                            <li><a href="<?= site_url('bus-coach-service') ?>">Bus (coach) service</a></li>
                            <li><a href="<?= site_url('chauffer-service') ?>">Chauffer Service</a></li>
                            <li><a href="<?= site_url('excursions') ?>">Excursions</a></li>
                            <li><a href="<?= site_url('group-travel') ?>">Group Travel</a></li>
                            <li><a href="<?= site_url('other-services') ?>">Other Services</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <div class="footer-item xtra">
                        <h4>Partners</h4>
                        <ul>
                            <li><a href="http://www.dubrovnik-hotels.info/">Dubrovnik Hotels</a></li>
                            <li><a href="http://www.dubrovnik-private-accommodation.net/">Private Lodging</a></li>
                            <li><a href="http://dubrovnik-tours.info/">Dubrovnik Tours</a></li>
                            <li><a href="http://www.taxiservicedubrovnik.com/">Visit Dubrovnik</a></li>
                            <li><a href="http://www.tom-tours.com/">Tom Tours</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <div class="footer-item">
                        <h4>Contact</h4>
                        <ul>
                           <?php $footer_contact = get_page_by_slug('footer-contact'); ?>
                            <?= $footer_contact->desc; ?>
                        </ul>
                        <div class="icons-center">
                            <ul class="icons">
                                <?php $footer_social_links = get_page_by_slug('social-media-links'); ?>
                                <?= $footer_social_links->desc; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <article class="copyright text-center">Copyright © <a href="<?= site_url(); ?>"><?= SITE_NAME; ?></a> <?= date('Y'); ?></article>
</footer>




<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="assets/bower_components/jquery/dist/jquery.js"></script>
<!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>-->
<script src="assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script src="assets/bower_components/geocomplete/jquery.geocomplete.min.js"></script>
<script src="assets/slick/slick/slick.min.js"></script>
<script src="assets/js/custom.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>-->
<script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/admin/js/jquery.validate.js');?>"></script>
<script src="<?php echo base_url('assets/admin/js/jquery.validate.js');?>"></script>
<script src="<?php echo base_url('assets/admin/js/jquery.timepicker.js');?>"></script>

<script>
    $('.form').validate();

    $('#datepicker').datepicker();

    $('#timepicker').timepicker();

</script>
</body>
</html>
