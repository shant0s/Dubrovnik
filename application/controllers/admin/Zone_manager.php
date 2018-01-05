<?php
//
//class Zone_manager extends Admin_Controller {
//
//    public function __construct() {
//        parent::__construct();
//        $this->load->model('zone_model');
//        $this->load->model('run_query_model');
//    }
//
//    function index() {
//        $sql = "SELECT *,ST_AsText(coordinates) as coordinates FROM `zones`";
//        $this->data['zones'] = $this->db->query($sql)->result();
//        $this->data['main_content'] = 'admin/zone_manager/index';
//        $this->data['sub_content'] = 'admin/zone_manager/zones';
//        $this->load->view(BACKEND, $this->data);
//    }
//
//    public function add_edit($zone_id = null) {
//        $zone = $this->zone_model->getZone($zone_id);
//
//        if (!$zone && !is_null($zone_id)) {
//            show_404();
//        }
//
//        if ($this->input->post()) {
//
//            $zone_data = array(
////                'operator_id' => get_userdata('_logged_in_operator'),
//                'title' => $this->input->post('title'),
//                'coordinates' => $this->input->post('coordinates')
//            );
//
//            if ($zone) {
//                $this->zone_model->updateZone($zone->id, $zone_data);
//                set_flash('msg', 'Update success.');
//                redirect(site_url('admin/zone_manager/add_edit/' . $zone->id));
//            }
//
//            $zone_id = $this->zone_model->insertZone($zone_data);
//            set_flash('msg', 'Insert success.');
//            redirect(site_url('admin/zone_manager'));
//        }
//
//        $this->data['isEdit'] = false;
//        if ($zone) {
//            $this->data['zone'] = $zone;
//            $this->data['isEdit'] = true;
//        }
//        $this->data['main_content'] = 'admin/zone_manager/index';
//        $this->data['sub_content'] = 'admin/zone_manager/add_edit';
//        $this->load->view(BACKEND, $this->data);
////        debug($this->data);
////        $this->render();
//    }
//
//    function add() {
//        $post = $this->input->post();
//        if ($post) {
//            $config = array(
//                'field' => 'slug',
//                'title' => 'name',
//                'table' => 'zones',
//                'id' => 'id',
//            );
//            $this->load->library('Slug', $config);
//            $post['slug'] = $this->slug->create_uri($post);
//
//            $sql = "INSERT INTO zones(name,slug,points) VALUES ('{$post['name']}','{$post['slug']}',ST_PolyFromText('{$post['points']}'))";
//            $this->db->query($sql);
//            set_flash('msg', 'Zone added');
//            redirect('admin/zone_manager');
//        } else {
//            $this->data['main_content'] = 'admin/zone_manager/index';
//            $this->data['sub_content'] = 'admin/zone_manager/zone_add';
//            $this->load->view(BACKEND, $this->data);
//        }
//    }
//
//    function update($id = null) {
//        $post = $this->input->post();
//        if ($post) {
//            $sql = "UPDATE zones SET name='{$post['name']}', points=PolyFromText('{$post['points']}') WHERE id='{$post['id']}'";
//            $this->db->query($sql);
//            set_flash('msg', 'Zone updated');
//            redirect('admin/zone_manager');
//        } else {
//            $sql = "SELECT *,ST_AsText(points) as points FROM `zones` WHERE id={$id}";
//            $this->data['zone'] = $this->db->query($sql)->row();
//            $this->data['main_content'] = 'admin/zone_manager/index';
//            $this->data['sub_content'] = 'admin/zone_manager/zone_update';
//            $this->load->view(BACKEND, $this->data);
//        }
//    }
//
//    function delete($id) {
//        if ($id) {
//            $this->zone_model->delete(['id'=>$id]);
//            set_flash('msg', 'Zone Deleted');
//            redirect(site_url('admin/zone_manager'));
//        }
//    }
//
////    function zone_rate() {
////        $sql = "SELECT *,ST_AsText(points) as points FROM `zones`";
////        $this->data['zone_data'] = $this->db->query($sql)->result();
////        $this->data['main_content'] = 'admin/zone_manager/index';
////        $this->data['sub_content'] = 'admin/zone_manager/zone_rate';
////        $this->load->view(BACKEND, $this->data);
////    }
////
////    public function ajaxZoneRate() {
////        $from_id = $this->input->post('from_id');
////        $fleet_id = $this->input->post('fleet_id');
////        $sql = "SELECT *,ST_AsText(points) as points FROM `zones`";
////        $zones = $this->db->query($sql)->result();
////
////        if (!$from_id) {
////            echo json_encode($response = array('msg' => "Please select the Zone", 'data' => '', 'status' => false));
////            return;
////        }
////        if ($zones) {
////            foreach ($zones as $index => $zone) {
////                $sql = "SELECT * FROM `zones_rate` WHERE `from_id`='{$from_id}' AND `to_id`='{$zone->id}' AND `fleet_id`='{$fleet_id}'";
////                $rate = $this->db->query($sql)->row();
////                if ($rate) {
////                    $zones[$index]->rate = $rate->rate;
////                    $zones[$index]->rate_type = $rate->rate_type;
////                    if ($rate->minimum_rate == 0) {
////                        $zones[$index]->minimum_rate = 0;
////                    } else {
////                        $zones[$index]->minimum_rate = $rate->minimum_rate;
////                    }
////                } else {
////                    $zones[$index]->rate = 0;
////                    $zones[$index]->rate_type = "per_mile";
////                    $zones[$index]->minimum_rate = 0;
////                }
////                $sql = "SELECT * FROM `zones_rate` WHERE `from_id`='{$zone->id}' AND `to_id`='{$from_id}' AND `fleet_id`='{$fleet_id}'";
////                $reverse_rate = $this->db->query($sql)->row();
////                if ($reverse_rate) {
////                    $zones[$index]->reverse_rate = $reverse_rate->rate;
////                    $zones[$index]->reverse_rate_type = $reverse_rate->rate_type;
////                } else {
////                    $zones[$index]->reverse_rate = 0;
////                    $zones[$index]->reverse_rate_type = 'per_mile';
////                }
////            }
////            echo json_encode($response = array('data' => $zones, 'status' => true));
////        } else {
////            echo json_encode($response = array('data' => "empty", 'status' => false));
////        }
////    }
////
////    public function ajaxPostZoneRate() {
////        $post = $this->input->post();
////        $cond=['from_id' => $post['from_id'], 'to_id' => $post['to_id'],'fleet_id'=>$post['fleet_id']];
////        $zone_from_to_rate = $this->zone_model->get_where_zone_rate($cond);
////        if ($post['rate'] != 0) {
////
////            if ($zone_from_to_rate) {
////                $zone_from_to_rate->from_id = $post['from_id'];
////                $zone_from_to_rate->fleet_id = $post['fleet_id'];
////                $zone_from_to_rate->to_id = $post['to_id'];
////                $zone_from_to_rate->rate = $post['rate'];
////                $zone_from_to_rate->rate_type = $post['rate_type'];
////                if (isset($post['minimum_rate'])) {
////                    $zone_from_to_rate->minimum_rate = $post['minimum_rate'];
////                }
////                $this->zone_model->update_zone_rate($zone_from_to_rate->id, $zone_from_to_rate);
////            } else {
////
////                $zone_from_to_rate->from_id = $post['from_id'];
////                $zone_from_to_rate->fleet_id = $post['fleet_id'];
////                $zone_from_to_rate->to_id = $post['to_id'];
////                $zone_from_to_rate->rate_type = $post['rate_type'];
////                $zone_from_to_rate->rate = $post['rate'];
////                $zone_from_to_rate->minimum_rate = $post['minimum_rate'];
////
////                $this->zone_model->insert_zone_rate($zone_from_to_rate);
////            }
////        } else {
////            $this->zone_model->delete_zone_rate($zone_from_to_rate->id);
////        }
////
////        echo json_encode(['status'=>true,'message'=>'Successfully Saved','data'=>'']);
////    }
//
//}
