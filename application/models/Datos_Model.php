<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Datos_Model extends CI_Model {
 
    var $table = 'datos';
    
 
    public function save($data)
    {
        $this->db->insert($this->table, $data);
        //return $this->db->insert_id();
    }

    public function last_humedad()
    {
       $query ="select humedad_suelo from datos order by id DESC limit 1";

     $res = $this->db->query($query);


     if($res->num_rows() > 0) {
        
     $resultado= $res->result("array");
        return $resultado[0]['humedad_suelo'];
    }
     return '31.34';
 
    
 }
   
 
 
}