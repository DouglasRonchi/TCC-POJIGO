<?php
require_once '../classes/Autoload.class.php';
$conn = New Site;

$id = $_POST['id'];

if (isset($_POST['clicknotificacao'])){

	$conn->executeQuery("UPDATE notificacoes SET lida = '1' WHERE notificacoes.id = {$id};");
	header('Location: '.$conn->path('src/pages/paginagestor/dashboard.php'));

} else if (isset($_POST['dismissAll'])){
    $conn->executeQuery("UPDATE notificacoes SET lida = '1' WHERE fk_usuario = {$_SESSION['usuario_id']}");
    header('Location: '.$conn->path('src/pages/paginagestor/dashboard.php'));
} else if (isset($_POST['deleteAll'])){
    $conn->executeQuery("DELETE FROM notificacoes WHERE fk_usuario = '{$_SESSION['usuario_id']}'");
    header('Location: '.$conn->path('src/pages/paginagestor/dashboard.php'));
}
