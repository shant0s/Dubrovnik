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
class Fleet_manager extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('fleet_model');
        $this->load->model('zone_model');
        $this->load->model('additional_rate_model');
        $this->load->model('fare_breakdown_model');
    }

    function index()
    {

        $this->data['fleets'] = $this->fleet_model->get_all();
        $this->data['main_content'] = 'admin/fleet/index';
        $this->data['sub_content'] = 'admin/fleet/_fleets';
        $this->load->view(BACKEND, $this->data);
    }

    function add_update()
    {
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
            $this->data['is_edit'] = FALSE;

            if ($fleet_id != '') {
                $this->data['fleet'] = $this->fleet_model->get($fleet_id);
                $this->data['is_edit'] = TRUE;
            }

            $sql = "SELECT *,ST_AsText(points) as points FROM `zones`";
            $this->data['zones'] = $this->db->query($sql)->result();

            $this->load->view(BACKEND, $this->data);
        }
    }

    function delete()
    {
        $fleet_id = segment(4);
        $fleet = $this->fleet_model->get($fleet_id);

        $url = 'uploads/fleet/' . $fleet->img_name;
        if (file_exists($url))
            unlink($url);
        $this->fleet_model->delete($fleet_id);
        $this->session->set_flashdata('msg', 'Successfully! Fleet Deleted');
        redirect('admin/fleet_manager');
    }

    public function ajaxZoneRate() {
        $from_id = $this->input->post('from_id');
        $fleet_id = $this->input->post('fleet_id');
        $sql = "SELECT *,ST_AsText(points) as points FROM `zones`";
        $zones = $this->db->query($sql)->result();

        if (!$from_id) {
            echo json_encode($response = array('msg' => "Please select the Zone", 'data' => '', 'status' => false));
            return;
        }
        if ($zones) {
            foreach ($zones as $index => $zone) {
                $sql = "SELECT * FROM `zones_rate` WHERE `from_id`='{$from_id}' AND `to_id`='{$zone->id}' AND `fleet_id`='{$fleet_id}'";
                $rate = $this->db->query($sql)->row();
                if ($rate) {
                    $zones[$index]->rate = $rate->rate;
                    $zones[$index]->rate_type = $rate->rate_type;
                    if ($rate->minimum_rate == 0) {
                        $zones[$index]->minimum_rate = 0;
                    } else {
                        $zones[$index]->minimum_rate = $rate->minimum_rate;
                    }
                } else {
                    $zones[$index]->rate = 0;
                    $zones[$index]->rate_type = "per_mile";
                    $zones[$index]->minimum_rate = 0;
                }
                $sql = "SELECT * FROM `zones_rate` WHERE `from_id`='{$zone->id}' AND `to_id`='{$from_id}' AND `fleet_id`='{$fleet_id}'";
                $reverse_rate = $this->db->query($sql)->row();
                if ($reverse_rate) {
                    $zones[$index]->reverse_rate = $reverse_rate->rate;
                    $zones[$index]->reverse_rate_type = $reverse_rate->rate_type;
                } else {
                    $zones[$index]->reverse_rate = 0;
                    $zones[$index]->reverse_rate_type = 'per_mile';
                }
            }
            echo json_encode($response = array('data' => $zones, 'status' => true));
        } else {
            echo json_encode($response = array('data' => "empty", 'status' => false));
        }
    }

    public function ajaxPostZoneRate() {
        $post = $this->input->post();
        $cond=['from_id' => $post['from_id'], 'to_id' => $post['to_id'],'fleet_id'=>$post['fleet_id']];
        $zone_from_to_rate = $this->zone_model->get_where_zone_rate($cond);
        if ($post['rate'] != 0) {

            if ($zone_from_to_rate) {
                $zone_from_to_rate->from_id = $post['from_id'];
                $zone_from_to_rate->fleet_id = $post['fleet_id'];
                $zone_from_to_rate->to_id = $post['to_id'];
                $zone_from_to_rate->rate = $post['rate'];
                $zone_from_to_rate->rate_type = $post['rate_type'];
                if (isset($post['minimum_rate'])) {
                    $zone_from_to_rate->minimum_rate = $post['minimum_rate'];
                }
                $this->zone_model->update_zone_rate($zone_from_to_rate->id, $zone_from_to_rate);
            } else {

                $zone_from_to_rate->from_id = $post['from_id'];
                $zone_from_to_rate->fleet_id = $post['fleet_id'];
                $zone_from_to_rate->to_id = $post['to_id'];
                $zone_from_to_rate->rate_type = $post['rate_type'];
                $zone_from_to_rate->rate = $post['rate'];
                $zone_from_to_rate->minimum_rate = $post['minimum_rate'];

                $this->zone_model->insert_zone_rate($zone_from_to_rate);
            }
        } else {
            $this->zone_model->delete_zone_rate($zone_from_to_rate->id);
        }

        echo json_encode(['status'=>true,'message'=>'Successfully Saved','data'=>'']);
    }


    function ajax_google_miles_rate($fleet_id = null)
    {

        $fleet = $this->fleet_model->get(['id'=>$fleet_id]);
        if (!$fleet) {
            echo json_encode(['status'=>false,'message'=>'Invalid fleet id','data'=>'']);
            exit;
        }

        $html_data = [
            'fleet' => $fleet,
            'base_rate' => $this->fare_breakdown_model->get(['fleet_id' => $fleet->id, 'is_min' => 1]),
            'rates' => $this->fare_breakdown_model->get_all(['fleet_id' => $fleet->id, 'is_min' => 0])
        ];

        $html = $this->load->view('admin/fleet/navtab-parts/ajax_google_miles_rate', $html_data, true);
//        debug($html);

        $response_data = [
            'html' => $html
        ];
        echo json_encode(['status'=>true,'message'=>'success','data'=>$response_data]);

    }

    function ajax_save_google_rate()
    {

        if (!$this->input->is_ajax_request()) {
            echo json_encode(['status'=>false,'message'=>'Invalid request type','data'=>'']);
        }


        $rate_data = [
            'start' => $this->input->post('start'),
            'end' => $this->input->post('end'),
            'rate' => $this->input->post('rate'),
            'is_min' => $this->input->post('is_min'),
            'fleet_id' => $this->input->post('fleet_id')
        ];

        $rate_id = $this->input->post('rate_id');
        if ($rate_id) {
            $this->fare_breakdown_model->update($rate_data,['id'=>$rate_id]);
            set_flash('msg', 'Update success.');
            echo json_encode(['status'=>true,'message'=>'Update success.','data'=>'']);
            return;

        }

        if($rate_data['is_min'] == 1){
            $rate = $this->fare_breakdown_model->get(['is_min' => 1, 'fleet_id' => $rate_data['fleet_id']]);
            if($rate){
                $this->fare_breakdown_model->update($rate_data,['id'=>$rate->id]);
                echo json_encode(['status'=>true,'message'=>'Update success.','data'=>'']);
                return;

            }
        }

        $this->fare_breakdown_model->insert($rate_data);
        set_flash('msg', 'Insert success.');
        echo json_encode(['status'=>true,'message'=>'Insert success.','data'=>'']);

    }

    function ajax_delete_google_rate($rate_id = null)
    {

        if (!$this->input->is_ajax_request()) {
            echo json_encode(['status'=>false,'message'=>'Invalid request type','data'=>'']);
            return;
        }

        $this->fare_breakdown_model->delete(['id'=>$rate_id]);

        set_flash('msg', 'Delete success.');
        echo json_encode(['status'=>true,'message'=>'Delete success.','data'=>'']);
    }

    function ajax_google_rate($rate_id = null)
    {

        if (!$this->input->is_ajax_request()) {
            echo json_encode(['status'=>false,'message'=>'Invalid request type','data'=>'']);
            return;
        }

        $rate = $this->fare_breakdown_model->get($rate_id);
        if (!$rate) {
            echo json_encode(['status'=>false,'message'=>'rate not found.','data'=>'']);
            return;
        }

        echo json_encode(['status'=>true,'message'=>'rate.','data'=>$rate]);
    }

}
