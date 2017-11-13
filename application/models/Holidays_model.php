<?php

class Holidays_model extends MY_Model {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->table = 'tbl_holidays';
    }
}
