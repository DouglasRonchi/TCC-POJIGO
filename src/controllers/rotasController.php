<?php
require_once '../classes/Autoload.class.php';
$conn = New Site;

$origem = utf8_decode($_POST['origem']);
$destino = utf8_decode($_POST['destino']);


$query = $conn->executeQuery("SELECT * FROM cidades WHERE nome_cidade= '{$origem}'");

if (mysqli_num_rows($query) < 1) {
	$conn->executeQuery("INSERT INTO cidades (id,nome_cidade) VALUES (DEFAULT, '{$origem}')");
	$last_id = mysqli_insert_id ($conn->getConn());
	$id_origem = $last_id;
} else {	
	$result = mysqli_fetch_assoc($query);
	$id_origem = $result['id'];
}


$query = $conn->executeQuery("SELECT * FROM cidades WHERE nome_cidade= '{$destino}'");

if (mysqli_num_rows($query) < 1) {
	$conn->executeQuery("INSERT INTO cidades (id,nome_cidade) VALUES (DEFAULT, '{$destino}')");
	$last_id = mysqli_insert_id ($conn->getConn());
	$id_destino = $last_id;
} else {
	$result = mysqli_fetch_assoc($query);
	$id_destino = $result['id'];
}



if (isset($_POST['salvar'])) {


    	//Buscar cidade conforme o dado vindo da origem e destino

	$result = mysqli_fetch_assoc($conn->executeQuery("SELECT nome_cidade FROM cidades WHERE id = {$id_origem}"));
	$cidade_origem = $result['nome_cidade'];

	$result = mysqli_fetch_assoc($conn->executeQuery("SELECT nome_cidade FROM cidades WHERE id = {$id_destino}"));
	$cidade_destino = $result['nome_cidade'];

#Recolhendo os dados do formulário
	$result = mysqli_fetch_assoc($conn->executeQuery("SELECT nome_rota FROM rotas WHERE nome_rota = '{$cidade_origem} X {$cidade_destino}'"));
	$nome_rota = $result['nome_rota'];
	$nome_rota_nova = $cidade_origem.' X '.$cidade_destino;

	if ($nome_rota == $nome_rota_nova){
		//ja existe não salvar
		$conn->setAlerta(
		'danger',
		'Rota já existe.',
		'<img class="img-fluid" src="'.$conn->path('img/icons/error.png').'">',
		$_SESSION['usuario_id']
	);
	} else {

		$sql = "INSERT INTO rotas (`nome_rota`, `fk_cidade_origem`, `fk_cidade_destino`) VALUES ('{$cidade_origem} X {$cidade_destino}', '{$id_origem}', '{$id_destino}')";
		$conn->executeQuery($sql);

$conn->setAlerta(
		'success',
		'Rota cadastrada com sucesso',
		'<img class="img-fluid" src="'.$conn->path('img/icons/success.png').'">',
		$_SESSION['usuario_id']
	);


	}



	header('Location: ../pages/paginagestor/relatorio_rotas.php');

} else if (isset($_POST['btnExcluirRota'])) {

	$id_rota = $_POST['idRota'];
	$conn->executeQuery("DELETE FROM rotas WHERE id = {$id_rota}");
	header('Location: ../pages/paginagestor/relatorio_rotas.php');



} else if (isset($_POST['btnEditarRota'])) {
	$id_rota = $_POST['idRota'];
	header('Location: ../pages/paginagestor/cadastro_rotas.php?id='.$id_rota.'');

} else if (isset($_POST['atualizar'])) {
	$id_rota = $_POST['id'];
	$result = mysqli_fetch_assoc($conn->executeQuery("SELECT nome_cidade FROM cidades WHERE id = {$id_origem}"));
	$cidade_origem = $result['nome_cidade'];

	$result = mysqli_fetch_assoc($conn->executeQuery("SELECT nome_cidade FROM cidades WHERE id = {$id_destino}"));
	$cidade_destino = $result['nome_cidade'];

#Recolhendo os dados do formulário
	$result = mysqli_fetch_assoc($conn->executeQuery("SELECT nome_rota FROM rotas WHERE nome_rota = '{$cidade_origem} X {$cidade_destino}'"));
	$nome_rota = $result['nome_rota'];
	$nome_rota_nova = $cidade_origem.' X '.$cidade_destino;

	if ($nome_rota == $nome_rota_nova){
		//ja existe não salvar
	} else {

		$sql = "UPDATE rotas SET nome_rota = '{$cidade_origem} X {$cidade_destino}' WHERE id = {$id_rota}";
		$conn->executeQuery($sql);

		$sql = "UPDATE rotas SET fk_cidade_origem = $id_origem WHERE id = {$id_rota}";
		$conn->executeQuery($sql);

		$sql = "UPDATE rotas SET fk_cidade_destino = $id_destino WHERE id = {$id_rota}";
		$conn->executeQuery($sql);


		$conn->setAlerta(
			'success',
			'Rota atualizada com sucesso',
			'<img class="img-fluid" src="'.$conn->path('img/icons/success.png').'">',
			$_SESSION['usuario_id']
		);

		header('Location: ../pages/paginagestor/relatorio_rotas.php');


	}

}

?>