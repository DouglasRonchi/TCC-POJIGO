<?php

require_once '../../classes/Autoload.class.php';
$conn = New Site;

// //Recebe os dados
$lat = $_POST['lat'];
$lon = $_POST['lon'];
$cod_viagem = $_SESSION['cod_viagem'];

$conn->executeQuery("INSERT INTO coordenadas (id, fk_cod_viagem, hora, latitute, longitude) VALUES (DEFAULT,'{$_SESSION['cod_viagem']}',NOW(),'{$lat}','{$lon}')");

