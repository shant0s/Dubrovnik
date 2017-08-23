<?php

class Visitorcount_model extends MY_Model {

    public function __construct() {
        parent::__construct();
         $this->table = 'tbl_visitor_count';
    }

}
