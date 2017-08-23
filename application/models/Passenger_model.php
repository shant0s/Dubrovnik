<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Passenger_model
 *
 * @author coredreams
 */
class Passenger_model extends MY_Model{
    public function __construct() {
        parent::__construct();
        $this->table="passenger";
        $this->primary_key='id';
    }
}
