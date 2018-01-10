<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin_Controller
 *
 * @author Binay
 */
class Public_Controller extends MY_Controller {

    public $data;

    public function __construct() {
        parent::__construct();
        $this->load->model('visitorcount_model');
//        debug($this->session->all_userdata());
        //normal visitor 
        $month_year = date('M,Y');
        $data['view'] = $this->visitorcount_model->get(array('title' => $month_year));
        //debug($views);
        if ($data['view'] == "") {
            $count = 1;
            $this->visitorcount_model->insert(array('title' => $month_year, 'no_views' => $count));
        } else {
            $count = 1 + $data['view']->no_views;
            $this->visitorcount_model->update(array('no_views' => $count), array('title' => $month_year));
        }

        $this->load->model('passenger_model');               
        $this->data['passenger'] = $this->passenger_model->get(array('id' => $this->session->userdata('logged_in_passenger')));

        $this->load->model('pages_model');
        $this->data['pages'] = $this->pages_model->get_all();

    }

}
