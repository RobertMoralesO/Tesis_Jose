<?php
class Login_Model extends CI_Model{

	public function login($data) {

		$condition = "usuario =" . "'" . $data['usuario'] . "' AND " . "contrasena =" . "'" . md5($data['contrasena']) . "'";
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}
}
?>