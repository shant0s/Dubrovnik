<?php 

class Config extends Admin_Controller{

	public function __construct(){
		parent:: __construct();  
        $this->load->model('admin_model');
	}

    function index()
    {
        $this->data['admins'] = $this->admin_model->get_all();        
        $this->data['main_content'] = 'admin/config/index';
        $this->data['sub_content'] = 'admin/config/_users';
        $this->load->view(BACKEND, $this->data);
    }

    function add_update()
    {
       $admin_id=$this->uri->segment(4);
        $post=$this->input->post();
        if($post) {
           
            if($admin_id == '') {
                $this->admin_model->insert($post);
                $this->session->set_flashdata('msg', 'Config saved');
            } else {
                $this->admin_model->update($post, array('id' => $admin_id));
                 $this->session->set_flashdata('msg', 'Config updated');
            }
          
            redirect('admin/config');
        } else {
           
                $this->data['main_content'] = 'admin/config/index';
                $this->data['sub_content'] = 'admin/config/_form';             
             
             if($admin_id != '') {
                $this->data['admins'] = $this->admin_model->get($admin_id);
            }
             $this->load->view(BACKEND, $this->data);
        }       
    }
 
  
}