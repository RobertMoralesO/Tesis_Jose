<?php
	if (!defined('BASEPATH'))
   exit('No direct script access allowed');


class Login extends CI_Controller{


	public function index(){
		$datos['error']="";
		$datos['action']="Login/login_process";
		$this->load->view('login2.html',$datos);
	}

	public function error(){
		$datos['error'] = "Usuario y Contraseña Incorrectos";
		$datos['action']="login_process";
		$this->load->view('login2.html',$datos);
	}

	public function login_process(){
		$data = array(
			'usuario' => $this->input->post('usuario'),
			'contrasena' => $this->input->post('contrasena')
		);
		$this->load->model('Login_Model', 'LM', true);
		$result = $this->LM->login($data);
		if($result){

			$this->load->model('Login_Model', 'LM', true);
		    $usuario = $this->LM->informacion_usuario($data);
			$usuario_data = array(
					'id'=> $usuario->id,
					'nombre_completo'=> $usuario->nombre_completo,
					'logueado'=>TRUE

				);

			$this->session->set_userdata($usuario_data);
			
		redirect('Login/administracion');
		}else{
			
			redirect('Login/error');
		}

	 }

	 public function administracion(){
	 	if($this->session->userdata('logueado')){
         $this->load->view('admin.html');
      }else{
         redirect('Login');
      }
	 }

	 public function logout(){
	 	$usuario_data = array(
        	 'logueado' => FALSE
     	 );
      $this->session->set_userdata($usuario_data);
      	redirect('Login');
	 }
}
?>
