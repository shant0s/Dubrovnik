<?php

function segment($segment) {
    $ci = &get_instance();
    return $ci->uri->segment($segment);
}

function flash() {
    $ci = & get_instance();
    if ($ci->session->flashdata('msg')) {
        echo
        '<div class="alert alert-info alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'
        . $ci->session->flashdata('msg') .
        '</div>';
    }
    if ($ci->session->flashdata('dmsg')) {
        echo
        '<div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'
        . $ci->session->flashdata('dmsg') .
        '</div>';
    }
}

function set_flash($index, $msg) {
    $ci = & get_instance();
    $ci->session->set_flashdata($index, $msg);
}

function check_user($check_index = 'current_user') {
    $ci = & get_instance();
    return ($ci->session->userdata($check_index)) ? $ci->session->userdata($check_index) : false;
}

function check_front_user() {
    $ci = & get_instance();
    return ($ci->session->userdata('front_user')) ? $ci->session->userdata('front_user') : false;
}

function get_userdata($index) {
    $ci = & get_instance();
    return $ci->session->userdata($index) ? $ci->session->userdata($index) : false;
}

function debug($data) {
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    die;
}

function common_emogrifier($emailer) {
    $css = file_get_contents(FCPATH . 'assets' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'emailer.css');
    $emogrifier = new \Pelago\Emogrifier();
    $emogrifier->setHtml($emailer);
    $emogrifier->setCss($css);
    return $emogrifier->emogrify();
}

function get_page_by_slug($slug) {
    if ($slug) {
        $ci = & get_instance();
        $data = array('slug' => $slug);
        $result = $ci->db->get_where('tbl_page', $data)->row();
        return $result;
    }
    return null;
}

function calDistance($start_latlng, $end_latlng, $way_latlng = '', $distance_unit = 'M', $duration_unit = 'm') {


    $url = "https://maps.googleapis.com/maps/api/directions/json?origin=$start_latlng&destination=$end_latlng&waypoints=$way_latlng&alternatives=true&avoid=tolls|highways";

    $c = curl_init();
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($c, CURLOPT_URL, $url);
    curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    $jsonResponse = curl_exec($c);
    curl_close($c);

    $dataset = json_decode($jsonResponse);
    $routes = $dataset->routes;

    if (!$dataset)
        return 0;
    if (!isset($dataset->routes[0]->legs[0]->distance->value))
        return 0;

    //sort the routes based on the distance
    // Code Reference: http://stackoverflow.com/questions/18574496/google-distance-matrix-json-shortest-path-php
    usort($routes, create_function('$a,$b', 'return intval($a->legs[0]->distance->value) - intval($b->legs[0]->distance->value);'));
    $distance = 0;
    $duration = 0;
    //Since multiple routes are generated, we add the distance

    if ($way_latlng != '') {

        $start_address = $routes[0]->legs[0]->start_address;
        $start_location = $routes[0]->legs[0]->start_location;
        $waypoint_address = $routes[0]->legs[0]->end_address;
        $waypoint_location = $routes[0]->legs[0]->end_location;
        $end_address = $routes[0]->legs[1]->end_address;
        $end_location = $routes[0]->legs[1]->end_location;

        foreach ($routes[0]->legs as $leg) {
            $distance += $leg->distance->value;
            $duration += $leg->duration->value;
        }
    } else {
        $start_address = $routes[0]->legs[0]->start_address;
        $start_location = $routes[0]->legs[0]->start_location;
        $waypoint_address = array();
        $waypoint_location = array();
        $end_address = $routes[0]->legs[0]->end_address;
        $end_location = $routes[0]->legs[0]->end_location;

        $distance = $routes[0]->legs[0]->distance->value;
        $duration = $routes[0]->legs[0]->duration->value;
    }

    $data = array(
        'distance' => $distance, // meters
        'duration' => $duration, // seconds
        'polyline_map_data' => array(
            'start_address' => $start_address,
            'start_location' => $start_location,
            'end_address' => $end_address,
            'end_location' => $end_location,
            'bounds' => $routes[0]->bounds,
            'overview_polyline' => $routes[0]->overview_polyline,
            'waypoint_address' => $waypoint_address,
            'waypoint_location' => $waypoint_location,
        )
    );

    if ($distance_unit == "K") {
        $data['distance'] = round(($data['distance'] / 1000), 2); // kilometer
    } else if ($distance_unit == "M") {
        $data['distance'] = round(($data['distance'] * 0.000621371), 2); // miles
    }
    $data['duration'] = secondsToTime($data['duration']);

//    if ($duration_unit == "m") {
//        $data['duration'] = round($data['duration'] / 60, 0); // minutes
//    } else if ($duration_unit == "h") {
//        $data['duration'] = round($data['duration'] / (60 * 60), 0); // hours
//    }

    return $data;
}

function secondsToTime($seconds) {
    //To convert number of seconds into days hours and minutes
    $dtF = new \DateTime('@0');
    $dtT = new \DateTime("@$seconds");
    if ($dtF->diff($dtT)->format('%a') > 0) {
        return $dtF->diff($dtT)->format('%a days, %h hrs, %i mins');
    } else if ($dtF->diff($dtT)->format('%h') > 0) {
        return $dtF->diff($dtT)->format('%h hrs, %i mins');
    } else if ($dtF->diff($dtT)->format('%i') > 0) {
        return $dtF->diff($dtT)->format('%i mins');
    }
}

function isAirport($location) {
    if ((stripos($location, 'airport') !== false || stripos($location, 'Airport') !== false)) {
        return true;
    } else {
        return false;
    }
}