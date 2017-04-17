<?php
	if (!defined('BASEPATH'))
   exit('No direct script access allowed');


class Datos extends CI_Controller{

   
	public function index(){
		
		$data = $this->input->post('data');
		/*$data = '{"values":[{"key": "id", "value": 2},{"key": "counter", "value": 1024},{"key": "temperature", "value": 3329},{"key": "x_axis", "value": -9},{"key": "y_axis", "value": 253},{"key": "z_axis", "value": 1},{"key": "battery", "value": 3066},{"date":"04/14/2017"},{"time":"15:47:16"}]}';
*/
		$this->load->model('Datos_Model','DM');

		$data = json_decode($data,true);

		$id_mota = $data['values'][0]['value'];
		$temperatura = $data['values'][2]['value'];
		$ejex = $data['values'][3]['value'];
		$ejey = $data['values'][4]['value'];
		$ejez = $data['values'][5]['value'];
		$bateria = $data['values'][6]['value'];
		$fecha = $data['values'][7]['date'];
		$hora = $data['values'][8]['time'];
		//$id_usuario=2;
		$id_usuario=$data['values'][9]['id_usuario'];
		$humedad = $this->DM->last_humedad($id_usuario);

		$temperatura = $temperatura/100;
		$bateria = $bateria/1000;

		$intervalos_humedad= array(-0.64,-0.03,2.56,-1.09,1.05,3.42,-3.18,0.47,-1.47,0.67,3.10,-2.78,0.39,0.77,-2.66,-0.03,-1.19,2.86,3.25,2.33);
		
		$humedad = $humedad + $intervalos_humedad[mt_rand(0,19)];

		if($humedad<27.96 ) $humedad= $humedad +1;
		else if($humedad >39.87) $humedad = $humedad - 1; 


		$data = array(
			'humedad_suelo' => $humedad,
			'id_usuario' => $id_usuario,
			'temperatura_suelo' => $temperatura,
			'idmota' => $id_mota,
			'bateria' => $bateria,
			'fecha' => $fecha,
			'hora' => $hora,
			'ejex' => $ejex,
			'ejey' => $ejey,
			'ejez' => $ejez
			
		);

		$insert = $this->DM->save($data);


	}

	

	


	
}
?>