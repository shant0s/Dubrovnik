<?php

class Menu_manager extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('menu_model');
        $this->load->model('submenu_model');
    }

    function index() {

        $this->data['menus'] = $this->menu_model->get_all();
        $this->data['submenus'] = $this->submenu_model->get_all();

        $this->data['all_menu'] = array();
        foreach ($this->data['menus'] as $this->key => $this->menu) {
            $this->data['all_menu'][$this->key]['menu_id'] = $this->menu->id;
            $this->data['all_menu'][$this->key]['menu_name'] = $this->menu->name;
            $this->data['all_menu'][$this->key]['slug'] = $this->menu->slug;
            if (!empty($this->data['submenus'])) {
                foreach ($this->data['submenus'] as $this->sub) {
                    if ($this->sub->menu_id == $this->menu->id) {
                        $this->data['all_menu'][$this->key]['sub_menu']['id'][] = $this->sub->id;
                        $this->data['all_menu'][$this->key]['sub_menu']['name'][] = $this->sub->name;
                        $this->data['all_menu'][$this->key]['sub_menu']['slug'][] = $this->sub->slug;
                    }
                }
            }
        }

        $this->data['main_content'] = 'admin/menu_manager/index';
        $this->data['sub_content'] = 'admin/menu_manager/menu';
        $this->load->view(BACKEND, $this->data);
    }

    function add_update() {
        $menu_manager_id = segment(4);
        $post = $this->input->post();
        if ($post) {       
            if ($menu_manager_id == '') {
                $this->menu_model->insert($post);
                $this->session->set_flashdata('msg', 'Menu Saved');
            } else {
                $this->menu_model->update($post, array('id' => $menu_manager_id));
                $this->session->set_flashdata('msg', 'Menu Updated');
            }
            redirect('admin/menu_manager');
        } else {
            $this->data['main_content'] = 'admin/menu_manager/index';
            $this->data['sub_content'] = 'admin/menu_manager/menu_form';
            if ($menu_manager_id != '') {
                $this->data['menus'] = $this->menu_model->get($menu_manager_id);
            }
            $this->load->view(BACKEND, $this->data);
        }
    }

    function delete($id) {
        $this->menu_model->delete($id);
        $this->submenu_model->delete(array('menu_id' => $id));
        $this->session->set_flashdata('msg', 'Menu Deleted Successfully');
        redirect('admin/menu_manager');
    }

    function add_sub($id) {

        $post = $this->input->post();
        if ($post) {            //debug($post);
            $config['name'] = $post['name'];
            $config['slug'] = $post['slug'];
            $config['menu_id'] = $id;
            $this->submenu_model->insert($config);
            $this->session->set_flashdata('msg', 'Sub-Menu Saved');

            redirect('admin/menu_manager');
        } else {
            $this->data['main_content'] = 'admin/menu_manager/index';
            $this->data['sub_content'] = 'admin/menu_manager/submenu_form';
            $this->data['check_action'] = 'submenu_add';
            $this->load->view(BACKEND, $this->data);
        }
    }

    function sub_menu_update($submenu_id) {
        $post = $this->input->post();
        if ($post) {
            $this->submenu_model->update($post, array('id' => $submenu_id));
            $this->session->set_flashdata('msg', 'Sub-Menu Updated');
            redirect('admin/menu_manager');
        } else {
            $this->data['check_action'] = 'submenu_update';
            $this->data['submenus'] = $this->submenu_model->get($submenu_id);
            $this->data['main_content'] = 'admin/menu_manager/index';
            $this->data['sub_content'] = 'admin/menu_manager/submenu_form';
            $this->load->view(BACKEND, $this->data);
        }
    }

    function sub_menu_delete($sub_id) {
        $this->submenu_model->delete($sub_id);
        $this->session->set_flashdata('msg', 'Sub Menu Deleted Successfully');
        redirect('admin/menu_manager');
    }

}
