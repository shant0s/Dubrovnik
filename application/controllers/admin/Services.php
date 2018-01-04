<?php

class Services extends Admin_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('html');
        $this->load->helper('url');
    }

    public function airport_transfers(){

        $this->load->view('frontend/pages/airport_transfers');
    }
}

