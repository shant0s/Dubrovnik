<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin_Controller
 *
 * @author Sujendra
 */
class Admin_Controller extends MY_Controller {

    public $data;

    public function __construct() {
        parent::__construct();
     if (!$this->session->userdata('current_user')) {
            redirect('admin/index');
        }
         $this->data['username'] = $this->session->userdata('username');
    }

}
