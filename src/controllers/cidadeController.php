<?php
require_once '../classes/Autoload.class.php';
$conn = New Site;

$nome_cidade = $_POST['inputNome_cidade'];

if (isset($_POST['salvar'])) {
	$sql = "INSERT INTO cidades (`nome_cidade`) VALUES ('{$nome_cidade}')";
	$conn->executeQuery($sql);
}
?>
