<?php

class Zone_model extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->table = 'zones';
        $this->primary_key = 'id';
    }

    public function getZone($zone_id) {

        $this->db->select('*, ST_AsText(coordinates) coordinates')
            ->from($this->table)
            ->where('id', $zone_id);

        $row = $this->db->get()->row();
        return $row;
    }

    public function insertZone($zone_data) {

        $this->db->set('coordinates', "ST_GeomFromText('{$zone_data['coordinates']}')", false);
        $this->db->set('title', $zone_data['title']);
        $this->db->insert($this->table);
        return $this->db->insert_id();
    }

    public function updateZone($zone_id, $zone_data) {

        $this->db->set('coordinates', "ST_GeomFromText('{$zone_data['coordinates']}')", false);
        $this->db->set('title', $zone_data['title']);
//        $this->db->set('operator_id', $zone_data['operator_id']);

        $this->db->where('id', $zone_id);
        $this->db->update($this->table);

        return $this->db->affected_rows();
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
        $this->db->delete('zones_rate');
    }
    function DeleteZoneRateWhere($cond=null) {
        ($cond)?$this->db->delete('zones_rate', $cond):'';
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
