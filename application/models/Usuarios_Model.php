<?php
class Usuarios_Model extends CI_Model
{
	public function getAll(){
		$result = $this->db->get('usuarios');
		$users = $result->result_array();
		return $users;
	}
}
?>