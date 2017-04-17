<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Datos_Model extends CI_Model {
 
    var $table = 'datos';
    var $column_order = array('fecha','hora','idmota','temperatura_suelo', 'humedad_suelo','ejex','ejey','ejez','bateria'); //set column field database for datatable orderable
    var $column_search = array('idmota'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('id' => 'desc'); // default order 

 
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

     public function last_humedad_python($id_usuario)
    {
        
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
        # $query = "select concat(daux.hora,' ',daux.fecha ) fecha_hora FROM (SELECT d.id, d.fecha, d.hora from datos d where d.id_usuario=$id_usuario order by id DESC limit $limit) daux ORDER BY id ASC";
        $query = "select daux.fecha fecha_hora FROM (SELECT d.id, d.fecha, d.hora from datos d where d.id_usuario=$id_usuario order by id DESC limit $limit) daux ORDER BY id ASC";
        $res = $this->db->query($query);
        $resultado = $res->result("array");

        return $resultado;

     }


private function _get_datatables_query()
    {
        $id_usuario = $this->session->userdata('id');
        $this->db->from($this->table);
        $this->db->where('id_usuario',$id_usuario);

        $i = 0;
    
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function exportar_datos(){
        $id_usuario = $this->session->userdata('id');
        $fields = $this->db->field_data('datos');
        $query = $this->db->select('*')->where('id_usuario',$id_usuario)->get('datos');
        return array("fields" => $fields, "query" => $query);
    
    }
    
   
 
 
}