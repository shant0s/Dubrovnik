<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Additional_rate_model
 *
 * @author Sujendra
 */
class Additional_rate_model extends My_Model {

    public function __construct() {
        parent::__construct();
        $this->table = 'tbl_additional_rate';
        $this->primary_key = 'id';
    }

}
