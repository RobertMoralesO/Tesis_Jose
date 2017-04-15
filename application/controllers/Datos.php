<?php
	if (!defined('BASEPATH'))
   exit('No direct script access allowed');


class Datos extends CI_Controller{

   
	public function index(){
		$data = array(
			'temperatura_suelo' => $this->input->post('temperatura_suelo')
			
		);

		$this->load->model('Datos_Model','DM');
		$insert = $this->DM->save($data);
	}

	


	
}
?>