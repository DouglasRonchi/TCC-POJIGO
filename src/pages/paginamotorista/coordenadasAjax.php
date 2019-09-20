<?php

require_once '../../classes/Autoload.class.php';
$conn = New Site;

//Receive data
$lat = $_POST['lat'];
$lon = $_POST['lon'];

$cod_viagem = $_POST['codViagem'];

//Testing:
//$lat = -26.8833551;
//$lon = -49.1390603;
//$cod_viagem = 17;

$conn->executeQuery("INSERT INTO coordenadas (id, fk_cod_viagem, hora, latitude, longitude) VALUES (DEFAULT,'{$cod_viagem}',NOW(),'{$lat}','{$lon}')");

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' . $lat . ',' . $lon . '&key=AIzaSyCbqJXX7fEFddatn-vaBp3BtBS-4TJNIbg');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, false);
$return = curl_exec($curl);
$return = (array)json_decode($return);
$results = (array)$return['results'][0];

//==PLACE_ID=======================================================
if (isset($results['place_id'])) {
    $place_id = (array)$results['place_id'];
    $place_id = (string)$place_id[0];
} else {
    $place_id = '';
}
//==GLOBAL_CODE=======================================================
if (isset($results['plus_code'])) {
    $global_code = (array)$results['plus_code'];
    $global_code = (string)$global_code['global_code'];
} else {
    $global_code = '';
}
//==LATITUDE=======================================================
if (isset($results['geometry'])) {
    $latitude = (array)$results['geometry'];
    $latitude = (array)$latitude['location'];
    $latitude = $latitude['lat'];
} else {
    $latitude = '';
}
//==LONGITUDE=======================================================
if (isset($results['geometry'])) {
    $longitude = (array)$results['geometry'];
    $longitude = (array)$longitude['location'];
    $longitude = $longitude['lng'];
} else {
    $longitude = '';
}
//==STREET_NUMBER=======================================================
if (isset($results['address_components'][0])) {
    $street_number = (array)$results['address_components'][0];
    $street_number = $street_number['short_name'];
} else {
    $street_number = '';
}
//==RUA=======================================================
if (isset($results['address_components'][1])) {
    $address_components = (array)$results['address_components'][1];
    $road = $address_components['short_name'];
} else {
    $road = '';
}
//==BAIRRO=======================================================
if (isset($results['address_components'][2])) {
    $address_components = (array)$results['address_components'][2];
    $suburb = $address_components['short_name'];
} else {
    $suburb = '';
}
//==CIDADE=======================================================
if (isset($results['address_components'][3])) {
    $address_components = (array)$results['address_components'][3];
    $city = $address_components['long_name'];
} else {
    $city = '';
}
//==ESTADO=======================================================
if (isset($results['address_components'][4])) {
    $address_components = (array)$results['address_components'][4];
    $state = $address_components['long_name'];
} else {
    $state = '';
}
//==PAIS=======================================================
if (isset($results['address_components'][5])) {
    $address_components = (array)$results['address_components'][5];
    $country = $address_components['short_name'];
} else {
    $country = '';
}
//==ZIP-CODE=======================================================
if (isset($results['address_components'][6])) {
    $address_components = (array)$results['address_components'][6];
    $zip_code = $address_components['short_name'];
} else {
    $zip_code = '';
}
//==ZIP-CODE=======================================================
if (isset($results['formatted_address'])) {
    $formatted_address = (array)$results['formatted_address'];
    $formatted_address = $formatted_address[0];
} else {
    $formatted_address = '';
}
//==INSERT INTO DB=======================================================

$ultimaPosicao = $conn->executeQuery("SELECT hora FROM coordenadas WHERE fk_cod_viagem = {$cod_viagem} ORDER BY hora DESC LIMIT 1");
$ultimaPosicao = mysqli_fetch_assoc($ultimaPosicao);
$hora = $ultimaPosicao['hora'];

$conn->executeQuery("INSERT INTO dados_googleapi (id, place_id, global_code, lat, lon, street_number, road, suburb, city, state, country, zipcode, formatted_address) VALUES (DEFAULT,'{$place_id}','{$global_code}','{$lat}','{$lon}','{$street_number}','{$road}','{$suburb}','{$city}','{$state}','{$country}','{$zip_code}','{$formatted_address}')");
$last_id = mysqli_insert_id($conn->getConn());


if (isset($results['plus_code'])) {
    $conn->executeQuery("UPDATE dados_googleapi SET global_code = {$global_code} WHERE id = '{$last_id}'");
}

$conn->executeQuery("UPDATE coordenadas SET fk_dados_google = {$last_id} WHERE hora = '{$hora}'");


//=================Somar Distancias Para obter a distancia total


$query = $conn->executeQuery("SELECT latitude,longitude FROM coordenadas WHERE fk_cod_viagem = {$cod_viagem} ORDER BY hora DESC LIMIT 1");

$result = mysqli_fetch_assoc($query);

//Our starting point / origin. Change this if you wish.
$start = $result['latitude'] . "," . $result['longitude'];

//Our end point / destination. Change this if you wish.
$destination = $lat . "," . $lon;

//The Google Directions API URL. Do not change this.
$apiUrl = 'https://maps.googleapis.com/maps/api/directions/json';

//Construct the URL that we will visit with cURL.
$url = $apiUrl . '?key=AIzaSyCbqJXX7fEFddatn-vaBp3BtBS-4TJNIbg&' . 'origin=' . $start . '&destination=' . $destination;

//Initiate cURL.
$curl = curl_init($url);

//Tell cURL that we want to return the data.
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, false);

//Execute the request.
$res = curl_exec($curl);

//If something went wrong with the request.
if (curl_errno($curl)) {
    throw new Exception(curl_error($curl));
}

//Close the cURL handle.
curl_close($curl);

//Decode the JSON data we received.
$json = json_decode(trim($res), true);


//Automatically select the first route that Google gave us.
$route = $json['routes'][0];

//Loop through the "legs" in our route and add up the distances.
$totalDistance = 0;
foreach ((array)$route['legs'] as $leg) {
    $totalDistance = $totalDistance + $leg['distance']['value'];
}

//Divide by 1000 to get the distance in KM.
$totalDistance = round($totalDistance / 1000);

//Print out the result.

$query = $conn->executeQuery("SELECT rp.quilometragem, coo.hora FROM registro_ponto rp JOIN coordenadas coo ON coo.fk_cod_viagem = rp.cod_viagem WHERE cod_viagem = {$cod_viagem} ORDER BY coo.hora DESC LIMIT 1");
$result = mysqli_fetch_assoc($query);

$totalDistance = (float)((float)$result['quilometragem'] + $totalDistance);

$query = $conn->executeQuery("UPDATE registro_ponto SET quilometragem = $totalDistance WHERE cod_viagem = {$cod_viagem}");

echo (float)$totalDistance;
echo "-------------------------------";
echo $query;