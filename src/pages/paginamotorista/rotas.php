<?php
require_once '../../classes/Autoload.class.php';
$conn = New Site;


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
	<title>Rotas</title>
</head>
<body class="bg-gradient-primary">


	<div class="container-fluid">
		
		<header class="row">
			<div class="col-12">
				<img class="p-2 mx-auto d-block" src="../../../img/logoc.png">
			</div>
		</header>

		<div class="row">
			<div class="col-12 mx-auto d-block shadow-lg pt-4 mt-3">
				<div class="btn-group-vertical p-5 btn-block" role="group">
                <form action="../../controllers/mobileController.php" method="post">
                    <div class="input-group mb-4">
                        <select class="custom-select" id="inputRota" name="inputRota">
                            <option selected>Rota:</option>
                            <?php
                            $selectRota = $conn->executeQuery("SELECT * FROM rotas");
                            $selectRotaRows = mysqli_num_rows($selectRota);
                            while ($selectRotaRows = mysqli_fetch_assoc($selectRota)):
                            ?>
                            <option value="<?=$selectRotaRows['id']?>"><?=$selectRotaRows['nome_rota']?></option>
                            <?php
                            endwhile;
                            ?>
                        </select>

                    </div>

					<div class="input-group mb-4">
						<select class="custom-select" id="inputOrigem" name="inputOrigem" readonly="">
							<option selected>Origem:</option>
						</select>
					
					</div>
					<div class="input-group mb-4">
						<select class="custom-select" id="inputDestino" name="inputDestino" readonly="">
							<option selected>Destino:</option>
						</select>
					</div>

					<button type="submit" name="btnRotaOk" class="btn btn-success font-weight-bold mb-5 btn-block">Ok</button>
                </form>
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

    <script>

        $(document).ready(function () {
            $('#inputRota').change(function () {
                let id = $('#inputRota').val();

                // console.log(id);

                $.ajax({
                    url: 'rotasOrigemAjax.php',
                    type: 'post',
                    data: {id: id},
                    success: function (data) {
                        $('#inputOrigem').append(data);
                    },
                    error: function (data) {

                    },
                    beforeSend: function () {
                        $('#inputOrigem').children('option').remove();
                    }

                }).done(function () {

                });

                $.ajax({
                    url: 'rotasDestinoAjax.php',
                    type: 'post',
                    data: {id: id},
                    success: function (data) {
                        $('#inputDestino').append(data);
                    },
                    error: function (data) {

                    },
                    beforeSend: function () {
                        $('#inputDestino').children('option').remove();
                    }

                }).done(function () {

                });

            });

        });

    </script>


</body>
</html>