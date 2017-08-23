<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="ft-col">
                    <h4>Quick Links</h4>
                    <ul class="angle-list">
                        <li><a href="<?= site_url()?>">Home</a></li>
                        <li><a href="<?= site_url('about')?>">About</a></li>
                        <li><a href="<?= site_url('services')?>">Services</a></li>
                        <li><a href="<?= site_url('fare-guide')?>">Fare Guide</a></li>
                        <li><a href="<?= site_url('contact')?>">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="ft-col">
                    <h4>Legal Information</h4>
                    <ul class="angle-list">
                        <li><a href="<?= site_url('terms-and-conditions')?>">Terms &amp; Condition</a></li>
                        <li><a href="<?= site_url('cancellation-policy')?>">Cancellation Policy</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="ft-col">
                    <h4>Area We Serve</h4>
                    <ul class="angle-list">
                        <li><a href="#">LOrem Ipsum </a></li>
                        <li><a href="#">LOrem Ipsum </a></li>
                        <li><a href="#">LOrem Ipsum </a></li>
                        <li><a href="#">LOrem Ipsum </a></li>
                        <li><a href="#">LOrem Ipsum </a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="ft-col">
                    <h4>Contact Details</h4>
                    <ul class="angle-list">
                        <li><strong><?=SITE_NAME?>,</strong></li>
                        <li><?=ADDRESS_NAME?></li>
                        <li><a href="tel:<?=SITE_NUMBER?>"><?=SITE_NUMBER?></a></li>
                        <li><a href="mailto:<?=SITE_EMAIL?>"><?=SITE_EMAIL?></a></li>
                        <li>Check Our Reviews On <a href="#">www.mklive.co.uk</a></li>
                        <li>Milton Keynes Business Guide</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        &copy; Copyright <?= date('Y') ?>. All Rights Reserved. <?=SITE_NAME?>
    </div>
</footer>

<script src="<?= base_url() ?>assets/bower_components/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="<?= site_url('assets') ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= site_url('assets') ?>/bower_components/slick-carousel/slick/slick.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/bower_components/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/bower_components/jt.timepicker/jquery.timepicker.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA63EQfeU9KZGRHViThrJtTUTYH21zD1zQ&libraries=places,geometry"></script>
<script src="<?= base_url('assets') ?>/bower_components/geocomplete/jquery.geocomplete.min.js" type="text/javascript"></script>

<script src="<?= site_url('assets') ?>/js/custom.js"></script>
<script>
    $(document).ready(function () {
        $('#dt-quote').validate();
        var start = $("#start"), end = $('#end');
        start.geocomplete({
            country: 'uk',
            details: ".start",
            detailsAttribute: "data-geo",
            types: ['geocode', 'establishment']
        });
        end.geocomplete({
            country: 'uk',
            details: ".end",
            detailsAttribute: "data-geo",
            types: ['geocode', 'establishment']
        });      
        $('.datepicker').datepicker({
            minDate: 0,
            dateFormat: 'dd/mm/yy'
        });
        $('.timepicker').timepicker();      
    });
</script>
</body>
</html>