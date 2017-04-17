<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Datos_Model extends CI_Model {
 
    var $table = 'datos';
    var $order = array('id' => 'desc');
    //var $id_usuario = $this->session->userdata('id');
 
    public function save($data)
    {
        $this->db->insert($this->table, $data);
        //return $this->db->insert_id();
    }

    public function last_humedad()
    {
        $id_usuario = $this->session->userdata('id');
       $query ="select humedad_suelo from datos where id_usuario=$id_usuario order by id DESC limit 1";

     $res = $this->db->query($query);


     if($res->num_rows() > 0) {
        $id_usuario = $this->session->userdata('id');
     $resultado= $res->result("array");
        return $resultado[0]['humedad_suelo'];
    }
     return '31.34';
 
    
     }

     public function get_humedad($limit){

$id_usuario = $this->session->userdata('id');
         $query = "select daux.humedad_suelo FROM (SELECT d.id, d.humedad_suelo from datos d where d.id_usuario=$id_usuario order by id DESC limit $limit) daux ORDER BY id ASC";
        $res = $this->db->query($query);
        $resultado = $res->result("array");

        return $resultado;

     }

     public function get_temperatura($limit){
$id_usuario = $this->session->userdata('id');
         $query = "select daux.temperatura_suelo FROM (SELECT d.id, d.temperatura_suelo from datos d where d.id_usuario=$id_usuario order by id DESC limit $limit) daux ORDER BY id ASC";
        $res = $this->db->query($query);
        $resultado = $res->result("array");

        return $resultado;

     }

     public function last_temperatura()
    {
        $id_usuario = $this->session->userdata('id');
       $query ="select temperatura_suelo from datos where id_usuario=$id_usuario order by id DESC limit 1";

     $res = $this->db->query($query);

    
     $resultado= $res->result("array");
        return $resultado[0]['temperatura_suelo'];
  
     }

     public function get_fecha_hora($limit){
$id_usuario = $this->session->userdata('id');
        # $query = "select concat(daux.hora,' ',daux.fecha ) fecha_hora FROM (SELECT d.id, d.fecha, d.hora from datos d order by id DESC limit $limit) daux ORDER BY id ASC";
        $query = "select daux.fecha fecha_hora FROM (SELECT d.id, d.fecha, d.hora from datos d where d.id_usuario=$id_usuario order by id DESC limit $limit) daux ORDER BY id ASC";
        $res = $this->db->query($query);
        $resultado = $res->result("array");

        return $resultado;

     }



    
   
 
 
}