<?php

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Custom fonts for this template-->
    <link href="../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../../../css/sb-admin-2.min.css" rel="stylesheet">
    <title>Intervalo...</title>
</head>
<body onload="pegarHoras()" class="bg-gradient-primary">

<div class="container-fluid">

    <header class="row">
        <div class="col-4 p-0">
            <img class="p-2 mt-2 d-block" src="../../../img/logoc.png">
        </div>
        <div class="col-8 text-center pt-3">
            <div id="hora" class="text-white"></div>
            <div class="text-white">Seu destino está á 523km</div>
            <div class="text-white">Clima no destino: Chuvoso!</div>
            <div class="text-white">Tenha uma ótima viagem!</div>
        </div>
    </header>

    <div class="row">
        <div class="col-12 mx-auto d-block shadow-lg mt-4">
            <div class="btn-group-vertical mx-auto d-block p-5" role="group"
                 aria-label="Button group with nested dropdown">
                <form action="../../controllers/mobileController.php" method="post">
                    <div class="display-4 text-center text-white mb-2">Contador</div>
                    <button type="submit" name="btnFimIntervalo" class="btn btn-dark btn-block p-3 font-weight-bold">Fim
                        Intervalo
                    </button>
                    <div class="btn-group" role="group">
                        <div class="dropdown-menu pr-4 pl-4 ml-3 bg-dark" aria-labelledby="btnGroupDrop1">
                            <a class="dropdown-item p-3 bg-dark text-light text-center font-weight-bold" href="#">Acidente</a>
                            <a class="dropdown-item p-3 bg-dark text-light text-center font-weight-bold" href="#">Trânsito
                                Parado</a>
                        </div>
                    </div>
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
</body>
</html>