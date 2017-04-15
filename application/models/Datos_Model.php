<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Datos_Model extends CI_Model {
 
    var $table = 'datos';
    
 
    public function save($data)
    {
        $this->db->insert($this->table, $data);
        //return $this->db->insert_id();
    }
 
   
 
 
}