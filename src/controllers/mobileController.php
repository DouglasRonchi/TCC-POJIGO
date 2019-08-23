<?php
require_once '../classes/Autoload.class.php';
$conn = New Site;


if (isset($_POST['btnFrota'])){
    $frota = $_POST['textview'];



    header('Location: ../pages/paginamotorista/index.php');

} if (isset($_POST['btnRotaOk'])){
    $id_rota = $_SESSION['id_rota'];
    $rota = $_POST['inputRota'];
    $conn->executeQuery("UPDATE registro_ponto SET fk_rota = {$rota} WHERE id = {$id_rota}");

    header('Location: ../pages/paginamotorista/index.php');
}