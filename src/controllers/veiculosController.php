<?php

require_once '../classes/Veiculo.class.php';

$veiculo = New Veiculo;

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

