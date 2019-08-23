<?php
require_once '../classes/Autoload.class.php';
$conn = new Site;



$registro = new Registro;
$query = $registro->selectRegistros(19);
$res = mysqli_fetch_assoc($query);


$hora_inicio = (int)substr($res['hora_inicio'], -8, -6);
$minuto_inicio = (int)substr($res['hora_inicio'], -4, -2);

var_dump($hora_inicio);
var_dump($minuto_inicio);