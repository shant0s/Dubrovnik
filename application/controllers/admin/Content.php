<?php

class Content extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('banners_model');
        $this->load->model('qualities_model');
        $this->load->model('pages_model');
        $this->load->model('testimonials_model');
        $this->load->model('contact_model');
    }

    function pages() {
        $this->data['pages'] = $this->pages_model->get_all();
        $this->data['main_content'] = 'admin/content/index';
        $this->data['sub_content'] = 'admin/content/page';
        $this->load->view(BACKEND, $this->data);
    }

    function add_update() {
        $page_id = segment(4);
        $post = $this->input->post();
        if ($post) {
            $config = array(
                'field' => 'slug',
                'title' => 'name',
                'table' => 'tbl_page',
                'id' => 'id',
            );
            $this->load->library('Slug', $config);
            $page = $_FILES['page'];
            $page_name = '';

            if (!empty($page['name'])) {
                $page = $this->pages_model->get(array('id' => segment(4)));
                if (!empty($page->filename)) {
                    $url = 'uploads/page/' . $page->filename;
                    if (file_exists($url))
                        unlink($url);
                }

                $files_data = $this->common_library->upload_image('page', FCPATH . implode(DIRECTORY_SEPARATOR, ['uploads', 'page']) . DIRECTORY_SEPARATOR, 'page_' . time());
                $page_name = $files_data['filename'];
                $post['filename'] = $page_name;
            }
            if ($page_id == '') {
                $post['filename'] = $page_name;
                $post['slug'] = $this->slug->create_uri($post);
                $this->pages_model->insert($post);
                $this->session->set_flashdata('msg', 'Page saved');
            } else {
                if ($this->pages_model->update($post, array('id' => $page_id))) {
                    $this->session->set_flashdata('msg', 'Page updated');
                } else {
                    $this->session->set_flashdata('msg', 'Some problem occured while updating.');
                }
            }

            redirect('admin/content/pages');
        } else {
            $this->data['main_content'] = 'admin/content/index';
            $this->data['sub_content'] = 'admin/content/page_form';
            if ($page_id != '') {
                $this->data['page'] = $this->pages_model->get($page_id);
            }
            $this->load->view(BACKEND, $this->data);
        }
    }

    function delete_page() {
        $page_id = segment(4);
        $page = $this->pages_model->get($page_id);
        $url = 'uploads/page/' . $page->filename;
        if (file_exists($url))
            unlink($url);
        $this->pages_model->delete($page_id);
        $this->session->set_flashdata('msg', 'Successfully! Page deleted');
        redirect('admin/content/pages');
    }

    function banners() {

        $this->banners_model->order_by('id', 'DESC');
        $this->data['banners'] = $this->banners_model->get_all();

        $this->data['main_content'] = 'admin/content/index';
        $this->data['sub_content'] = 'admin/content/banner';
        $this->load->view(BACKEND, $this->data);
    }

    function add_update_banner() {

        $banner_id = segment(4);
        $post = $this->input->post();
        if ($post) {


            $banner = $_FILES['banner'];

            $banner_name = '';
//            print_r($banner);
//                exit;

            if (!empty($banner['name'])) {

                if ($banner_id) {
                    $banner = $this->banners_model->get(array('id' => segment(4)));

                    $url = 'uploads/banner/' . $banner->filename;
                    if (file_exists($url))
                        unlink($url);
                }
                $files_data = $this->common_library->upload_image('banner', 'uploads/banner/', 'banner_' . time());

                $banner_name = $files_data['filename'];
                $post['filename'] = $banner_name;
            }

            if ($banner_id == '') {

                $post['filename'] = $banner_name;

                $this->banners_model->insert($post);
            } else {
                $this->banners_model->update($post, array('id' => $banner_id));
            }
            $this->session->set_flashdata('msg', "Banner Saved.");

            redirect('admin/content/banners');
        } else {
            $this->data['main_content'] = 'admin/content/index';
            $this->data['sub_content'] = 'admin/content/banner_form';

            if ($banner_id != '') {
                $this->data['banner'] = $this->banners_model->get(array('id' => segment(4)));
            }
            $this->load->view(BACKEND, $this->data);
        }
    }

    function delete_banner() {
        $banner_id = segment(4);
        $banner = $this->banners_model->get($banner_id);
        $url = 'uploads/banner/' . $banner->filename;
        if (file_exists($url))
            unlink($url);
        $this->banners_model->delete($banner_id);
        $this->session->set_flashdata('msg', 'Successfully! Banner deleted');
        redirect('admin/content/banners');
    }

    function testimonials() {

        $this->banners_model->order_by('id', 'DESC');
        $this->data['testimonials'] = $this->testimonials_model->get_all();

        $this->data['main_content'] = 'admin/content/index';
        $this->data['sub_content'] = 'admin/content/testimonial';
        $this->load->view(BACKEND, $this->data);
    }

    function add_update_testimonial() {

        $testimonial_id = segment(4);
        $post = $this->input->post();


        if ($post) {
            if (!empty($_FILES['profile_image']['name'])) {
                if ($testimonial_id) {

                    $testimonial_data = $this->testimonials_model->get($testimonial_id);
                    if ($testimonial_data) {
                        $url = 'uploads/testimonial/' . $testimonial_data->img_name;
                        if (file_exists($url))
                            unlink($url);
                    }
                }
                $files_data = $this->common_library->upload_image('profile_image', 'uploads/testimonial/', 'testimonial' . time());
                $post['image'] = $files_data['filename'];
            }


            if ($testimonial_id == '') {

                $this->testimonials_model->insert($post);
            } else {
                $this->testimonials_model->update($post, array('id' => $testimonial_id));
            }
            $this->session->set_flashdata('msg', "Testimonial Saved.");

            redirect('admin/content/testimonials');
        } else {
            $this->data['main_content'] = 'admin/content/index';
            $this->data['sub_content'] = 'admin/content/testimonial_form';
            $this->data['isNew'] = true;
            if ($testimonial_id != '') {
                $this->data['isNew'] = false;
                $this->data['testimonial'] = $this->testimonials_model->get(array('id' => segment(4)));
            }
            $this->load->view(BACKEND, $this->data);
        }
    }

    function delete_testimonial() {
        $id = segment(4);
        $this->testimonials_model->delete($id);
        $this->session->set_flashdata('msg', 'Successfully! Testimonial deleted');
        redirect('admin/content/testimonials');
    }

    function qualities() {
        $this->data['main_content'] = 'admin/content/index';
        $this->data['sub_content'] = 'admin/content/qualities_form';

        $this->data['qualities'] = $this->qualities_model->get(array('id' => 1));

        $post = $this->input->post();

        if ($post) {

            $this->form_validation->set_rules('title1', 'Title1', 'required');
            $this->form_validation->set_rules('title2', 'Title2', 'required');
            $this->form_validation->set_rules('title3', 'Title3', 'required');
            if ($this->form_validation->run() == false) {
                $this->load->view(BACKEND, $this->data);
            } else {
                $this->qualities_model->update($post, array('id' => 1));
                $this->session->set_flashdata('msg', "Quality Saved.");

                redirect('admin/content/qualities');
            }
        } else {

            $this->load->view(BACKEND, $this->data);
        }
    }

