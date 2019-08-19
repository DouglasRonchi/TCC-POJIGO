<?php

require_once "../classes/Usuario.class.php";

$usuario = new Usuario;

//Buscando o Último cadastro do banco e setando um novo Cadastro
$query = $usuario->executeQuery('SELECT cadastro FROM `usuario` ORDER BY cadastro DESC LIMIT 1');
while ($row = mysqli_fetch_assoc($query)){
    $cadastro = $row['cadastro'];
}

$usuario->setNome($_POST['inputNome']);
$usuario->setUsuario($_POST['inputUsuario']);
$usuario->setCadastro($cadastro+1);
$usuario->setTelefone($_POST['inputTelefone']);
$usuario->setUsuario($_POST['inputUsuario']);
$usuario->setEmail($_POST['inputEmail']);
$usuario->setSenha($_POST['inputSenha']);
$usuario->setEndereco($_POST['inputEndereco']);
$usuario->setBairro($_POST['inputBairro']);
$usuario->setCidade($_POST['inputCidade']);
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

header('Location: ../pages/paginagestor');

?>