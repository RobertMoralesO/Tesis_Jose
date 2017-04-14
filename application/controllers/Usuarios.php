<?php
class Usuarios extends CI_Controller
{
	public function saludar()
	{
		$this->load->model('Usuarios_Model', 'UM', true);
		$datos['usuarios']= $this->UM->getAll();
		$this->load->view('usuarioSaludo.php', $datos);
	}

	public function test(){
		$this->load->view('usuarioSaludo.php');	
	}
}
?>