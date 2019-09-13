<?php

require_once '../../classes/Autoload.class.php';
$conn = New Site;

//Receive data
$lat = $_POST['lat'];
$lon = $_POST['lon'];

$cod_viagem = $_SESSION['cod_viagem'];

//Testing:
//$lat = -26.8833551;
//$lon = -49.1390603;
//$cod_viagem = 17;

$conn->executeQuery("INSERT INTO coordenadas (id, fk_cod_viagem, hora, latitude, longitude) VALUES (DEFAULT,'{$_SESSION['cod_viagem']}',NOW(),'{$lat}','{$lon}')");

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.$lat.','.$lon.'&key=AIzaSyCbqJXX7fEFddatn-vaBp3BtBS-4TJNIbg');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, false);
$return = curl_exec($curl);
$return = (array)json_decode($return);
$results = (array)$return['results'][0];

//==PLACE_ID=======================================================
$place_id = (array)$results['place_id'];
$place_id = (string)$place_id[0];

//==GLOBAL_CODE=======================================================
$global_code = (array)$results['plus_code'];
$global_code = (string)$global_code['global_code'];

//==LATITUDE=======================================================
$latitude = (array)$results['geometry'];
$latitude = (array)$latitude['location'];
$latitude = $latitude['lat'];

//==LONGITUDE=======================================================
$longitude = (array)$results['geometry'];
$longitude = (array)$longitude['location'];
$longitude = $longitude['lng'];

//==STREET_NUMBER=======================================================
$street_number = (array)$results['address_components'][0];
$street_number = $street_number['short_name'];

//==RUA=======================================================
$address_components = (array)$results['address_components'][1];
$road = $address_components['short_name'];

//==BAIRRO=======================================================
$address_components = (array)$results['address_components'][2];
$suburb = $address_components['short_name'];

//==CIDADE=======================================================
$address_components = (array)$results['address_components'][3];
$city = $address_components['long_name'];

//==ESTADO=======================================================
$address_components = (array)$results['address_components'][4];
$state = $address_components['long_name'];

//==PAIS=======================================================
$address_components = (array)$results['address_components'][5];
$country = $address_components['short_name'];

//==ZIP-CODE=======================================================
$address_components = (array)$results['address_components'][6];
$zip_code = $address_components['short_name'];

//==ZIP-CODE=======================================================
$formatted_address = (array)$results['formatted_address'];
$formatted_address = $formatted_address[0];

//==INSERT INTO DB=======================================================

//TEST:
//$sql = "INSERT INTO dados_googleapi (id, place_id, global_code, lat, lon, street_number, road, suburb, city, state, country, zipcode, formatted_address) VALUES (DEFAULT,'{$place_id}','{$global_code}','{$lat}','{$lon}','{$street_number}','{$road}','{$suburb}','{$city}','{$state}','{$country}','{$zip_code}','{$formatted_address}')";
//var_dump($sql);
$ultimaPosicao = $conn->executeQuery("SELECT hora FROM coordenadas WHERE fk_cod_viagem = {$cod_viagem} ORDER BY hora DESC LIMIT 1");
$ultimaPosicao = mysqli_fetch_assoc($ultimaPosicao);
$hora = $ultimaPosicao['hora'];

$conn->executeQuery("INSERT INTO dados_googleapi (id, place_id, global_code, lat, lon, street_number, road, suburb, city, state, country, zipcode, formatted_address) VALUES (DEFAULT,'{$place_id}','{$global_code}','{$lat}','{$lon}','{$street_number}','{$road}','{$suburb}','{$city}','{$state}','{$country}','{$zip_code}','{$formatted_address}')");
$last_id = mysqli_insert_id($conn->getConn());

$conn->executeQuery("UPDATE coordenadas SET fk_dados_google = {$last_id} WHERE hora = '{$hora}'");