<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Run_query_model
 *
 * @author Sujendra
 */
class Run_query_model extends CI_Model {

    function run_query($sql, $queryStrings = array()) {
        $q = $this->db->query($sql, $queryStrings);
        return ($q->num_rows() > 0) ? $q->result_array() : '';
    }
       
    
}
