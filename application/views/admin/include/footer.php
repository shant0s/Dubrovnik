<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b><?= SITE_NAME ?></b>
    </div>
    <strong>Copyright &copy; <?php echo date('Y') ?> .</strong> All rights reserved.
</footer>
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery 2.2.3 -->
<script src="<?= base_url('assets/admin') ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?= base_url('assets/admin') ?>/bootstrap/js/bootstrap.min.js"></script>


<!-- Datatables -->
<link href="<?= base_url('assets/bower_components/datatables/media/css/dataTables.bootstrap.min.css') ?>" rel="stylesheet" type="text/css"/>
<script src="<?= base_url('assets/bower_components/datatables/media/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/bower_components/datatables/media/js/dataTables.bootstrap.min.js') ?>"></script>

<!-- Sparkline -->
<script src="<?= base_url('assets/admin') ?>/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?= base_url('assets/admin') ?>/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?= base_url('assets/admin') ?>/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('assets/admin') ?>/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?= base_url('assets/admin') ?>/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?= base_url('assets/admin') ?>/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?= base_url('assets/admin') ?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?= base_url('assets/admin') ?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url('assets/admin') ?>/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/admin') ?>/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="<?= base_url('assets/admin') ?>/dist/js/pages/dashboard.js"></script>-->
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/admin') ?>/dist/js/demo.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?= base_url('assets/admin') ?>/plugins/chartjs/Chart.min.js"></script>
<script src="<?= base_url('assets/admin/js') ?>/wicket-master/wicket.js" type="text/javascript"></script>
<script src="<?= base_url('assets/admin/js') ?>/wicket-master/wicket-gmap3.js" type="text/javascript"></script>
<!--Geo Location-->
<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA63EQfeU9KZGRHViThrJtTUTYH21zD1zQ&libraries=places,geometry"></script>-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADOj7WC49jntL04864klhvXU4eJdVU7cE&libraries=places,geometry,drawing"></script>
<script src="<?= base_url() ?>assets/js/jquery.geocomplete.js"></script>

<script>
    function drawMap(zone) {
        var map;
        var coordinates = zone ? zone : 'null';
        $(window).load(function () {
            initMap();
            init_draw_tools(map);
            draw_polygon(map, coordinates);
        });

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 53.629913, lng: -2.6033413},
                zoom: 5               
            });
        }

        function init_draw_tools(map) {
            var drawingManager = new google.maps.drawing.DrawingManager({
                drawingMode: google.maps.drawing.OverlayType.POLYGON,
                drawingControl: true,
                drawingControlOptions: {
                    position: google.maps.ControlPosition.TOP_CENTER,
                    drawingModes: ['polygon']
                }
            });
            drawingManager.setMap(map);

            google.maps.event.addListener(drawingManager, 'polygoncomplete', function (polygon) {

                var wkt = new Wkt.Wkt();
                wkt.fromObject(polygon);
//                    console.log(wkt.write());
                $('[name=points]').val(wkt.write());

            });
        }

        function draw_polygon(map, coordinates) {

            if (coordinates === null) {
                return;
            }

            var wkt = new Wkt.Wkt();
//                console.log(coordinates);
            wkt.read(coordinates);

            // Construct the polygon.
            var polygon = wkt.toObject({
                strokeColor: '#FF0000',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: '#FF0000',
                fillOpacity: 0.35
            });

//                console.log(polygon);
            polygon.setMap(map);
        }
    }
</script>
<script>
    $(document).ready(function () {

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

    });

</script>


</body>
</html>
