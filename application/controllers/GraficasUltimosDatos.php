<?php
	if (!defined('BASEPATH'))
   exit('No direct script access allowed');


class GraficasUltimosDatos extends CI_Controller{

   
	public function index(){
		
		if($this->session->userdata('logueado')){


		
		$data['humedad_suelo_grafico_linea']=$this->get_humedad(100);
		$data['temperatura_suelo_grafico_linea']=$this->get_temperatura(100);
		$data['fecha_hora_grafico_linea']=$this->get_fecha_hora(100);			


         $this->load->view('graficas_ultimos_datos.html',$data);
      }else{
         redirect('Login');
      }

	}

	
	public function get_humedad($id){
		$this->load->model('Datos_Model','DM');
		$data = $this->DM->get_humedad($id);
		return $data;
	}

	
	public function get_temperatura($id){
		$this->load->model('Datos_Model','DM');
		$data = $this->DM->get_temperatura($id);
		return $data;
	}

	

	public function get_fecha_hora($id){
		$this->load->model('Datos_Model','DM');
		$data = $this->DM->get_fecha_hora($id);
		return $data;
	}
}
?>