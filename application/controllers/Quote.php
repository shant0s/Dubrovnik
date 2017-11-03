<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Booking_quote
 *
 * @author Sujendra
 */
class Quote extends Public_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('email');
        $this->load->helper('form');
        $this->load->model('fare_breakdown_model');
        $this->load->model('admin_model');
        $this->load->model('booking_info_model');
        $this->load->model('additional_rate_model');
        $this->load->model('fleet_model');
        $this->load->model('fix_rate_by_model');
        $this->load->model('run_query_model');
    }

    function index() {
        $quote = $this->input->post();
        if (!$quote) {
            redirect(site_url());
        }
        $this->session->set_userdata('quote', $quote);

        
        $google_data = calDistance($quote['start_lat'] . ',' . $quote['start_lng'], $quote['end_lat'] . ',' . $quote['end_lng']);

        $this->_compute_rate_and_sotre_in_session($google_data['distance'], $quote);

        $this->session->set_userdata('google_data', $google_data);
//        debug($this->session->all_userdata());
        redirect(base_url('quote/vehicle_select'));
    }

    function vehicle_select() {
        $this->data['google_data'] = $this->session->userdata('google_data');
        $this->data['quote'] = $this->session->userdata('quote');

        $this->data['session_one_way_total_fare'] = $this->session->userdata('session_one_way_total_fare');
        $this->data['session_two_way_total_fare'] = $this->session->userdata('session_two_way_total_fare');

        $this->data['fleets'] = $this->fleet_model->get_all();
        $this->data['main_content'] = 'frontend/quote/_vehicle_select';
        $this->load->view(FRONTEND, $this->data);
    }

    function booking() {
        $post = $this->input->post();

        if ($post) {
            $this->data['vehicle_info'] = $post;
            $this->session->set_userdata('vehicle_info', $post);
        }
        if (segment(3) != '') {
            $this->data['booking_post_infos'] = $this->session->userdata('booking_post_info');
            $this->data['vehicle_quote_infos'] = $this->session->userdata('vehicle_info');
            if ($this->session->userdata('quote_info')['journey_type'] == 'one_way') {
                $this->data['vehicle_fare'] = $this->session->userdata('session_one_way_total_fare')[$vehical_id];
            } else {
                $this->data['vehicle_fare'] = $this->session->userdata('session_two_way_total_fare')[$vehical_id];
            }
            $this->data['is_edit'] = FALSE;
        } else {
            $this->data['is_edit'] = TRUE;
        }
        $this->data['vehicle_info'] = $this->session->userdata('vehicle_info');

        if ($this->data['vehicle_info']['journey_type'] == 'one_way') {
            $this->data['vehicle_fare'] = $this->session->userdata('session_one_way_total_fare')[$this->data['vehicle_info']['vehicle_id']];
        } else {
            $this->data['vehicle_fare'] = $this->session->userdata('session_two_way_total_fare')[$this->data['vehicle_info']['vehicle_id']];
        }
        $this->session->set_userdata('vehicle_fare', $this->data['vehicle_fare']);
        $this->data['fleet'] = $this->fleet_model->get(array('id' => $this->data['vehicle_info']['vehicle_id']));
        $this->data['google_data'] = $this->session->userdata('google_data');
        $this->data['quote'] = $this->session->userdata('quote');

//        debug($this->data);
        $this->data['main_content'] = 'frontend/quote/_booking';
        $this->load->view(FRONTEND, $this->data);
    }

    function confirm() {
        $post = $this->input->post();
        if ($post) {
            $this->session->set_userdata('booking_post_info', $post);
        }
        $this->data['quote'] = $this->session->userdata('quote');
        $this->data['booking_post'] = $this->session->userdata('booking_post_info');
        $this->data['vehicle_info'] = $this->session->userdata('vehicle_info');
        $this->data['fleet'] = $this->fleet_model->get(array('id' => $this->data['vehicle_info']['vehicle_id']));

        $this->data['grand_total_charge'] = $this->_speciific_vehical_additional_rate_calculation($this->data['vehicle_info'], $this->session->userdata('vehicle_fare'), $this->data['quote']['start']);
        $this->data['google_data'] = $this->session->userdata('google_data');

//        debug($this->data);
        $this->data['main_content'] = 'frontend/quote/_confirm';
        $this->load->view(FRONTEND, $this->data);
    }

    function finish() {
        $booking_ref_id = $this->booking_info_model->generate_ref_id();
        $session_data = $this->session->all_userdata();
//debug($session_data);
        $booking_infos = array(
            'booking_ref_id' => $booking_ref_id,
//            'passenger_id' => isset($this->data['passenger']) ? $this->data['passenger']->id : '',
            'distance' => $session_data['google_data']['distance'],
            'duration' => $session_data['google_data']['duration'],
            'pickup_address' => $session_data['quote']['start'],
            'pickup_address_line' => $session_data['booking_post_info']['pickup_address_line'],
            'dropoff_address' => $session_data['quote']['end'],
            'dropoff_address_line' => $session_data['booking_post_info']['dropoff_address_line'],
            'pickup_date' => $session_data['quote']['pickupdate'],
            'pickup_time' => $session_data['quote']['pickuptime'],
            'journey_type' => $session_data['vehicle_info']['journey_type'],
            'total_fare' => $session_data['grand_total_charge'],
            'vehicle_name' => $session_data['vehicle_info']['vehicle_name'],
            'flight_number' => isset($session_data['booking_post_info']['flight_no']) ? $session_data['booking_post_info']['flight_no'] : '',
            'flight_arrive_from' => isset($session_data['booking_post_info']['flight_arrive_from']) ? $session_data['booking_post_info']['flight_arrive_from'] : '',
            'client_name' => $session_data['booking_post_info']['client_name'],
            'client_email' => $session_data['booking_post_info']['client_email'],
            'client_phone' => $session_data['booking_post_info']['client_phone'],
            'client_address' => $session_data['booking_post_info']['client_address'],
            'client_passanger_no' => $session_data['booking_post_info']['client_passanger_no'],
            'client_baby_no' => $session_data['booking_post_info']['client_baby_no'],
            'client_luggage' => $session_data['booking_post_info']['client_luggage'],
            'client_hand_luggage' => $session_data['booking_post_info']['client_hand_luggage'],
            'waiting_time' => $session_data['booking_post_info']['waiting_time'],
            'client_return_date' => isset($session_data['booking_post_info']['return_date']) ? $session_data['booking_post_info']['return_date'] : '',
            'client_return_time' => isset($session_data['booking_post_info']['return_time']) ? $session_data['booking_post_info']['return_time'] : '',
            'message' => $session_data['booking_post_info']['message'],
            'pay_method' => $session_data['booking_post_info']['pay_method']
        );
        $booking_id = $this->booking_info_model->insert($booking_infos);

        if ($session_data['booking_post_info']['pay_method'] == 'paypal') {
            $query = array();
            $query['notify_url'] = site_url('quote/paypal_ipn/' . $booking_ref_id);
            $query['return'] = site_url('thank-you');
            $query['cmd'] = '_cart';
            $query['upload'] = '1';
            $query['business'] = PAYPAL_EMAIL;
            $query['address_override'] = '1';
            $query['item_name_1'] = "Payment for Booking RefId: " . $booking_ref_id;
            $query['quantity_1'] = 1;
            $query['currency_code'] = 'GBP';
            $query['amount_1'] = $session_data['grand_total_charge'];

            // Prepare query string
            $query_string = http_build_query($query);

            header('Location: https://www.sandbox.paypal.com/cgi-bin/webscr?' . $query_string);
            return;
        } else {
            set_flash('msg', 'Thank you for booking. Please check the confirmation email and pay the full amount to the driver');
            $this->send_booking_received_email($booking_infos);
        }
        redirect(site_url('thank-you'));
    }

    private function _compute_rate_and_sotre_in_session($distance, $quote) {
        $fare = 0;

        // 1. Zone Rate (By Amount) 
        $fare = $this->_zone_rate_calculation($quote, $distance);
        if ($fare) {
            $total_fare = $this->_additional_rate_calculation($fare, $quote['start'], $quote['end']);
        }
//        debug($total_fare);
        // 2.Airport / Normal Rate : Break Down        
        if (!$fare) {
            $min_rate = $this->fare_breakdown_model->get(array('is_min' => 1));
            if ($distance > $min_rate->end) {
                $fare = $min_rate->rate;
                $this->fare_breakdown_model->where('start <=', $distance);
                $fare_ranges = $this->fare_breakdown_model->get_all(array('is_min' => 0));

                $new_dist = $distance - $min_rate->end;

                foreach ($fare_ranges as $fare_range) {
                    $fare += ($new_dist < $fare_range->end - $fare_range->start) ? ($new_dist * $fare_range->rate) : (($fare_range->end - $fare_range->start) * $fare_range->rate);
                    $new_dist = $new_dist - ($fare_range->end - $fare_range->start);
                }
            } else {
                $fare = $min_rate->rate;
            }

            $total_fare = $this->_additional_rate_calculation_for_breakdown($fare, $quote['start']);
        }
        $this->session->set_userdata('session_one_way_total_fare', $total_fare[0]); // Here index "0" denotes for One Way Travelling cost
        $this->session->set_userdata('session_two_way_total_fare', $total_fare[1]); // Here index "1" denotes for Two Way Travelling cost
//        debug($this->session->userdata('session_one_way_total_fare'));
    }

    private function _zone_rate_calculation($quote, $distance) {
        $sql = "SELECT *  FROM `zones_rate` as zr "
                . "INNER JOIN `zones` as z1 on z1.id=zr.from_id "
                . "INNER JOIN `zones` as z2 on z2.id=zr.to_id "
                . "WHERE ST_WITHIN(Point({$quote['start_lng']},{$quote['start_lat']}), z1.points) "
                . "AND ST_WITHIN(Point({$quote['end_lng']},{$quote['end_lat']}), z2.points)";

        $zone_data = $this->db->query($sql)->row();

        if (empty($zone_data)) {
            return false;
        }

//       Zone Fare rate calculation
        if ($zone_data->rate_type == "fix") {
            $fare = $zone_data->rate;
        } else {
            $fare = $zone_data->rate * $distance;
            ($zone_data->minimum_rate >= $fare) ? $fare = $zone_data->minimum_rate : '';
        }
        return $fare;
    }

    private function _additional_rate_calculation($fare, $start, $end) {
//        $fare=1;
        $fleets = $this->fleet_model->get_all();
        $additional_rate = $this->additional_rate_model->get();

        foreach ($fleets as $index => $fleet):
            if (isAirport($start)) {
                $total_one_way[$fleet->id] = round(($fare + $fare * ($fleet->raise_by / 100) + $additional_rate->airport_pickup_fee), 2);
                $total_two_way[$fleet->id] = round($total_one_way[$fleet->id] + ($total_one_way[$fleet->id] - ($total_one_way[$fleet->id] * ($additional_rate->round_trip / 100))), 2);
            } else {
                $total_one_way[$fleet->id] = round(($fare + $fare * ($fleet->raise_by / 100)), 2);
                $total_two_way[$fleet->id] = round($total_one_way[$fleet->id] + ($total_one_way[$fleet->id] - ($total_one_way[$fleet->id] * ($additional_rate->round_trip / 100))), 2);
            }
        endforeach;
        $total_fare = array($total_one_way, $total_two_way);

        return $total_fare;
    }

    private function _additional_rate_calculation_for_breakdown($fare, $start) {    // $subtotal is subtotal fare
        $fleets = $this->fleet_model->get_all();

        $additional_rate = $this->additional_rate_model->get();

        foreach ($fleets as $fleet):
            if (isAirport($start) == 'yes') {
                $total_one_way[$fleet->id] = round(($fare + $fare * ($fleet->raise_by / 100) + $additional_rate->airport_pickup_fee), 2);
                $total_two_way[$fleet->id] = round($total_one_way[$fleet->id] + ($total_one_way[$fleet->id] - ($total_one_way[$fleet->id] * ($additional_rate->round_trip / 100))), 2);
            } else {
                $total_one_way[$fleet->id] = round(($fare + $fare * ($fleet->raise_by / 100)), 2);
                $total_two_way[$fleet->id] = round($total_one_way[$fleet->id] + ($total_one_way[$fleet->id] - ($total_one_way[$fleet->id] * ($additional_rate->round_trip / 100))), 2);
            }
        endforeach;
        $total_fare = array($total_one_way, $total_two_way);
//debug($total_fare);
        return $total_fare;
    }

    private function _speciific_vehical_additional_rate_calculation($vehicle_info, $vehical_fare, $start) {
        $additional_rate = $this->additional_rate_model->get();
        $client_infos = $this->session->userdata('booking_post_info');

        if ($client_infos['pay_method'] == 'cash') {
            $additional_meet_and_greet = isset($client_infos['meet_and_greet']) && $client_infos['meet_and_greet'] == 'yes' ? $additional_rate->meet_and_greet : 0;
            $additional_charge = ($additional_rate->baby_seater) * ($client_infos['client_baby_no']) + $additional_meet_and_greet;
            $total = ($vehical_fare) + $additional_charge;
            $additional_airport_pickup = (isAirport($start)) ? $additional_rate->airport_pickup_fee : 0;
            $grand_total_charge = array(
                'additional_airport_pickup_charge' => (isAirport($start) == 'yes') ? $additional_rate->airport_pickup_fee : 0,
                'additional_airport_baby_seater_charge' => ($additional_rate->baby_seater) * ($client_infos['client_baby_no']),
                'additional_card_service_charge' => '0',
                'additional_meet_and_greet' => $additional_meet_and_greet,
                'additional_charge' => $additional_charge + $additional_airport_pickup,
                'total' => $total
            );
        } else {
            $additional_charge = 0;
            $total = 0;
            $additional_meet_and_greet = isset($client_infos['meet_and_greet']) && $client_infos['meet_and_greet'] == 'yes' ? $additional_rate->meet_and_greet : 0;
            $grand_total_charge = array(
                'additional_airport_pickup_charge' => (isAirport($start)) ? $additional_rate->airport_pickup_fee : 0,
                'additional_airport_baby_seater_charge' => ($additional_rate->baby_seater) * ($client_infos['client_baby_no']),
                'additional_meet_and_greet' => $additional_meet_and_greet,
            );
            if ($additional_rate->card_fee_type == 'By_Percentage') {
                $additional_charge = ($additional_rate->baby_seater) * ($client_infos['client_baby_no']);
                $sub_additional_charge = $vehical_fare + $additional_charge;
                $additional_card_service_charge = $sub_additional_charge * (($additional_rate->card_fee) / 100);
                $subtotal = $sub_additional_charge + $additional_card_service_charge + $additional_meet_and_greet;
                $total = $subtotal;
                $additional_airport_pickup = (isAirport($start)) ? $additional_rate->airport_pickup_fee : 0;
                $grand_total_charge['additional_charge'] = $additional_charge + $additional_card_service_charge + $additional_airport_pickup + $additional_meet_and_greet;
                $grand_total_charge['additional_card_service_charge'] = $additional_card_service_charge;
                $grand_total_charge['total'] = $total;
            } else {
                $additional_charge = ($additional_rate->baby_seater) * ($client_infos['client_baby_no']) + $additional_rate->card_fee;
                $total = $additional_charge + $vehical_fare + $additional_meet_and_greet;
                $additional_airport_pickup = (isAirport($start)) ? $additional_rate->airport_pickup_fee : 0;
                $grand_total_charge['additional_charge'] = $additional_charge + $additional_airport_pickup + $additional_meet_and_greet;
                $grand_total_charge['additional_card_service_charge'] = $additional_rate->card_fee;
                $grand_total_charge['total'] = $total;
            }
        }
//        debug($grand_total_charge['total']);
        $this->session->set_userdata('grand_total_charge', $grand_total_charge['total']);
        return $grand_total_charge;
    }

    private function send_booking_received_email($booking_infos) {
        $admin_emailer_template = $this->load->view('emailer/booking_emailler', array('data' => $booking_infos, 'emailer_to' => 'admin'), true);
        $client_emailer_template = $this->load->view('emailer/booking_emailler', array('data' => $booking_infos, 'emailer_to' => 'client'), true);
        $admin_mergedHtml = common_emogrifier($admin_emailer_template);
        $client_mergedHtml = common_emogrifier($client_emailer_template);

        $this->load->helper('email_helper');
        $is_email_sent_admin = email_help(ADMIN_EMAIL, "[RefID: {$booking_infos['booking_ref_id']}] Booking Received - " . SITE_NAME, $admin_mergedHtml, array(SITE_EMAIL => SITE_NAME));
        $is_email_sent_pax = email_help($booking_infos['client_email'], "[RefID: {$booking_infos['booking_ref_id']}] Booking received - " . SITE_NAME, $client_mergedHtml, array(SITE_EMAIL => SITE_NAME));
    }

    function paypal_ipn($booking_ref_id = null) {
        if (!$booking_ref_id) {
            show_404();
        }

        $post = $this->input->post();

        if (!isset($post['payment_gross'])) {
            show_error('Invalid ipn request.');
        }
        $this->booking_info_model->update(array('is_paid' => 1), array('booking_id' => $booking_ref_id));
        $booking_data = $this->booking_info_model->get(array('booking_ref_id' => $booking_ref_id));

        if ($booking_data) {
            $this->send_booking_received_email($booking_data);
            $this->session->set_flashdata('msg_success', 'Thank you for the payment. Your booking has been received. We will get back to you shortly.');
        }
    }

}
