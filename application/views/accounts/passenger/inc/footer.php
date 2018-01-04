<footer>
    <div class="dshbd-ft-end">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <ul class="list-inline ft-social">
                    <li><a href=""  itemprop="url"><i class="fa fa-facebook"></i></a></li>
                    <li><a href=""  itemprop="url"><i class="fa fa-twitter"></i></a></li>
                    <li><a href=""  itemprop="url"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#!"  itemprop="url"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
            <div class="col-md-8 col-sm-6 col-xs-12">
            <div class="ft-copy">
                <p>&copy; Copyright <?= date('Y') ?>. All Rights Reserved. <span><?= SITE_NAME ?></span></p>
            </div>
            </div>
        </div>
    </div>
</footer>

<!-- bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Slick -->
<!--<script src="<?= base_url('assets') ?>/bower_components/slick-carousel/slick/slick.min.js" type="text/javascript"></script>-->
<!-- jquery ui -->
<script src="<?= base_url('assets') ?>/bower_components/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?= base_url('assets') ?>/bower_components/timepicker/timepicker.js"></script>
<script src="<?= base_url('assets') ?>/bower_components/geocomplete/jquery.geocomplete.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/bower_components/jquery-validation/dist/jquery.validate.min.js'); ?>"></script>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDT6zEpyAmE5P2k_TPVecXzUx8IJqEUg0A"></script>
<!-- bxslider -->
<script src="<?= base_url('assets') ?>/bower_components/bxslider-4/dist/jquery.bxslider.js"></script>
<!--Drawer secondary-expandable-navigation js-->
<script src="<?= base_url('assets') ?>/drawer/js/modernizr.js"></script> 
<script src="<?= base_url('assets') ?>/drawer/js/main.js"></script> 
<!-- CC Validator -->
<script src="<?= base_url('assets') ?>/bower_components/jquery-creditcardvalidator/jquery.creditCardValidator.js" type="text/javascript"></script>
<script src="<?= base_url() ?>/assets/admin/bower_components/datatables/media/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>/assets/admin/bower_components/datatables/media/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<!--custom-->
<script src="<?= base_url('assets') ?>/js/custom.js" type="text/javascript"></script>
<script src="<?= base_url('assets') ?>/js/bootbox.min.js" type="text/javascript"></script>

<script>
    $(document).ready(function () {
        var type = $('#journey-type').val();
        if (type == 'from_airport') {
            $("#from").val("Boston Logan International Airport");
            $("#from").prop('disabled', true);
        } else if (type == 'to_airport') {
            $("#to").val("Boston Logan International Airport");
            $("#to").prop('disabled', true);
        } else if (type == 'point_to_point') {
            $("#to").prop('disabled', false);
            $("#from").prop('disabled', false);
        }
        $('#journey-type').on("change", function () {
            var service = $(this).val();
            if (service === "from_airport") {
                $("#from").val("Boston Logan International Airport");
                $("#from").prop('disabled', true);
                $("#to").prop('disabled', false);
                $("#to").val("");
            } else if (service === "to_airport") {
                $("#to").val("Boston Logan International Airport");
                $("#to").prop('disabled', true);
                $("#from").prop('disabled', false);
                $("#from").val("");
            } else if (service === "point_to_point") {
                $("#to").val("");
                $("#from").val("");
                $("#to").prop('disabled', false);
                $("#from").prop('disabled', false);
            }
        });
    });
</script>
</body>
</html>