//    function add_update_qualities() {
//        
//        die('hello');
//        $qualities_id = segment(4);
//         $post = $this->input->post();
//        if ($post) {
//
//            $this->form_validation->set_rules('title', 'Title', 'required');
//            if ($this->form_validation->run() == false) {
//                $this->load->view(BACKEND, $this->data);
//            } else {
//                if ($qualities_id == '') {
//                    $this->qualities_model->insert($post);
//                } else {
//                    $this->qualities_model->update($post, array('id' => 1));
//                }
//                $this->session->set_flashdata('msg', "Quality Saved.");
//
//                redirect('admin/content/qualities');
//            }
//        } else {
//             redirect('admin/content/qualities');
//        }
//    }
//
//    function delete_qualities() {
//        $qualities_id = segment(4);
//        $qualities = $this->qualities_model->get($qualities_id);
//        $url = 'uploads/qualities/' . $qualities->filename;
//        if (file_exists($url))
//            unlink($url);
//        $this->qualities_model->delete($qualities_id);
//        $this->session->set_flashdata('msg', 'Successfully! Banner deleted');
//        redirect('admin/content/qualities');
//    }

    function contact() {

        $this->data['contacts'] = $this->contact_model->get_all();

        $this->data['main_content'] = 'admin/content/index';
        $this->data['sub_content'] = 'admin/content/contact';
        $this->load->view(BACKEND, $this->data);
    }

    function add_update_contact() {

        $contact_id = segment(4);
        $post = $this->input->post();

        if ($post) {

            if ($contact_id == '') {
                $this->data['contacts'] = $this->contact_model->insert($post);
            } else {
                $this->data['contacts'] = $this->contact_model->update($post, array('id' => $contact_id));
            }
            
            $this->session->set_flashdata('msg', 'Contact Saved');

            return redirect('admin/content/contact');
        } else {
            $this->data['main_content'] = 'admin/content/index';
            $this->data['sub_content'] = 'admin/content/contact_form';
            $this->data['isNew'] = true;
            if ($contact_id != '') {
                $this->data['isNew'] = false;
                $this->data['contact'] = $this->contact_model->get(array('id' => segment(4)));
            }

            $this->load->view(BACKEND, $this->data);
        }
    }

}
