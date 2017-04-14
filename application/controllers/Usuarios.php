<?php
class Usuarios extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Usuarios_Model','person');
    }
 
    public function index()
    {
        $this->load->helper('url');
        $this->load->view('person_view');
    }
 
    public function ajax_list()
    {
        $list = $this->person->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->nombre_completo;
            $row[] = $person->usuario;
            $row[] = $person->contrasena;
 
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->person->count_all(),
                        "recordsFiltered" => $this->person->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id)
    {
        $data = $this->person->get_by_id($id);
        echo json_encode($data);
    }
 
    public function ajax_add()
    {
        $data = array(
                'nombre_completo' => $this->input->post('nombre_completo'),
                'usuario' => $this->input->post('usuario'),
                'contrasena' => $this->input->post('contrasena')
            );
        $insert = $this->person->save($data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_update()
    {
        $data = array(
                'nombre_completo' => $this->input->post('nombre_completo'),
                'usuario' => $this->input->post('usuario'),
                'contrasena' => $this->input->post('contrasena')
            );
        $this->person->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        $this->person->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
}
?>