<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Fare_breakdown_model
 *
 * @author Sujendra
 */
class Fare_breakdown_model extends My_Model {

    public function __construct() {
        parent::__construct();
        $this->table = 'tbl_fare_breakdown';
        $this->primary_key = 'id';
    }

}
