<?php
	if (!defined('BASEPATH'))
   exit('No direct script access allowed');


class Listado_Datos extends CI_Controller{

   
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Datos_Model','DM');
	}

	public function index()
	{
		if($this->session->userdata('logueado')){


		
		$this->load->helper('url');
		$this->load->view('listado_datos');
      }else{
         redirect('Login');
      }
		
	}

	public function ajax_list()
	{
		$list = $this->DM->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $datos) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $datos->fecha;
			$row[] = $datos->hora;
			$row[] = $datos->idmota;
			$row[] = $datos->temperatura_suelo;
			$row[] = $datos->humedad_suelo;
			$row[] = $datos->bateria;
			$row[] = $datos->ejex;
			$row[] = $datos->ejey;
			$row[] = $datos->ejez;

			//add html for action
			/*$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		*/
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->DM->count_all(),
						"recordsFiltered" => $this->DM->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	
}
?>