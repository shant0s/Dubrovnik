<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Fleet_manager
 *
 * @author Sujendra
 */
class Fleet_manager extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('fleet_model');
        $this->load->model('additional_rate_model');
    }

    function index() {

        $this->data['fleets'] = $this->fleet_model->get_all();
        $this->data['main_content'] = 'admin/fleet/index';
        $this->data['sub_content'] = 'admin/fleet/_fleets';
        $this->load->view(BACKEND, $this->data);
    }

    function add_update() {
        $fleet_id = segment(4);
        $post = $this->input->post();
        if ($post) {
            
            if (!empty($_FILES['img_name']['name'])) {
                if ($fleet_id) {
                   
                    $fleetdata = $this->fleet_model->get($fleet_id);
                    if ($fleetdata) {
                        $url = 'uploads/fleet/' . $fleetdata->img_name;
                        if (file_exists($url))
                            unlink($url);
                    }
                }
                $files_data = $this->common_library->upload_image('img_name', 'uploads/fleet/', 'fleet' . time());
                $post['img_name'] = $files_data['filename'];
            }                        
            if ($fleet_id == '') {                 
                $this->fleet_model->insert($post);               
                $this->session->set_flashdata('msg', "Fleet Saved.");
            } else {
                $this->fleet_model->update($post, array('id' => $fleet_id));
                $this->session->set_flashdata('msg', "Fleet Updated.");
            }

            redirect('admin/fleet_manager');
        } else {
            $this->data['main_content'] = 'admin/fleet/index';
            $this->data['sub_content'] = 'admin/fleet/_form';
            if ($fleet_id != '') {
                $this->data['fleet'] = $this->fleet_model->get($fleet_id);
                $this->data['is_edit'] = FALSE;
            }else{
                $this->data['is_edit'] = TRUE;
            }
            $this->load->view(BACKEND, $this->data);
        }
    }
    
    function delete(){
        $fleet_id = segment(4);
        $fleet = $this->fleet_model->get($fleet_id);

        $url = 'uploads/fleet/' . $fleet->img_name;
        if (file_exists($url))
            unlink($url);
        $this->fleet_model->delete($fleet_id);
        $this->session->set_flashdata('msg', 'Successfully! Fleet Deleted');
        redirect('admin/fleet_manager');
    }

}
