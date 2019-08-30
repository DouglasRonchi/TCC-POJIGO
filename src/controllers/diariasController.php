<?php
require_once '../classes/Autoload.class.php';
$conn = new Site;

$sqlDiaria = $conn->executeQuery("SELECT * FROM usuario WHERE previlegio = 3");
$resultado = mysqli_fetch_array($sqlDiaria);
$id = $resultado['usuario_id'];



$sqlDiaria = $conn->executeQuery('SELECT SUM(dia.valor), rp.fk_usuario FROM registro_ponto rp JOIN diarias dia ON dia.id = rp.fk_diaria WHERE rp.fk_usuario = '.$id.'');
$diaria = mysqli_fetch_assoc($sqlDiaria);

echo "<pre>";
var_dump($diaria);
echo "</pre>";
