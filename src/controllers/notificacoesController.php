<?php
require_once '../classes/Autoload.class.php';
$conn = New Site;

$id = $_POST['id'];

if (isset($_POST['clicknotificacao'])){

	$conn->executeQuery("UPDATE notificacoes SET lida = '1' WHERE notificacoes.id = {$id};");
	header('Location: /TCC-POJIGO/src/pages/paginagestor/index.php');

} else if (isset($_POST['dismissAll'])){
    $conn->executeQuery("UPDATE notificacoes SET lida = '1'");
    header('Location: /TCC-POJIGO/src/pages/paginagestor/index.php');
}
