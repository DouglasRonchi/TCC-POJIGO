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
    <title>Parada...</title>
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
                    <div id="showtm" class="display-4 text-center text-white mb-2">Contador</div>
                    <button type="submit" name="btnFimParada<?=(isset($_GET['n']))?'1':'2';?>" class="btn btn-dark btn-block p-3 font-weight-bold">Fim
                        Parada
                    </button>
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
    //Cronometro
    // Here set the minutes, seconds, and tenths-of-second when you want the chronometer to stop
    // If all these values are set to 0, the chronometer not stop automatically
    var stmints = 0;
    var stseconds = 0;
    var stzecsec = 0;

    // function to be executed when the chronometer stops
    // function toAutoStop() {
    //  alert('You stopped the chronometer');
    // }

    // the initial tenths-of-second, seconds, and minutes
    var zecsec = 0;
    var seconds = 0;
    var mints = 0;
    var hours = 0;

    var startchron = 0;

    function chronometer() {
        if (startchron === 1) {
            zecsec += 1; // set tenths of a second

            // set seconds
            if (zecsec > 9) {
                zecsec = 0;
                seconds += 1;
            }

            // set minutes
            if (seconds > 59) {
                seconds = 0;
                mints += 1;
            }

            if (mints > 59) {
                mints = 0;
                hours += 1;
            }

            // adds data in #showtm
            document.getElementById('showtm').innerHTML = hours + ' : ' + mints + ' : ' + seconds + '<sub>' + zecsec + '</sub>';
            // if the chronometer reaches to the values for stop, calls whenChrStop(), else, auto-calls chronometer()
            setTimeout("chronometer()", 100);
        }
    }

    function startChr() {
        startchron = 1;
        chronometer();
    } // starts the chronometer

    startChr();


</script>

</body>
</html>