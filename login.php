
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<title>login tcc</title>
	<!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body class="bg-gradient-primary">

	<div class="container-fluid">
		<div class="container shadow-lg col-5 roundeds" style="margin-top: 200px; margin-left: 385px;height: 400px; border-radius: 10px">
			<a class="links" id="paracadastro"></a>
			<a class="links" id="paralogin"></a>

			<div class="mt-5">      
				<!--FORMULÁRIO DE LOGIN-->

				<form class="pt-3 text-white">

					<div class="form-group ">
						<center><h1><strong>Login</strong></h1></center> 
						<label for="inputLogin"><strong>E-MAIL</strong> </label>
						<input type="email" class="form-control" id="inputLogin" name="inputLogin" aria-describedby="emailHelp" placeholder="Ex: contato@gmail.com" required="required">


					</div>
					<div class="form-group">
						<label for="inputLogin"><strong>SENHA</strong></label>
						<input type="password" class="form-control" id="inputLogin" placeholder="********"  aria-describedby="emailHelp">
					</div>
					<div class="text-center">
						<button type="button" class="btn btn-outline-danger text-white mt-4"><strong>LOGAR</strong></button>
						<br>
					</form> 
					<div class="mt-4">
						Ainda não tem conta?
						<a href="#paracadastro" style="color: black; margin-left: 3px;">Cadastre-se</a>
					</div>
				</div>
			</div>
		</div>

	 <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>




