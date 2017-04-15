<?php
$var = '{"values":[{"key": "id", "value": 2},{"key": "counter", "value": 1024},{"key": "temperature", "value": 3329},{"key": "x_axis", "value": -9},{"key": "y_axis", "value": 253},{"key": "z_axis", "value": 1},{"key": "battery", "value": 3066},{"date":"04/14/2017"},{"time":"15:47:16"}]}';
$data = json_decode($var,true);

$variables = array('{"values":[{"key": "id", "value": 2},{"key": "counter", "value": 0},{"key": "temperature", "value": 3076},{"key": "x_axis", "value": 246},{"key": "y_axis", "value": -256},{"key": "z_axis", "value": 254},{"key": "RSSI", "value": 0},{"key": "LQI", "value": 0},{"key": "battery", "value": 2816},{"date":"11/19/2016"},{"time":"00:02:24"}]}',
'{"values":[{"key": "id", "value": 3},{"key": "counter", "value": 0},{"key": "temperature", "value": 3348},{"key": "x_axis", "value": 128},{"key": "y_axis", "value": -231},{"key": "z_axis", "value": 254},{"key": "RSSI", "value": 0},{"key": "LQI", "value": 0},{"key": "battery", "value": 2816},{"date":"11/19/2016"},{"time":"00:02:28"}]}',
'{"values":[{"key": "id", "value": 2},{"key": "counter", "value": 0},{"key": "temperature", "value": 3333},{"key": "x_axis", "value": 3},{"key": "y_axis", "value": -256},{"key": "z_axis", "value": 254},{"key": "RSSI", "value": 0},{"key": "LQI", "value": 0},{"key": "battery", "value": 2816},{"date":"11/19/2016"},{"time":"00:02:34"}]}',
'{"values":[{"key": "id", "value": 3},{"key": "counter", "value": 0},{"key": "temperature", "value": 3349},{"key": "x_axis", "value": 122},{"key": "y_axis", "value": -231},{"key": "z_axis", "value": 254},{"key": "RSSI", "value": 0},{"key": "LQI", "value": 0},{"key": "battery", "value": 2816},{"date":"11/19/2016"},{"time":"00:02:38"}]}',
'{"values":[{"key": "id", "value": 2},{"key": "counter", "value": 0},{"key": "temperature", "value": 3334},{"key": "x_axis", "value": 9},{"key": "y_axis", "value": -256},{"key": "z_axis", "value": 254},{"key": "RSSI", "value": 0},{"key": "LQI", "value": 0},{"key": "battery", "value": 2816},{"date":"11/19/2016"},{"time":"00:02:44"}]}',
'{"values":[{"key": "id", "value": 3},{"key": "counter", "value": 0},{"key": "temperature", "value": 3350},{"key": "x_axis", "value": 128},{"key": "y_axis", "value": -232},{"key": "z_axis", "value": 253},{"key": "RSSI", "value": 0},{"key": "LQI", "value": 0},{"key": "battery", "value": 2816},{"date":"11/19/2016"},{"time":"00:02:48"}]}',
'{"values":[{"key": "id", "value": 2},{"key": "counter", "value": 0},{"key": "temperature", "value": 3335},{"key": "x_axis", "value": -247},{"key": "y_axis", "value": -1},{"key": "z_axis", "value": 255},{"key": "RSSI", "value": 0},{"key": "LQI", "value": 0},{"key": "battery", "value": 2816},{"date":"11/19/2016"},{"time":"00:02:54"}]}',
'{"values":[{"key": "id", "value": 3},{"key": "counter", "value": 0},{"key": "temperature", "value": 3351},{"key": "x_axis", "value": 128},{"key": "y_axis", "value": -232},{"key": "z_axis", "value": 253},{"key": "RSSI", "value": -8854},{"key": "LQI", "value": 27391},{"key": "battery", "value": 2816},{"date":"11/19/2016"},{"time":"00:02:58"}]}',
'{"values":[{"key": "id", "value": 2},{"key": "counter", "value": 0},{"key": "temperature", "value": 3336},{"key": "x_axis", "value": -241},{"key": "y_axis", "value": -1},{"key": "z_axis", "value": 254},{"key": "RSSI", "value": 0},{"key": "LQI", "value": 0},{"key": "battery", "value": 2816},{"date":"11/19/2016"},{"time":"00:03:04"}]}',
'{"values":[{"key": "id", "value": 3},{"key": "counter", "value": 0},{"key": "temperature", "value": 3352},{"key": "x_axis", "value": 128},{"key": "y_axis", "value": -231},{"key": "z_axis", "value": 253},{"key": "RSSI", "value": 0},{"key": "LQI", "value": 0},{"key": "battery", "value": 2816},{"date":"11/19/2016"},{"time":"00:03:08"}]}',
'{"values":[{"key": "id", "value": 2},{"key": "counter", "value": 0},{"key": "temperature", "value": 3337},{"key": "x_axis", "value": 22},{"key": "y_axis", "value": -256},{"key": "z_axis", "value": 254},{"key": "RSSI", "value": 0},{"key": "LQI", "value": 0},{"key": "battery", "value": 2816},{"date":"11/19/2016"},{"time":"00:03:14"}]}');

$intervalos_humedad= array(-0.64,-0.03,2.56,-1.09,1.05,3.42,-3.18,0.47,-1.47,0.67,6.10,-2.78,0.39,0.77,-2.66,-0.03,-1.19,2.86,3.25,2.33);

$humedad = 31.34;
for( $i = 0; $i<count($variables); $i++ ) {
  $data = json_decode($variables[$i],true);

$temperatura = $data['values'][2]['value'];

//echo " Temperatura del suelo: ".($temperatura/100)."o";
echo " Humedad del suelo: ".$humedad."%";

$humedad = $humedad + $intervalos_humedad[mt_rand(0,19)];

if($humedad<27.96 ) $humedad= $humedad +1;
else if($humedad >39.87) $humedad = $humedad - 1; 
 
 }


 /*for( $i = 0; $i<count($variables); $i++ ) {
  $data = json_decode($variables[0],true);
  

$temperatura = $data['values'][2]['value'];


echo "\n\ntemperatura: ".$temperatura."o";

 }*/

/*$id_mota = $data['values'][0]['value'];
$temperatura = $data['values'][2]['value'];
$ejex = $data['values'][3]['value'];
$ejey = $data['values'][4]['value'];
$ejez = $data['values'][5]['value'];
$bateria = $data['values'][6]['value'];
$fecha = $data['values'][7]['date'];
$hora = $data['values'][8]['time'];

$temperatura = $temperatura/100;
$bateria = $bateria/1000;
echo "\n\nid_mota: ".$id_mota;
echo "\n\ntemperatura: ".$temperatura."o";
echo "\n\neje x: ".$ejex;
echo "\n\neje y: ".$ejey;
echo "\n\neje z: ".$ejez;
echo "\n\nbateria: ".$bateria."V";
echo "\n\nfecha: ".$fecha;
echo "\n\nhora: ".$hora;
*/


?>