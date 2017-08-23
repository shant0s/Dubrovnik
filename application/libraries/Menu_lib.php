<?php

class Menu_lib {

    public function __construct() {
        $this->CI = & get_instance();
        $this->load->model('menu_model');
    }

    public function menu_nav() {
        
        $menu = array(
            array('text' => 'Home', 'url' => ''),
            array('text' => 'About', 'url' => 'about'),
            array('text' => 'Courses', 'url' => 'courses'),
            array('text' => 'New Enrollments', 'url' => 'enrollment'),
            array('text' => 'Performances', 'url' => 'performances'),
            array('text' => 'Gallery', 'url' => 'gallery'),
            array('text' => 'Contact Us', 'url' => 'contact')
        );
          
        $html = '<ul>';
        foreach ($menu as $data):
            $html .='<li class="">';
            $html .=anchor($data['url'],$data['text']);
            $html .='</li>';
        endforeach;
        $html .='</ul>';
        return $html;
    }

}
