<?php

require_once '../classes/Autoload.class.php';
$conn=new Site;

$usuario = new Usuario;

if (isset($_POST['btnSalvar'])) {

//Buscando o Último cadastro do banco e setando um novo Cadastro
$query = $usuario->executeQuery('SELECT cadastro FROM `usuario` ORDER BY cadastro DESC LIMIT 1');
while ($row = mysqli_fetch_assoc($query)){
    $cadastro = $row['cadastro'];
}

$tipo_usuario = $_POST['inputTipoUsuario'];
switch ($tipo_usuario){
    case "1":
        $tipo_usuario = 'Administrador';
        $previlegio = 1;
        break;
    case "2":
        $tipo_usuario = 'Gestor';
        $previlegio = 2;
        break;
    case "3":
        $tipo_usuario = 'Motorista';
        $previlegio = 3;
        break;
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
$usuario->setTipoUsuario($tipo_usuario);
$usuario->setPrevilegio($previlegio);



$usuario->cadastrarUsuario();


    header('Location: ../pages/paginagestor/cadastro_usuarios.php');

} else if (isset($_POST['btnExcluir'])) {
$conn->executeQuery("DELETE FROM usuario WHERE usuario_id = {$_GET['id']}");

$conn->setAlerta(

        'success',
        'Usuario excluido com sucesso',
        '<img class="img-fluid" src="'.$conn->path('img/icons/success.png').'">',
        $_SESSION['usuario_id']
    
);



header('Location:../pages/paginagestor/relatorio_usuarios.php');
} else if (isset($_POST['btnEditar'])){
    header("Location:/pages/paginagestor/cadastro_usuarios.php?editar=1&id={$_GET['id']}");
}


?> 
