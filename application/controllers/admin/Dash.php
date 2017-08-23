<?php

class Dash extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('visitorcount_model');
    }

    public function index() {
        $month_year=date('M,Y');         
        $this->data['normal_views'] = $this->visitorcount_model->get(array('title' => $month_year));               
        if($this->data['normal_views']->no_views >= 9999999){
            $this->data['normal_view'] ='9999999+';
        }else{
            $this->data['normal_view'] = $this->data['normal_views']->no_views;
        }           
        $this->data['main_content'] = 'admin/dashboard';
        $this->data['graph_value']=$this->visitorcount_model->get_all();
        // debug($this->data['graph_value']);
        $this->load->view(BACKEND, $this->data);
    }

    function visitor_count() {
        
        $this->data['normal_views'] = $this->visitorcount_model->get_all();
        $this->data['main_content'] = 'admin/visitorcount';
        $this->load->view(BACKEND, $this->data);
    }
    function delete_visitor_count(){
        $id = segment(4);        
        $this->visitorcount_model->delete($id);
        $this->session->set_flashdata('msg', 'Successfully! Normal Visitor Data Deleted');
        redirect('admin/dash/visitor_count');
    }


    }


