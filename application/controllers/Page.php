<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends Public_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('fleet_model');
        $this->load->model('menu_model');
        $this->load->model('submenu_model');
        $this->load->model('pages_model');
    }

    public function index() {
        $slug = $this->uri->segment(1);

        $data['result'] = $this->pages_model->get(array('slug' => $slug, 'template' => 'airport_page'));

        if ($data['result']) {
            $this->data['airport_data'] = $data['result'];
            $this->data['main_content'] = 'frontend/pages/airport-template';
            $this->load->view(FRONTEND, $this->data);
            return;
        }

        switch ($slug) {
            case "get-quote":
                $this->data['main_content'] = 'frontend/quote/_quote';
                $this->load->view(FRONTEND, $this->data);
                break;
            case "thank-you":
                $this->data['main_content'] = 'frontend/pages/thank-you';
                $this->load->view(FRONTEND, $this->data);
                break;
            case "about":
                $this->data['main_content'] = 'frontend/pages/about';
                $this->load->view(FRONTEND, $this->data);
                break;
            case "services":
                $this->data['main_content'] = 'frontend/pages/services';
                $this->load->view(FRONTEND, $this->data);
                break;
            case "fleet":
                $this->data['main_content'] = 'frontend/pages/fleet';
                $this->load->view(FRONTEND, $this->data);
                break;
            case "terms-and-conditions":
                $this->data['main_content'] = 'frontend/pages/terms-and-conditions';
                $this->load->view(FRONTEND, $this->data);
                break;
            case "cancellation-policy":
                $this->data['main_content'] = 'frontend/pages/cancellation-policy';
                $this->load->view(FRONTEND, $this->data);
                break;

            case"contact":
                $post = $this->input->post();
                if ($post) {
                    $email_template = $this->load->view('emailer/_emailer_contact', array('data' => $post), true);
                    $mergedHtml = common_emogrifier($email_template);
//                    debug($mergedHtml);
                    $this->load->helper('email_helper');
                    if (email_help(array(ADMIN_EMAIL), "Contact Query", $mergedHtml, array(SITE_EMAIL => SITE_NAME))) {
                        $this->session->set_flashdata('msg', 'Thank You for your Contact details. We will get back to you shortly!');
                    } else {
                        $this->session->set_flashdata('dmsg', 'Something went wrong with our mail server. Please try again.');
                    }
                    redirect('contact');
                } else {
                    $this->data['main_content'] = 'frontend/pages/contact';
                    $this->load->view(FRONTEND, $this->data);
                }

                break;

            case"terms-and-condition":
                $this->data['main_content'] = 'frontend/pages/thank-you';
                $this->load->view(FRONTEND, $this->data);
                break;
            default:
                $this->data['check'] = $this->pages_model->get(array('slug' => $slug));
                if ($this->data['check']) {
                    $this->data['main_content'] = 'frontend/pages/default_page';
                    $this->load->view(FRONTEND, $this->data);
                } else {
                    $this->data['main_content'] = 'frontend/pages/404';
                    $this->load->view(FRONTEND, $this->data);
                }
                break;
        }
    }

    function test() {
        $this->load->view('emailer/new_contact');
    }

}
