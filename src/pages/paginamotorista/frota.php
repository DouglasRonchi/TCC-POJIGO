<?php 

 ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Custom fonts for this template-->
    <link href="../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../../../css/sb-admin-2.min.css" rel="stylesheet">
	<title>Frota</title>
</head>
<body class="bg-gradient-primary">


	<div class="container-fluid">
		
		<header class="row">
			<div class="col-12">
				<img class="p-2 mx-auto d-block" src="../../../img/logoc.png">
			</div>
		</header>

		<div class="row">
            <a href="index.php" class="btn-sm btn-danger text-decoration-none">Voltar</a>
            <div class="col-11 mx-auto btn-block shadow-lg p-3">
				<form name="form" action="../../controllers/mobileController.php" method="post">
					<input readonly class="textview text-center mb-1" name="textview" id="txtarea" style="width: 100%;height: 50px" placeholder="Frota..."></input>

					<div class="btn-group btn-block" role="group" aria-label="Button">
						<button type="button" id="btn" class="btn btn-dark p-2 font-weight-bold" onclick="insert(1)">1</button>
						<button type="button" class="btn btn-dark p-2 font-weight-bold" onclick="insert(2)">2</button>
						<button type="button" class="btn btn-dark p-2 font-weight-bold" onclick="insert(3)">3</button>
					</div>
					<div class="btn-group btn-block" role="group" aria-label="Button">
						<button type="button" class="btn btn-dark p-2 font-weight-bold" onclick="insert(4)">4</button>
						<button type="button" class="btn btn-dark p-2 font-weight-bold" onclick="insert(5)">5</button>
						<button type="button" class="btn btn-dark p-2 font-weight-bold" onclick="insert(6)">6</button>
					</div>
					<div class="btn-group btn-block" role="group" aria-label="Button">
						<button type="button" class="btn btn-dark p-2 font-weight-bold" onclick="insert(7)">7</button>
						<button type="button" class="btn btn-dark p-2 font-weight-bold" onclick="insert(8)">8</button>
						<button type="button" class="btn btn-dark p-2 font-weight-bold" onclick="insert(9)">9</button>
					</div>
					<div class="btn-group btn-block" role="group" aria-label="Button">

						<button type="button" class="btn btn-dark p-2 font-weight-bold" onclick="insert(0)">0</button>
					</div>
					<div class="btn-group btn-block" role="group" aria-label="Button">

						<button type="button" class="btn btn-dark p-2 font-weight-bold" onclick="limpar()">Limpar</button>
					</div>
					<div class="btn-group btn-block" role="group" aria-label="Button">

						<button name="btnFrotaOk" class="btn btn-success p-2 font-weight-bold">Ok</button>
					</div>
				</form>
			</div>
		</div>


		<footer class="row">
			<div class="col-12 text-center text-white p-4">
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