<style>
    div#map_geolocation img {
        max-width:none;
    }
    #map-canvas{
        height: 525px;
    }
    #map-canvas img{
        max-width:none !important;
    }
    #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 350px;
    }

    #pac-input:focus {
        border-color: #4d90fe;
    }
</style>
<?php flash() ?>

<div class="box">
    <form action="" method="post">


        <div class="box-header">
            <h3 class="box-title btn-block">
                Zone | Add/Edit
                <div class="pull-right">
                    <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Save</button>
                </div>
            </h3>
        </div><!-- /.box-header -->

        <div class="box-body">

            <div class="form-group">
                <label>Zone Title</label>
                <input type="text" class="form-control" name="title" value="<?= $isEdit ? $zone->title : '' ?>" placeholder="Enter zone title" required="">
            </div>

            <div class="form-group">
                <input type="hidden" name="coordinates" value="<?= $isEdit ? $zone->coordinates : '' ?>">
                <label>Draw zone coverage area</label>
                <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                <div id="map-canvas"></div>
            </div>

        </div><!-- /.box-body -->
    </form>
</div><!-- /.box -->

<!--<script async defer src="https://maps.googleapis.com/maps/api/js?key=<?= MAPS_API_KEY ?>&libraries=drawing"></script>-->
<script src="<?= base_url('assets/Wicket/wicket.js') ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/Wicket/wicket-gmap3.js') ?>" type="text/javascript"></script>
<script>

    var map;
    var coordinates = <?= $isEdit ? "'" . $zone->coordinates . "'" : 'null' ?>;

    $(window).load(function () {
        initMap();
        init_draw_tools(map);
        draw_polygon(map, coordinates);
    });

    function initMap() {
        map = new google.maps.Map(document.getElementById('map-canvas'), {
            center: {lat: 51.5074, lng: 0.1278},
            zoom: 10
        });
        search_box(map);
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

            $('[name=coordinates]').val(wkt.write());

        });
    }

    function draw_polygon(map, coordinates) {

        if (coordinates === null) {
            return;
        }

        var wkt = new Wkt.Wkt();
        console.log(coordinates);
        wkt.read(coordinates);

        // Construct the polygon.
        var polygon = wkt.toObject({
            strokeColor: '#FF0000',
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: '#FF0000',
            fillOpacity: 0.35
        });

        console.log(polygon);

        polygon.setMap(map);
    }

    function search_box(map) {
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function () {
            searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function () {
            var places = searchBox.getPlaces();

            if (places.length == 0) {
                return;
            }

            // Clear out the old markers.
            markers.forEach(function (marker) {
                marker.setMap(null);
            });
            markers = [];

            // For each place, get the icon, name and location.
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function (place) {
                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                }
                var icon = {
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25)
                };

                // Create a marker for each place.
                markers.push(new google.maps.Marker({
                    map: map,
                    icon: icon,
                    title: place.name,
                    position: place.geometry.location
                }));

                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            map.fitBounds(bounds);
        });



    }

</script>
