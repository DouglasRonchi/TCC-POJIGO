<?php
require_once '../classes/Autoload.class.php';
$conn = New Site;

$origem = $_POST['origem'];
$destino = $_POST['destino'];

if (isset($_POST['salvar'])) {

    	//Buscar cidade conforme o dado vindo da origem e destino

	$result = mysqli_fetch_assoc($conn->executeQuery("SELECT nome_cidade FROM cidades WHERE id = {$origem}"));
	$cidade_origem = $result['nome_cidade'];

	$result = mysqli_fetch_assoc($conn->executeQuery("SELECT nome_cidade FROM cidades WHERE id = {$destino}"));
	$cidade_destino = $result['nome_cidade'];

#Recolhendo os dados do formulário
	$result = mysqli_fetch_assoc($conn->executeQuery("SELECT nome_rota FROM rotas WHERE nome_rota = '{$cidade_origem} X {$cidade_destino}'"));
	$nome_rota = $result['nome_rota'];
	$nome_rota_nova = $cidade_origem.' X '.$cidade_destino;

	if ($nome_rota == $nome_rota_nova){
		//ja existe não salvar
	} else {

		$sql = "INSERT INTO rotas (`nome_rota`, `fk_cidade_origem`, `fk_cidade_destino`) VALUES ('{$cidade_origem} X {$cidade_destino}', '{$origem}', '{$destino}')";
		$conn->executeQuery($sql);
	}
}
?>