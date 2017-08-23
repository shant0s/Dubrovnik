<?php

class Admin_Model extends My_Model {

    public function __construct() {
        parent::__construct();
        $this->table = 'tbl_admin';
        $this->primary_key = 'id';
    }

}
