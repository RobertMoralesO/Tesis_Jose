<?php
	if (!defined('BASEPATH'))
   exit('No direct script access allowed');


class GraficasTiempoReal extends CI_Controller{

   
	public function index(){
		
		if($this->session->userdata('logueado')){


		$data['humedad_suelo_tiempo_real']=$this->get_humedad(100);
		$data['temperatura_suelo_tiempo_real']=$this->get_temperatura(100);			


         $this->load->view('graficas_tiempo_real.html',$data);
      }else{
         redirect('Login');
      }

	}

	
	public function get_humedad($id){
		$this->load->model('Datos_Model','DM');
		$data = $this->DM->get_humedad($id);
		return $data;
	}

	public function get_last_humedad($id){
		$this->load->model('Datos_Model','DM');
		$data = $this->DM->last_humedad($id);
		echo json_encode($data);
	}
	public function get_temperatura($id){
		$this->load->model('Datos_Model','DM');
		$data = $this->DM->get_temperatura($id);
		return $data;
	}

	public function get_last_temperatura($id){
		$this->load->model('Datos_Model','DM');
		$data = $this->DM->last_temperatura($id);
		echo json_encode($data);
	}

	public function get_fecha_hora($id){
		$this->load->model('Datos_Model','DM');
		$data = $this->DM->get_fecha_hora($id);
		return $data;
	}
}
?>