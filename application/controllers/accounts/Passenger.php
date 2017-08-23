<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use Dompdf\Dompdf;

class Passenger extends Public_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('booking_info_model', 'booking');
        $this->load->model('passenger_model');


        if (!$this->session->userdata('logged_in_passenger') && $this->uri->segment(3) !== 'register') {
            redirect(base_url('accounts/passengers'));
        }
    }

  
    public function profile() {

        if ($_POST) {
            $post = $this->input->post();
            unset($post['old_password']);
            unset($post['password2']);
            $passenger_id = $this->session->userdata('logged_in_passenger');
            $user_image = $_FILES['image'];
            if (!empty($user_image['name'])) {
                $user = $this->passenger_model->get($passenger_id);
                if ($user->image) {
                    $url = 'uploads/passenger/' . $user->image;
                    if (file_exists($url))
                        unlink($url);
                }
                $files_data = $this->common_library->upload_image('image', 'uploads/passenger/', 'passenger_' . time());
                $image_name = $files_data['filename'];
                $post['image'] = $image_name;
            }
            $passenger = $this->passenger_model->get($passenger_id);
//            if (!$this->passenger_model->get(array('email'=>$post['email']))) {
                if ($this->passenger_model->update($post, array('id'=>$passenger_id))) {
                    $this->session->set_flashdata('msg', 'Profile updated.');
                } else {
                    $this->session->set_flashdata('dmsg', 'Nothing was updated.');
                }
//            } else {
//                $this->session->set_flashdata('dmsg', "Email ({$post['email']}) already exists. Please try another.");
//            }

            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->data['sub_content'] = 'accounts/passenger/_profile';
            $this->load->view(PASSENGER, $this->data);
        }
    }

    public function booking_history() {
        $passenger_id = $this->session->userdata('logged_in_passenger');
        $this->data['sub_content'] = 'accounts/passenger/_booking_history';

        $this->data['bookings'] = $this->booking->get_all(array('passenger_id'=>$passenger_id));
//        debug( $this->data['bookings']);
        $this->data['passenger'] = $this->passenger_model->get($passenger_id);
        $this->load->view(PASSENGER, $this->data);
    }

    public function booking_details($booking_id) {
        $passenger_id = $this->session->userdata('logged_in_passenger');
        $this->data['sub_content'] = 'accounts/passenger/_booking_details';

        $this->data['booking'] = $this->booking->get(array('booking_ref_id'=>$booking_id, 'passenger_id'=>$passenger_id));
//        debug($this->data['booking']);
        $this->data['passenger'] = $this->passenger_model->get($passenger_id);
        
        $this->load->view(PASSENGER, $this->data);
    }

    public function register() {
        if ($_POST) {
            $post = $this->input->post();
            $passenger = $this->passenger_model->get(array('email'=>$post['email']));

            if (!$passenger) {
                $passenger_image = $_FILES['image'];
                if (!empty($passenger_image['name'])) {
                    $files_data = $this->common_library->upload_image('image', 'uploads/passenger/', 'passenger_' . time());
                    $post['image'] = $files_data['filename'];
                }
               
                if ($this->passenger_model->insert($post)) {                 
                    $emailer_reg = $this->load->view('emailer/emailer_passenger_registration', array('data' => $post), true);
                   $mergeHTML= common_emogrifier($emailer_reg);
//                   debug($mergeHTML);
                    $this->load->helper('email_helper');
                    if (email_help(array($post['email']), 'Passenger Registration', $emailer_reg, array(NO_REPLY_EMAIL => SITE_NAME))) {
                        $this->session->set_flashdata('msg', 'Account registered successfully. Please use your login credentials.');
                    } else {
                        $this->session->set_flashdata('dmsg', 'Account registered but email not sent. Please use your new credentials to login.');
                    }
                    redirect(base_url('accounts/passengers'));
                } else {
                    show_error('Passenger register failed.');
                }
            } else {                              
                $this->session->set_flashdata('dmsg', "Email ({$post['email']}) already exists.");
                redirect(base_url('accounts/passengers'));
            }
        } else {

            $this->load->view('accounts/passenger/_register', $this->data);
        }
    }

    public function logout() {
        $this->session->unset_userdata('logged_in_passenger');
        $this->session->unset_userdata('passenger');
        $this->session->set_flashdata('msg', 'Logged out successfully.');
//        redirect(site_url('accounts/index/facebook_logout'));
        redirect(site_url('accounts/passengers'));
    }

    public function ajax_checkPassword() {
        $post = $this->input->post();
        $email = $post['email'];
        $password = $post['password'];
        $count = $this->passenger->details_by_auth($email, $password);
        if ($count) {
            $response = array('isMatch' => '1');
        } else if (empty($count)) {
            $response = array('isMatch' => '0');
        }

        echo json_encode($response);
    }

}
