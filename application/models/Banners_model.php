<?php
class Banners_model extends My_Model{

public function __construct(){
    parent::__construct();
    $this->table='tbl_banners';
    $this->primary_key='id';
}



}
