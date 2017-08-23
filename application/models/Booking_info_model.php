<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Booking_info_model
 *
 * @author Sujendra
 */
class Booking_info_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->table = 'tbl_booking_infos';
    }

    public function generate_ref_id() {
        $booking_ref_id = rand(11111, 99999);
        
        $booking = $this->db
                ->select('*')
                ->from($this->table)
                ->where('booking_ref_id', $booking_ref_id)
                ->get()
                ->row();
        
        if(!$booking){
            return $booking_ref_id;
        } else {
            $this->generate_ref_id();
        }
        
    }

}
