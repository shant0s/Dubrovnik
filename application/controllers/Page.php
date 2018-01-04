<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends Public_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('fleet_model');
        $this->load->model('menu_model');
        $this->load->model('submenu_model');
        $this->load->model('pages_model');
    }

    public function index()
    {
        $slug = $this->uri->segment(1);

        $data['result'] = $this->pages_model->get(array('slug' => $slug, 'template' => 'airport_page'));

        if ($data['result']) {
            $this->data['airport_data'] = $data['result'];
            $this->data['main_content'] = 'frontend/pages/airport-template';
            $this->load->view(FRONTEND, $this->data);
            return;
        }

        switch ($slug) {
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
            case "price":
                $this->data['main_content'] = 'frontend/pages/price';
                $this->load->view(FRONTEND, $this->data);
                break;
            case "rent":
                $this->data['main_content'] = 'frontend/pages/rent';
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
                $this->data['main_content'] = 'frontend/pages/contact';
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

    function test()
    {
        $this->load->view('emailer/new_contact');
    }

}
