<?php

class Index extends Public_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('fleet_model');
        $this->load->model('banners_model');
        $this->load->model('passenger_model');
        $this->load->model('qualities_model');
        $this->load->model('testimonials_model');
//        $this->load->model('contact_model');
//        $this->load->model('pages_model');
    }

    function index() {
//        $this->session->sess_destroy();
        $this->data['fleets'] = $this->fleet_model->get_all();
        $this->data['qualities'] = $this->qualities_model->get(array('id' => 1));
        $this->data['banner'] = $this->banners_model->get_all();        
        $this->data['testimonials'] = $this->testimonials_model->get_all();        
//        $this->data['contacts'] = $this->contact_model->get_all();
//        $this->data['pages'] = $this->pages_model->get_all();
        $this->data['main_content'] = 'frontend/home';
        $this->load->view(FRONTEND, $this->data);
        
    }

    function rest_password() {
        $post = $this->input->post();
        $type = $this->input->get('type');
        $this->load->helper('string');
        if ($post && $type == 'passenger') {

            if ($this->passenger_model->get(array('email' => $post['email']))) {
                $post['password'] = random_string('alnum', 6);
                $this->passenger_model->update(array('password' => $post['password']), array('email'=>$post['email']));
                // send email
                
                $reset_emailer = $this->load->view('emailer/_reset_password_passenger', array('data' => $post), true);
                $merge_HTML= common_emogrifier($reset_emailer);
//               debug($merge_HTML);
                $this->load->helper('email_helper');
                if (email_help(array($post['email']), "Password Reset", $reset_emailer, array(NO_REPLY_EMAIL => SITE_NAME))) {
                    $this->session->set_flashdata('msg', 'Password reset success. Please check your email for new password.');
                } else {
                    $this->session->set_flashdata('dmsg', 'Something went wrong with mail server. Please try again.');
                }
            } else {
                $this->session->set_flashdata('dmsg', "({$post['email']}) not registered.");
            }
            redirect(site_url('accounts/passengers'));
        } else {
            $this->data['main_content'] = 'frontend/pages/forget';
            $this->load->view(FRONTEND, $this->data);
        }
    }

}
