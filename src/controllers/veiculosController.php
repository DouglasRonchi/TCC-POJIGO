<?php
require_once '../classes/Autoload.class.php';
$conn = New Site;
$veiculo = New Veiculo;


if (isset($_POST['btnSalvarNovo'])) {
    $veiculo->setFrota($_POST['inputFrota']);
    $veiculo->setMarca($_POST['inputMarca']);
    $veiculo->setModelo($_POST['inputModelo']); //id do modelo
    $veiculo->setPlaca($_POST['inputPlaca']);
    $veiculo->setChassi($_POST['inputChassi']);
    $veiculo->setRenavam($_POST['inputRenavam']);
    $veiculo->setAnoFabricacao($_POST['inputDataDeFabricacao']);
    $veiculo->setAnoModelo($_POST['inputAnoModelo']);
    $veiculo->setCapacidadeCarga($_POST['inputCapacidadeDeCarga']);
    $veiculo->setCapacidadeTanque($_POST['inputCapacidadeDeTanque']);


    $veiculo->cadastrarVeiculo();

    $conn->setAlerta(
        'success',
        'Veículo '.$veiculo->getFrota().' cadastrado com sucesso',
        '<img class="img-fluid" src="'.$conn->path('img/icons/success.png').'">',
        $_SESSION['usuario_id']
    );

    header('Location: ../pages/paginagestor');

} else if (isset($_POST['btnMarcaeModelo'])) {
    $marca = $_POST['inputMarca'];
    $modelo = $_POST['inputModelo'];

    $sql = "SELECT * FROM marca_veiculo WHERE marca = '{$marca}'";
    $query = $conn->executeQuery($sql);
    $rows = mysqli_num_rows($query);
    $result = mysqli_fetch_assoc($query);

    if ($rows == 1){
        //Marca Já Existe
        $fk_marca = $result['id'];
        $conn->executeQuery("INSERT INTO modelo_veiculo (id, modelo, fk_marca) VALUES (DEFAULT,'{$modelo}','{$fk_marca}')");
    } else {
        //Nova Marca
        $query = $conn->executeQuery("INSERT INTO marca_veiculo (id, marca) VALUES (DEFAULT,'{$marca}')");
        $lastid = mysqli_insert_id($conn->getConn());
        $query = $conn->executeQuery("INSERT INTO modelo_veiculo (id, modelo, fk_marca) VALUES (DEFAULT,'{$modelo}','{$lastid}')");
    }

    header('Location: ../pages/paginagestor/cadastro_veiculos.php');

} else if (isset($_POST['btnExcluir'])){
    $idFrota = $_GET['id'];

    $conn->setAlerta(
        'success',
        'Veículo '.$veiculo->getFrotaById($idFrota).' excluido com sucesso',
        '<img class="img-fluid" src="'.$conn->path('img/icons/success.png').'">',
        $_SESSION['usuario_id']
    );

    $conn->executeQuery("DELETE FROM veiculos WHERE id = {$idFrota}");

    header('Location: ../pages/paginagestor/relatorio_veiculos.php');
} else if (isset($_POST['btnEditar'])){
    header("Location: ../pages/paginagestor/cadastro_veiculos.php?editar=1&id={$_GET['id']}");

} else if (isset($_POST['btnAtualizar'])) {
    $veiculo->setId($_POST['id']);
    $veiculo->setFrota($_POST['inputFrota']);
    $veiculo->setMarca($_POST['inputMarca']);
    $veiculo->setModelo($_POST['inputModelo']); //id do modelo
    $veiculo->setPlaca($_POST['inputPlaca']);
    $veiculo->setChassi($_POST['inputChassi']);
    $veiculo->setRenavam($_POST['inputRenavam']);
    $veiculo->setAnoFabricacao($_POST['inputDataDeFabricacao']);
    $veiculo->setAnoModelo($_POST['inputAnoModelo']);
    $veiculo->setCapacidadeCarga($_POST['inputCapacidadeDeCarga']);
    $veiculo->setCapacidadeTanque($_POST['inputCapacidadeDeTanque']);


    $veiculo->atualizarVeiculo();

    $conn->setAlerta(
        'success',
        'Veículo '.$veiculo->getFrota().' atualizado com sucesso',
        '<img class="img-fluid" src="'.$conn->path('img/icons/success.png').'">',
        $_SESSION['usuario_id']
    );

    header('Location: ../pages/paginagestor/relatorio_veiculos.php');
} 

