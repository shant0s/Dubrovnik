<?php

class Pages_model extends My_Model {

    public function __construct() {
        parent::__construct();
        $this->table = 'tbl_page';
        $this->primary_key = 'id';
    }

}
