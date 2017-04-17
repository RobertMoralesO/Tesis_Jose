<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('mysql_to_excel_helper');
	}

	public function index()
	{
		$this->load->model('usuarios');
		to_excel($this->usuarios->get(), "datos");
	}
	public function exportar_datos($id)
	{
		$this->load->model('usuarios');
		to_excel($this->usuarios->get(), "datos");
		echo json_encode(array('status'=>TRUE));
	}

}
/* End of file home.php */
/* Location: ./application/controllers/home.php */