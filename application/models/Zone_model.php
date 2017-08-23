<?php

class Zone_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->table = 'zones';
        $this->primary_key = 'id';
    }

    function insert_zone_rate($data) {
        $this->db->insert('zones_rate', $data);
    }

    function update_zone_rate($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('zones_rate', $data);
    }

    function delete_zone_rate($id) {
        $this->db->where('id', $id);
        $this->db->delete('zones_rate', $data);
    }

    function get_where_zone_rate($cond) {
        $this->db->select('*')
                ->from('zones_rate')
                ->where($cond);
        return $this->db->get()->row();
    }

    function get_zone_rate_by_id($id) {
        $this->db->select('*')
                ->from('zones_rate')
                ->where('from_id', $id);
        return $this->db->get()->result_array();
    }

}
