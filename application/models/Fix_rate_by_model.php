<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Fix_rate_by_model
 *
 * @author Sujendra
 */
class Fix_rate_by_model extends My_Model {

    public function __construct() {
        parent::__construct();
        $this->table = 'tbl_fix_rate_by';
        $this->primary_key = 'id';
    }

}
