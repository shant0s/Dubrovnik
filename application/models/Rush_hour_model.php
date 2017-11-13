<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 11/10/2017
 * Time: 5:32 PM
 */

class Rush_hour_model extends MY_Model {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->table = 'rush_hour_rate';
    }

    function insert_batch($data){
        $this->db->insert_batch( $this->table, $data);
    }
}