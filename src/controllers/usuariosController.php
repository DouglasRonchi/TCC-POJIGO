<?php

require_once "../classes/Usuario.class.php";

$usuario = new Usuario;

$usuario->setNome($_POST['inputNome']);
$usuario->setUsuario($_POST['inputUsuario']);
$usuario->setTelefone($_POST['inputTelefone']);
$usuario->setUsuario($_POST['inputUsuario']);
$usuario->setEmail($_POST['inputEmail']);
$usuario->setSenha($_POST['inputSenha']);
$usuario->setEndereco($_POST['inputEndereco']);
$usuario->setBairro($_POST['inputBairro']);
$usuario->setEstado($_POST['inputEstado']);
$usuario->setRg($_POST['inputRG']);
$usuario->setCpf($_POST['inputCPF']);
$usuario->setDataNascimento($_POST['inputNascimento']);
$usuario->setDataAdmissao($_POST['inputAdmissao']);
$usuario->setCnh($_POST['inputCNH']);
$usuario->setVencimentoCnh($_POST['inputVencimentoCNH']);
$usuario->setMopp($_POST['inputMOPP']);
$usuario->setVencimentoMopp($_POST['inputVencimentoMOPP']);

$usuario->cadastrarUsuario();
?>