<?php
require_once '../../classes/Autoload.class.php';
$conn = New Site;
$usuario = New Usuario;
$login = new Login;
$mobile = New Mobile;
$diaria = New Diarias;
$login->VerificarLogin();

if ($_SESSION['previlegio'] == 3 && !isset($_SESSION['motoristalogado'])) {
    $_SESSION['motoristalogado'] = true;
    $mobile->startRegistro();
}
if (isset($_GET['fim']) && $_GET['fim'] == true) {
    $query = $conn->executeQuery("SELECT * FROM registro_ponto WHERE id = {$_SESSION['id_rota']}");
    $diaria->pagarDiaria($query);
    session_destroy();
    header('Location: ../../../login.php');
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Custom fonts for this template-->
    <link href="../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../../../css/sb-admin-2.min.css" rel="stylesheet">
    <title>Início</title>
</head>
<body class="bg-gradient-primary">


<div class="container-fluid">

    <header class="row">
        <div class="col-12">
            <img class="p-2 mx-auto d-block" src="../../../img/logoc.png">
        </div>
    </header>
    <div class="row mt-4">
        <?php
        if (isset($_SESSION['erro'])): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                Não pode iniciar viagem sem Rota E/OU Frota!
            </div>
        <?php
        endif;
        unset($_SESSION["erro"]);
        ?>

        <div class="col-12 mx-auto d-block shadow-lg">
            <div class="text-light text-center mt-4">
                <h2>Bem vindo!</h2>
                <h6><?= $_SESSION['nome'] ?></h6>
                <h6><?= $_SESSION['cadastro'] ?></h6>
            </div>
            <div class="btn-group-vertical mx-auto d-block p-4" role="group"
                 aria-label="Button group with nested dropdown">
                <a href="rotas.php" class="btn btn-dark p-3 font-weight-bold">Rota</a>
                <a href="frota.php" class="btn btn-dark p-3 font-weight-bold">Frota</a>
                <form action="../../controllers/mobileController.php" method="post">
                    <button type="submit" name="btnInicioViagem" class="btn btn-success btn-block p-3 font-weight-bold">
                        Começar
                    </button>
                </form>
            </div>
            <form action="../../controllers/mobileController.php" method="post">
                <div class="text-center">
                    <button class="btn-sm btn-danger"
                            onclick="return confirm('Tem certeza que deseja sair? Isto apagará todo seu registro até agora!')"
                            name="logoutMobile">sair
                    </button>
                </div>
            </form>

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