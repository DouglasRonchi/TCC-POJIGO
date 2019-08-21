<?php 
require_once '../../classes/Autoload.class.php';
$conn = New Site;
$usuario = New Usuario;
$usuario->setCadastro(17);

//Quando existir o Login, assim que logar vai gerar um novo código de viagem e setar o usuario no banco
//if (isset($_SESSION['usuario']) && isset($_SESSION['codigo_viagem'])){
$sql = "INSERT INTO registro_ponto (fk_usuario, cod_viagem) VALUES ('$fk_usuario', '$cod_viagem')";


?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Custom fonts for this template-->
    <link href="../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../../../css/sb-admin-2.min.css" rel="stylesheet">
	<title>Início</title>
</head>
<body class="bg-gradient-primary">


	<div class="container-fluid">

		<header class="row">
			<div class="col-12">
				<img class="p-2 mx-auto d-block" src="../../../img/logoc.png">
				<!-- <div class="mr-2 text-center text-white">
					<h6>Olá, Motorista!</h6>
					<a class="text-white" href="#">Sair</a>
				</div> -->
			</div>
		</header>

		<div class="row mt-4">
			<div class="col-12 mx-auto d-block shadow-lg">
				<div class="text-light text-center mt-4">
					<h2>Cadastro</h2>
					<h6><?=$usuario->getCadastro()?></h6>
				</div>
				<div class="btn-group-vertical mx-auto d-block p-4" role="group" aria-label="Button group with nested dropdown">
					<a href="rotas.php" class="btn btn-dark p-3 font-weight-bold">Rota</a>
					<a href="frota.php" class="btn btn-dark p-3 font-weight-bold">Frota</a>
					<a href="index_motorista.php" class="btn btn-success p-3 font-weight-bold">Começar</a>
				</div>
			</div>
		</div>


		<footer class="row">
			<div class="col-12 text-center text-white p-5">
				<small>Central:</small><h4>(47) 3333-5898</h4>
			</div>	
		</footer>



	</div>



    <!-- Bootstrap core JavaScript-->
    <script src="../../../vendor/jquery/jquery.min.js"></script>
    <script src="../../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../../js/sb-admin-2.min.js"></script>

    <script src="../../../js/funcoesMobile.js"></script>


</body>
</html>