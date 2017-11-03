<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Booking
 *
 * @author Sujendra
 */
class Booking extends Admin_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->model('booking_info_model');
        $this->load->model('fleet_model');
    }

    function index() {
        $this->data['booking_infos'] = $this->booking_info_model->order_by('id','DESC')->get_all();
        $this->data['main_content'] = 'admin/booking_info/index';
        $this->data['sub_content'] = 'admin/booking_info/client';
        $this->load->view(BACKEND, $this->data);
    }

    function view($id) {        
        $this->data['booking_infos'] = $this->booking_info_model->get(array('id'=>$id));
        $this->data['fleet'] = $this->fleet_model->get(array('title'=>$this->data['booking_infos']->vehicle_name));       
        $this->data['main_content'] = 'admin/booking_info/index';
        $this->data['sub_content'] = 'admin/booking_info/_client_more_info';
        $this->load->view(BACKEND, $this->data);
    }
    function delete($id){        
        $this->booking_info_model->delete($id);
        $this->session->set_flashdata('msg', 'Successfully! Booking Information Deleted');
        redirect('admin/booking');        
    }

}
