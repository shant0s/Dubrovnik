<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Index extends Public_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('passenger_model');
    }

    public function passengers() {

        if (!$this->session->userdata('logged_in_passenger')) {
            $post = $this->input->post();
            if ($post) {
                if ($this->passenger_model->get(array('email' => $post['email']))) {
                    $passenger = $this->passenger_model->get(array('email' => $post['email'], 'password' => $post['password']));
                    
                    if ($passenger) {
                        $this->session->set_userdata('logged_in_passenger', $passenger->id);
                        redirect(base_url('accounts/passenger/profile'));
                    } else {
                        $this->session->set_flashdata('msg_danger', "Invalid Email/Password");
                        redirect(site_url('accounts/passengers'));
                    }
                } else {
                    $this->session->set_flashdata('msg_danger', "({$post['email']}) not registered.");
                    redirect(site_url('accounts/passengers'));
                }
            } else {
                $this->load->view('accounts/passenger/_login', $this->data);
            }
        } else {
            redirect('accounts/passenger/profile');
        }
    }

    public function reset_password_passenger() {
        $email = $this->input->get('email');

        if ($this->passenger->is_registered($email)) {
            $new_password = generateRandomString(6);
            if ($this->passenger->update(array('password' => $new_password), array('email' => $email))) {

                $passenger = $this->passenger->details_by_email($email);
                // send email
                $reset_emailer = $this->load->view('emailer/_reset_password_passenger', array('passenger' => $passenger), true);
                $this->load->helper('email_helper');
                if (email_help(array($email), "Password Reset", $reset_emailer, array(NO_REPLY_EMAIL => SITE_NAME))) {
                    $this->session->set_flashdata('msg_success', 'Password reset success. Please check your email for new password.');
                } else {
                    $this->session->set_flashdata('msg_danger', 'Something went wrong with mail server. Please try again.');
                }
            } else {
                $this->session->set_flashdata('msg_danger', "Something went wrong. Please try again.");
            }
        } else {
            $this->session->set_flashdata('msg_danger', "$email is not registered.");
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function ajax_register() {
        $post = $this->input->post();

        // Dispatch API -- start
        $dispatch_data = array(
            'phone_no' => $post['phone_no'],
            'full_name' => $post['full_name'],
            'email' => $post['email'],
            'address' => $post['address']
        );
        $this->load->library('DispatchApi');
        $response = $this->dispatchapi->register_passenger($dispatch_data);

        if (!$response['status']) {
            show_error('Something went wrong with Dispatch API. Please try again.', 400);
        }

        $dispatch_passenger_id = json_decode($response['data'])->passenger_id;
        // Dispatch API -- end

        $passenger = $this->passenger->details_by_email($post['email']);
        if (!$passenger) {
            $post['dispatch_passenger_id'] = $dispatch_passenger_id;
            if ($this->passenger->save($post)) {
                $passenger_id = $this->db->insert_id();
                $passenger = $this->passenger->details_by_id($passenger_id);
                $this->session->set_userdata('logged_in_passenger', $passenger_id);
                $emailer_reg = $this->load->view('emailer/_emailer_passenger_registration', array('passenger' => $passenger, 'social_reg' => 'no'), true);
                $this->load->helper('email_helper');
                if (email_help(array($passenger->email), 'Passenger Registration', $emailer_reg, array(NO_REPLY_EMAIL => SITE_NAME))) {
                    echo json_encode(array(
                        'status' => 1,
                        'msg' => 'Account registered successfully. Please use your login credentials!',
                        'data' => $passenger
                    ));
                } else {
                    echo json_encode(array(
                        'status' => 1,
                        'msg' => 'Account registered but email not sent. Please use your new credentials to login.',
                        'data' => $passenger
                    ));
                }
            } else {
                echo json_encode(array(
                    'status' => 0,
                    'msg' => 'Passenger Account Registeration fail!',
                    'data' => $passenger
                ));
            }
        } else {
            $p_data = array(
                'dispatch_passenger_id' => $dispatch_passenger_id
            );
            $this->passenger->save($p_data, $passenger->id);
            $this->session->set_flashdata('msg_danger', "");
            echo json_encode(array(
                'status' => 0,
                'msg' => "Email ({$post['email']}) already exists.",
                'data' => $passenger
            ));
        }
    }

    public function ajax_login() {
        $post = $this->input->post();
        if ($this->passenger->is_registered($post['email']) || $this->passenger->is_registered_by_phone($post['email'])) {
            $passenger = $this->passenger->details_by_auth($post['email'], $post['password']);
            if ($passenger) {
                if ($passenger->is_active) {
                    $this->session->set_userdata('logged_in_passenger', $passenger->id);
                    echo json_encode($response = array('status' => 1, 'msg' => 'Login Successful.', 'email' => $passenger->email));
                } else {
                    echo json_encode($response = array('status' => 0, 'msg' => 'Account disabled. Please contact administrator.'));
                }
            } else {
                echo json_encode($response = array('status' => 0, 'msg' => 'Invalid Email/Password!'));
            }
        } else {
            echo json_encode($response = array('status' => 0, 'msg' => 'Email not registered!'));
        }
    }
 
  
  

}
