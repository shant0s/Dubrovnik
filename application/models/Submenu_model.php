<?php

class Submenu_model extends My_Model {

    public function __construct() {
        parent::__construct();
        $this->table = 'tbl_submenu';
    }

}
