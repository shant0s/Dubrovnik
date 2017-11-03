<?php

class Rate_manager extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('additional_rate_model');
        $this->load->model('fare_breakdown_model');
//        $this->load->model('fix_rate_by_model');
    }

    function additional_rate() {
        $post = $this->input->post();
        $rate_id = segment(4);
        if ($post) {
            if ($rate_id == '') {
                $this->additional_rate_model->insert($post);
                set_flash('msg', 'Additional Rate Saved');
            } else {
                $this->additional_rate_model->update($post, array('id' => $rate_id));
                set_flash('msg', 'Additional Rate Updated');
            }

            redirect('admin/rate_manager/additional_rate/1');
        } else {
            $this->data['main_content'] = 'admin/rate/index';
            $this->data['sub_content'] = 'admin/rate/_additional_rate';

            if ($rate_id != '') {
                $this->data['additional_rate'] = $this->additional_rate_model->get(array('id' => $rate_id));
            }
            $this->load->view(BACKEND, $this->data);
        }
    }

    function base_fare() {
        $post = $this->input->post();
       
        $this->fare_breakdown_model->order_by('id', 'ASC');
        $this->fare_breakdown_model->where('id >', 1);        
        $this->fare_breakdown_model->limit(1);        
        $next_id = $this->fare_breakdown_model->get();
              
        if ($post) {
            $this->fare_breakdown_model->update(array('rate' => $post['amount'], 'end' => $post['end']), array('is_min' => 1));
            $this->fare_breakdown_model->update(array('start' => $post['end']), array('id' =>$next_id->id));             
            set_flash('msg', 'Base fare saved');
            redirect('admin/rate_manager/base_fare');
        } else {
            $this->data['main_content'] = 'admin/rate/index';
            $this->data['sub_content'] = 'admin/rate/_base_fare';
            $this->data['base_fare'] = $this->fare_breakdown_model->get(array('is_min' == 1));
            $this->load->view(BACKEND, $this->data);
        }
    }

    function fare_breakdown() {
        $this->data['main_content'] = 'admin/rate/index';
        $this->data['sub_content'] = 'admin/rate/_fare_breakdown';
        $this->data['fare_breakdowns'] = $this->fare_breakdown_model->get_all(array('is_min' => 0));
        $this->load->view(BACKEND, $this->data);
    }

    function add_update_fare_breakdown() {
        $fare_breakdown_id = segment(4);
        $post = $this->input->post();
        if ($post) {
            if ($fare_breakdown_id == '') {
                $this->fare_breakdown_model->insert($post);
                set_flash('msg', 'Fare Breakdown Saved');
            } else {
                $this->fare_breakdown_model->update($post, array('id' => $fare_breakdown_id));
                set_flash('msg', 'Fare Breakdown Updated');
            }
            redirect('admin/rate_manager/fare_breakdown');
        } else {
            $this->data['main_content'] = 'admin/rate/index';
            $this->data['sub_content'] = 'admin/rate/_fare_breakdown_form';
            if ($fare_breakdown_id != '') {
                $this->data['fare_breakdowns'] = $this->fare_breakdown_model->get($fare_breakdown_id);
            }
            $this->load->view(BACKEND, $this->data);
        }
    }

    function delete_fare_breakdown($fare_breakdown_id) {
        $this->fare_breakdown_model->delete($fare_breakdown_id);
        set_flash('msg', 'Fare Breakdown Deleted Successfully');
        redirect('admin/rate_manager/fare_breakdown');
    }


}
