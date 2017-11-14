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
class Quote extends Public_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('email');
        $this->load->helper('form');
        $this->load->model('fare_breakdown_model');
        $this->load->model('admin_model');
        $this->load->model('booking_info_model');
        $this->load->model('additional_rate_model');
        $this->load->model('fleet_model');
        $this->load->model('rush_hour_model');
        $this->load->model('holidays_model');
        $this->load->model('run_query_model');
    }

    function index()
    {
        $quote = $this->input->post();
        if (!$quote) {
            redirect(site_url());
        }
        $this->session->set_userdata('quote', $quote);


        $google_data = calDistance($quote['start_lat'] . ',' . $quote['start_lng'], $quote['end_lat'] . ',' . $quote['end_lng']);

        $this->ComputerateAndStoreInSession($google_data['distance'], $quote);

        $this->session->set_userdata('google_data', $google_data);
        redirect(base_url('quote/vehicle_select'));
    }

    function vehicle_select()
    {
        $this->data['google_data'] = $this->session->userdata('google_data');
        $this->data['quote'] = $this->session->userdata('quote');

        $this->data['vehicle_fare'] = $this->session->userdata('session_vehicle_selection_fare');
//        debug($this->data['vehicle_fare']);
        $this->data['fleets'] = $this->fleet_model->get_all();
        $this->data['main_content'] = 'frontend/quote/_vehicle_select';
        $this->load->view(FRONTEND, $this->data);
    }

    function booking()
    {
        $post = $this->input->post();
        $this->data['google_data'] = $this->session->userdata('google_data');
        $this->data['quote'] = $this->session->userdata('quote');

        if ($post) {
//            $this->data['vehicle_info'] = $post;
            $this->session->set_userdata('vehicle_info', $post);

        }

        $vehicleFare = $this->session->userdata('session_vehicle_selection_fare');
        $this->data['vehicle_info'] = $this->session->userdata('vehicle_info');
        foreach ($vehicleFare as $fare) {
            if ($fare['fleet_id'] == $this->data['vehicle_info']['vehicle_id']) {
                $vehicle_fare = $fare;
                break;
            }
        }
//        debug($vehicle_fare);
        $this->data['is_edit'] = false;
        if (segment(3) != '') {
            $this->data['booking_post_infos'] = $this->session->userdata('booking_post_info');

            if ($this->data['vehicle_info']['journey_type'] == 'one_way') {
                $this->data['vehicle_fare'] = $vehicle_fare['rate'];
            } else {
                $this->data['vehicle_fare'] = $vehicle_fare['round_trip_rate'];
            }
            $this->data['is_edit'] = true;
        }

        if ($this->data['vehicle_info']['journey_type'] == 'one_way') {
            $this->data['vehicle_fare'] = $vehicle_fare['rate'];
        } else {
            $this->data['vehicle_fare'] = $vehicle_fare['round_trip_rate'];
        }
        $this->session->set_userdata('vehicle_fare', $this->data['vehicle_fare']);
        $this->data['fleet'] = $this->fleet_model->get(array('id' => $this->data['vehicle_info']['vehicle_id']));

//        debug($this->data);
        $this->data['main_content'] = 'frontend/quote/_booking';
        $this->load->view(FRONTEND, $this->data);
    }

    function confirm()
    {
        $post = $this->input->post();
        if ($post) {
            $this->session->set_userdata('booking_post_info', $post);
        }
        $this->data['quote'] = $this->session->userdata('quote');
        $this->data['booking_post'] = $this->session->userdata('booking_post_info');
        $this->data['vehicle_info'] = $this->session->userdata('vehicle_info');
        $this->data['fleet'] = $this->fleet_model->get(array('id' => $this->data['vehicle_info']['vehicle_id']));

        $this->data['grand_total_charge'] = $this->VehicleSpecificAdditionalRate($this->data['vehicle_info'], $this->session->userdata('vehicle_fare'), $this->data['quote'], $this->data['booking_post']);
//        debug($this->data['grand_total_charge']);
        $this->data['google_data'] = $this->session->userdata('google_data');

//        debug($this->data);
        $this->data['main_content'] = 'frontend/quote/_confirm';
        $this->load->view(FRONTEND, $this->data);
    }

    function finish()
    {
        $booking_ref_id = $this->booking_info_model->generate_ref_id();
        $session_data = $this->session->all_userdata();
//        debug($session_data);
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
            'client_passenger_no' => $session_data['booking_post_info']['client_passenger_no'],
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

        if ($session_data['booking_post_info']['pay_method'] == 'paypall') {
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
            $this->SendBookingReceivedEmail($booking_infos);
        }
        redirect(site_url('thank-you'));
    }

    private function ComputerateAndStoreInSession($distance, $quote)
    {
        $fleets = $this->fleet_model->get_all();

        foreach ($fleets as $key => $fleet) {
            // 1. Zone Rate (By Amount)
            $main_fare[$key] = $this->ZoneRateCalculation($quote, $distance, $fleet);

            if ($main_fare[$key]['rate']) {
                $fare = $this->RoundTripRateCalculationForZone($main_fare[$key]['rate'], $fleet, $quote);
                $main_fare[$key]['rate'] = $fare['rate'];
                $main_fare[$key]['round_trip_rate'] = $fare['round_trip_rate'];
            }
            // 2. Normal Rate : Break Down
            if (!$main_fare[$key]['rate']) {
                $min_rate = $this->fare_breakdown_model->get(['is_min' => 1, 'fleet_id' => $fleet->id]);
                if (!$min_rate) {
                    $main_fare[$key] = [
                        'fleet_id' => $fleet->id,
                        'rate' => 0,
                        'round_trip_rate' => 0
                    ];
                    continue;
                }
                $main_fare[$key] = $this->BreakDownCalculation($distance, $min_rate, $fleet, $key);

                if ($main_fare[$key]['rate']) {
                    $fare = $this->RoundTripRateCalculationForFareBreakDown($main_fare[$key]['rate'], $fleet, $quote);
                    $main_fare[$key]['rate'] = $fare['rate'];
                    $main_fare[$key]['round_trip_rate'] = $fare['round_trip_rate'];
                }
            }
//            Rush Hour Charge

            $rush_hour_charge = $this->CheckRushHour($fleet, $quote);
            if ($rush_hour_charge) {
                $main_fare[$key]['rate'] += $rush_hour_charge;
                $main_fare[$key]['round_trip_rate'] += $rush_hour_charge;
            }

//            Holiday Charge
            $holiday_charge = $this->CheckHolidays($fleet, $quote);
            if ($holiday_charge) {
                $main_fare[$key]['rate'] += $holiday_charge;
                $main_fare[$key]['round_trip_rate'] += $holiday_charge;
            }

        }
//        debug($main_fare);
        $this->session->set_userdata('session_vehicle_selection_fare', $main_fare);
    }

    private function CheckRushHour($fleet, $quote)
    {
        $check_time = $this->rush_hour_model->get_all(['fleet_id' => $fleet->id, 'status' => 1]);
        foreach ($check_time as $check) {
            if ($this->IsBetween($check->start_time, $check->end_time, $quote['pickuptime'])) {
                return $check->charge;
                break;
            }
        }

    }

    private function CheckHolidays($fleet, $quote)
    {

        $allHolidays = $this->holidays_model->get_all(['fleet_id' => $fleet->id, 'is_active' => 1]);
        $userDateTime = DateTime::createFromFormat('d/m/Y h:i a', $quote['pickupdate'] . ' ' . $quote['pickuptime']);
        if (!empty($allHolidays)) {
            foreach ($allHolidays as $holiday) {
                $ourStartingDate = DateTime::createFromFormat('Y-m-d H:i:s', $holiday->starting_date . ' ' . $holiday->starting_time);
                $ourEndingDate = DateTime::createFromFormat('Y-m-d H:i:s', $holiday->ending_date . ' ' . $holiday->ending_time);
                if ($ourStartingDate <= $userDateTime && $ourEndingDate >= $userDateTime) {
                    return $holiday->charge;
                    break;
                }
            }
        }
    }

    private function IsBetween($from, $till, $input)
    {
        $f = DateTime::createFromFormat('!H:i:s', $from);
        $t = DateTime::createFromFormat('!H:i:s', $till);
        $i = DateTime::createFromFormat('!h:ia', $input);
        if ($f > $t)
            $t->modify('+1 day');
        return ($f <= $i && $i <= $t) || ($f <= $i->modify('+1 day') && $i <= $t);
    }

    private function ZoneRateCalculation($quote, $distance, $fleet)
    {
        $sql = "SELECT *  FROM `zones_rate` as zr "
            . "INNER JOIN `zones` as z1 on z1.id=zr.from_id "
            . "INNER JOIN `zones` as z2 on z2.id=zr.to_id "
            . "WHERE ST_WITHIN(Point({$quote['start_lng']},{$quote['start_lat']}), z1.coordinates) "
            . "AND ST_WITHIN(Point({$quote['end_lng']},{$quote['end_lat']}), z2.coordinates) "
            . "AND `fleet_id`= {$fleet->id}";

        $zone_data = $this->db->query($sql)->row();
//        debug($zone_data);

        if (empty($zone_data)) {
            $fare = [
                'fleet_id' => $fleet->id,
                'rate' => 0,
            ];
            return $fare;
        }

//       Zone Fare rate calculation
        if ($zone_data->rate_type == "fix") {
            $fare = [
                'fleet_id' => $zone_data->fleet_id,
                'rate' => $zone_data->rate,
            ];
        } else {
            $fare = [
                'fleet_id' => $zone_data->fleet_id,
                'rate' => $zone_data->rate * $distance,
            ];
            ($zone_data->minimum_rate >= $fare['rate']) ? $fare['rate'] = $zone_data->minimum_rate : '';
        }
        return $fare;
    }

    private function BreakDownCalculation($distance, $min_rate, $fleet, $key)
    {
        if ($distance > $min_rate->end) {
            $fare = $min_rate->rate;
            $this->fare_breakdown_model->where('start <=', $distance);
            $fare_ranges = $this->fare_breakdown_model->get_all(['is_min' => 0, 'fleet_id' => $fleet->id]);

            $new_dist = $distance - $min_rate->end;

            foreach ($fare_ranges as $fare_range) {
                $fare += ($new_dist < $fare_range->end - $fare_range->start) ? ($new_dist * $fare_range->rate) : (($fare_range->end - $fare_range->start) * $fare_range->rate);
                $new_dist = $new_dist - ($fare_range->end - $fare_range->start);
            }
            $breakdown_fare = [
                'fleet_id' => $fleet->id,
                'rate' => $fare
            ];
        } else {
            $breakdown_fare = [
                'fleet_id' => $fleet->id,
                'rate' => $min_rate->rate
            ];
        }
        return $breakdown_fare;
    }

    private function RoundTripRateCalculationForZone($fare, $fleet, $quote)
    {
//        $fare=1;

        $additional_rate = $this->additional_rate_model->get(['fleet_id' => $fleet->id]);

        if (isAirport($quote['start'])) {
            $one_way_fare = round(($fare + $additional_rate->airport_pickup_fee), 2);
            $two_way_fare = round($one_way_fare + ($one_way_fare - ($one_way_fare * ($additional_rate->round_trip / 100))), 2);
        } else {
            $one_way_fare = round(($fare), 2);
            $two_way_fare = round($one_way_fare + ($one_way_fare - ($one_way_fare * ($additional_rate->round_trip / 100))), 2);
        }

        return (['rate' => $one_way_fare, 'round_trip_rate' => $two_way_fare]);
    }

    private function RoundTripRateCalculationForFareBreakDown($fare, $fleet, $quote)
    {    // $subtotal is subtotal fare

        $additional_rate = $this->additional_rate_model->get(['fleet_id' => $fleet->id]);

        if (isAirport($quote['start'])) {
            $one_way_fare = round(($fare + $fare * ($additional_rate->raise_by / 100) + $additional_rate->airport_pickup_fee), 2);
            $two_way_fare = round($one_way_fare + ($one_way_fare - ($one_way_fare * ($additional_rate->round_trip / 100))), 2);
        } else {
            $one_way_fare = round(($fare + $fare * ($additional_rate->raise_by / 100)), 2);
            $two_way_fare = round($one_way_fare + ($one_way_fare - ($one_way_fare * ($additional_rate->round_trip / 100))), 2);
        }

        return (['rate' => $one_way_fare, 'round_trip_rate' => $two_way_fare]);
    }

    private function VehicleSpecificAdditionalRate($vehicle_info, $vehicle_fare, $quote, $client_infos)
    {

        $additional_rate = $this->additional_rate_model->get(['fleet_id' => $vehicle_info['vehicle_id']]);

        $additional_airport_pickup = (isAirport($quote['start'])) ? $additional_rate->airport_pickup_fee : 0;
        $additional_waiting_time = ($client_infos['waiting_time']) ? $additional_rate->waiting_time : 0;
        $additional_meet_and_greet = isset($client_infos['meet_and_greet']) && $client_infos['meet_and_greet'] == 'yes' ? $additional_rate->meet_and_greet : 0;
        if ($client_infos['pay_method'] == 'cash') {
            $additional_charge = ($additional_rate->baby_seater) * ($client_infos['client_baby_no']) + $additional_meet_and_greet + $additional_waiting_time;
            $total = ($vehicle_fare) + $additional_charge;
            $grand_total_charge = array(
                'additional_airport_pickup_charge' => (isAirport($quote['start'])) ? $additional_rate->airport_pickup_fee : 0,
                'additional_baby_seater_charge' => ($additional_rate->baby_seater) * ($client_infos['client_baby_no']),
                'additional_card_service_charge' => '0',
                'additional_waiting_time' => $additional_waiting_time,
                'additional_meet_and_greet' => $additional_meet_and_greet,
                'additional_charge' => $additional_charge + $additional_airport_pickup,
                'total' => $total
            );
        } else {
            $additional_charge = 0;
            $total = 0;
            $grand_total_charge = array(
                'additional_airport_pickup_charge' => (isAirport($quote['start'])) ? $additional_rate->airport_pickup_fee : 0,
                'additional_baby_seater_charge' => ($additional_rate->baby_seater) * ($client_infos['client_baby_no']),
                'additional_meet_and_greet' => $additional_meet_and_greet,
                'additional_waiting_time' => $additional_waiting_time,
            );
            if ($additional_rate->card_fee_type == 'By_Percentage') {
                $additional_charge = ($additional_rate->baby_seater) * ($client_infos['client_baby_no']) + $additional_waiting_time;
                $sub_additional_charge = $vehicle_fare + $additional_charge;
                $additional_card_service_charge = $sub_additional_charge * (($additional_rate->card_fee) / 100);
                $subtotal = $sub_additional_charge + $additional_card_service_charge + $additional_meet_and_greet;
                $total = $subtotal;

                $grand_total_charge['additional_charge'] = $additional_charge + $additional_card_service_charge + $additional_airport_pickup + $additional_meet_and_greet;
                $grand_total_charge['additional_card_service_charge'] = $additional_card_service_charge;
                $grand_total_charge['total'] = $total;
            } else {
                $additional_charge = ($additional_rate->baby_seater) * ($client_infos['client_baby_no']) + $additional_rate->card_fee + $additional_waiting_time;
                $total = $additional_charge + $vehicle_fare + $additional_meet_and_greet;

                $grand_total_charge['additional_charge'] = $additional_charge + $additional_airport_pickup + $additional_meet_and_greet;
                $grand_total_charge['additional_card_service_charge'] = $additional_rate->card_fee;
                $grand_total_charge['total'] = $total;
            }
        }
//        debug($grand_total_charge['total']);
        $this->session->set_userdata('grand_total_charge', $grand_total_charge['total']);
        return $grand_total_charge;
    }

    private function SendBookingReceivedEmail($booking_infos)
    {
        $admin_emailer_template = $this->load->view('emailer/booking_emailler', array('data' => $booking_infos, 'emailer_to' => 'admin'), true);
        $client_emailer_template = $this->load->view('emailer/booking_emailler', array('data' => $booking_infos, 'emailer_to' => 'client'), true);
        $admin_mergedHtml = common_emogrifier($admin_emailer_template);
        $client_mergedHtml = common_emogrifier($client_emailer_template);

        $this->load->helper('email_helper');
        $is_email_sent_admin = email_help(ADMIN_EMAIL, "[RefID: {$booking_infos['booking_ref_id']}] Booking Received - " . SITE_NAME, $admin_mergedHtml, array(SITE_EMAIL => SITE_NAME));
        $is_email_sent_pax = email_help($booking_infos['client_email'], "[RefID: {$booking_infos['booking_ref_id']}] Booking received - " . SITE_NAME, $client_mergedHtml, array(SITE_EMAIL => SITE_NAME));
    }

    function paypal_ipn($booking_ref_id = null)
    {
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
            $this->SendBookingReceivedEmail((array)$booking_data);
            $this->session->set_flashdata('msg_success', 'Thank you for the payment. Your booking has been received. We will get back to you shortly.');
        }
    }

}
