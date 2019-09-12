<?php

require_once '../../classes/Autoload.class.php';
$conn = New Site;

// //Recebe os dados
$lat = $_POST['lat'];
$lon = $_POST['lon'];

$cod_viagem = $_SESSION['cod_viagem'];


$conn->executeQuery("INSERT INTO coordenadas (id, fk_cod_viagem, hora, latitude, longitude) VALUES (DEFAULT,'{$_SESSION['cod_viagem']}',NOW(),'{$lat}','{$lon}')");
//
//$curl = curl_init();
//curl_setopt($curl, CURLOPT_URL, 'https://nominatim.openstreetmap.org/reverse?lat' . $lat . '&lon=' . $lon . '&format=json');
//$result = curl_exec($curl);
//$result = json_encode($result);
//
//
//$conn->executeQuery("INSERT INTO dados_nominatim (id, place_id) VALUES (DEFAULT,{$result->place_id})");
//



