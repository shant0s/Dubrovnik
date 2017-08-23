<script>

    var mapsApi_initMap, mapsApi_route;
    
    var start = "<?= $quote['start'] ?>";
    var start_lat = <?= $quote['start_lat'] ?>;
    var start_lng = <?= $quote['start_lng'] ?>;
    var end = "<?= $quote['end'] ?>";
    var end_lat = <?= $quote['end_lat'] ?>;
    var end_lng = <?= $quote['end_lng'] ?>;
    var polyline_map_data = <?= json_encode($google_data['polyline_map_data']) ?>;

    $(document).ready(function () {
        
        var check_select_fleet = function () {
            var fleet_id = $('[name=fleet_id]:checked').val();
            $('.fleets .fleet').hide();
            $('.fleet-' + fleet_id).show();
        }

        check_select_fleet();

        $('[name=fleet_id]').change(check_select_fleet);
        
        /*============================
         * Library Functions: TheManish
         */
        mapsApi_initMap = function () {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 40.0251382, lng: -97.8446859},
                scrollwheel: false,
                zoom: 3
            });
        }

        mapsApi_route = function (map_div, start, start_lat, start_lng, end, end_lat, end_lng, polyline_map_data) {
            var start_lat_lng = {lat: parseFloat(start_lat), lng: parseFloat(start_lng)};
            var end_lat_lng = {lat: parseFloat(end_lat), lng: parseFloat(end_lng)};
            // init map
            var map = new google.maps.Map(map_div);
            // Draw polyline
            var rideCoordinates = google.maps.geometry.encoding.decodePath(polyline_map_data.overview_polyline.points);
            var ridePath = new google.maps.Polyline({
                map: map,
                path: rideCoordinates,
                strokeColor: "#518191",
                strokeOpacity: 1,
            });
            // set map bounds
            var ne = new google.maps.LatLng(polyline_map_data.bounds.northeast.lat, polyline_map_data.bounds.northeast.lng);
            var sw = new google.maps.LatLng(polyline_map_data.bounds.southwest.lat, polyline_map_data.bounds.southwest.lng);
            map.fitBounds(new google.maps.LatLngBounds(sw, ne));
            var markerA = new google.maps.Marker({
                map: map,
                position: start_lat_lng,
                icon: '<?= base_url() ?>assets/images/start.png'
            });
            var infowindowA = new google.maps.InfoWindow({
                content: '<strong>FROM: </strong>' + start
            });
            markerA.addListener('click', function () {
                infowindowA.open(map, markerA);
            });
            var markerB = new google.maps.Marker({
                map: map,
                position: end_lat_lng,
                icon: '<?= base_url() ?>assets/images/end.png'
            });
            var infowindowB = new google.maps.InfoWindow({
                content: '<strong>TO: </strong>' + end
            });
            markerB.addListener('click', function () {
                infowindowB.open(map, markerB);
            });
        }

        mapsApi_initMap();
        mapsApi_route(document.getElementById('map'), start, start_lat, start_lng, end, end_lat, end_lng, polyline_map_data);

    });
</script>