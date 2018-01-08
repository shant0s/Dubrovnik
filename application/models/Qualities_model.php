<?php
class Qualities_model extends My_Model{

public function __construct(){
    parent::__construct();
    $this->table='tbl_qualities';
    $this->primary_key='id';
}



}
