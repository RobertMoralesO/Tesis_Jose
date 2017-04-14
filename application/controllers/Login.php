<?php
class Login extends CI_Controller{
	public function index(){
		$this->load->view('login2.html');
	}

	public function login_process(){
		$data = array(
			'usuario' => $this->input->post('usuario'),
			'contrasena' => $this->input->post('contrasena')
		);
		$this->load->model('Login_Model', 'LM', true);
		$result = $this->LM->login($data);
		if($result == TRUE){
			$this->load->view('admin.html');	
		}else{
			echo "No entró";
		}

		
		
	 }
}
?>
