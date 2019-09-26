<?php
require_once '../../classes/Autoload.class.php';
// Cria a conexão:
$conn = new Site;
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
    <title>Viajando...</title>
</head>
<body onload="pegarHoras()" class="bg-gradient-primary">

<div class="container-fluid">

    <header class="row">
        <div class="col-4 p-0">
            <img class="p-2 mt-2 d-block" src="../../../img/logoc.png">
        </div>
        <div class="col-8 text-center pt-3">
            <div id="hora" class="text-white"></div>
            <div id="informacoes" class="text-white"></div>
            <div class="text-white">Tenha uma ótima viagem!</div>
        </div>
    </header>

    <div class="row">
        <div class="col-12 mx-auto d-block shadow-lg mt-4">
            <div class="btn-group mx-auto d-block p-5" role="group"
                 aria-label="Button group with nested dropdown">
                <form action="../../controllers/mobileController.php" method="post">
                    <button type="submit" name="btnInicioIntervalo" class="btn btn-dark btn-block p-3 font-weight-bold">
                        Início Intervalo
                    </button>

                    <div class="btn-group-vertical mx-auto d-block" role="group">
                        <button id="btnDropMotivo" type="button" class="btn btn-dark dropdown-toggle p-3"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Relatar Problema
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnDropMotivo">
                            <?php
                            $selectMotivos = $conn->executeQuery("SELECT * FROM motivos_atrasos");
                            $Rows = mysqli_num_rows($selectMotivos);
                            while ($Rows = mysqli_fetch_assoc($selectMotivos)):
                                ?>
                                <a class="dropdown-item"
                                   href="../../controllers/mobileController.php?motivo=<?= $Rows['id'] ?>"><?= utf8_encode($Rows['nome_motivo']) ?></a>
                            <?php endwhile; ?>
                        </div>
                    </div>
                    <button type="submit" name="btnFimViagem" class="btn btn-danger btn-block p-3 font-weight-bold"
                            onclick="confirm('Tem certeza que deseja finalizar sua viagem?')">Fim de Viagem
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

<script type="text/javascript">
    function localizador() {
        navigator.geolocation.getCurrentPosition(function (posicao) {
            var url = "https://nominatim.openstreetmap.org/reverse?lat=" + posicao.coords.latitude + "&lon=" + posicao.coords.longitude + "&format=json&json_callback=preencherDados";

            var script = document.createElement('script');
            script.src = url;
            document.body.appendChild(script);
        });
        setTimeout(localizador, 300000);
    }


    function preencherDados(dados) {
        var cidade = document.getElementById('informacoes');

        cidade.innerHTML = dados.address.city + "<br>";
        if (dados.address.road === 'undefined') {
            cidade.innerHTML += dados.address.road + "<br>";
        }
        cidade.innerHTML += dados.address.suburb + "<br>";
        cidade.innerHTML += dados.address.state + "<br>";
        // cidade.innerHTML += dados.lat + "<br>";
        // cidade.innerHTML += dados.lon + "<br>";
    }

    localizador();

</script>

<!--Manda Latitude e Longitude para o Banco de dados-->
<script type="text/javascript">

    $(document).ready(function coordenadasBD() {
        var options = {
            enableHighAccuracy: true,
            maximumAge        : 1000,
            timeout           : 1000
        };

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(onSuccess, onError, options);
        } else {
            console.log("Geolocation is not supported by this browser.");
        }

        setTimeout(coordenadasBD, 10000);

        function onSuccess(position) {
            console.log(position.coords.latitude);
            console.log(position.coords.longitude);

            let lat = position.coords.latitude;
            let lon = position.coords.longitude;

            $.ajax({
                url: 'coordenadasAjax.php',
                type: 'POST',
                data: {lat: lat, lon: lon, codViagem: <?=$_GET['codViagem']?>},
                success: function (data) {
                    console.log(data);
                },
                error: function (data) {

                },
                beforeSend: function () {

                }

            }).done(function () {

            });

        }

        function onError(err) {
            console.log(err);
        }

    });


</script>


</body>
</html>