<?php

class Index extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
    }

    function index() {
        if ($this->session->userdata('current_user')) {
            redirect('admin/dash');
        }
        $this->load->view('admin/login');
    }

    function logout() {
        $this->session->unset_userdata(array('current_user', 'username', 'account_type'));
        redirect('admin/index');
    }

    function login() {
        if ($this->session->userdata('current_user')) {
            redirect('admin/dash');
        }
        $post = $this->input->post();
        if ($post) {
            
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');         
            
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error', validation_errors());
                redirect('admin/index');
            }
            $user = $this->admin_model->get(array('username' => $post['username'], 'password' => $post['password']));

            if ($user) {
                $this->session->set_userdata(array(
                    'current_user' => $user->id,
                    'username' => $user->username,
                    'account_type' => $user->type
                ));

                redirect('admin/dash');
            } else {
                 $this->session->set_flashdata('dmsg', "Username or password do not match.");
             
                redirect('admin/index');
            }
        } else {
            $this->load->view('admin/login');
        }
    }

}
