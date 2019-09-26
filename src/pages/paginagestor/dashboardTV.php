<?php
require_once '../../classes/Autoload.class.php';
$conn = new Site;
$login = new Login;
$login->VerificarLogin();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pojigo - Início</title>

    <!-- Custom fonts for this template-->
    <link href="../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../../css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        i:hover {
            color: #4e73df !important;
        }
        #dataehora{
            font-size: 30px;
        }
    </style>
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">


            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="text-center mt-3 font-weight-light" id="dataehora"></div>
                <!-- Page Heading -->
                <div class="row mt-3">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Km's
                                            Rodados (Mensal)
                                        </div>
                                        <?php
                                        $result = mysqli_fetch_assoc($conn->executeQuery("SELECT SUM(quilometragem) AS total FROM registro_ponto WHERE MONTH(hora_inicio) = (SELECT MONTH(hora_inicio) FROM registro_ponto ORDER BY MONTH(hora_inicio) DESC LIMIT 1) ORDER BY MONTH(hora_inicio) DESC"));
                                        ?>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$result['total']." Km"?></div>

                                    </div>
                                    <div class="col-auto">
                                        <i class="fa fa-truck fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Viagens
                                            Realizadas (Mensal)
                                        </div>
                                        <input type="hidden" id="mesAtual" value="">


                                        <?php
                                        $result = mysqli_fetch_assoc($conn->executeQuery("SELECT COUNT(*) AS total FROM registro_ponto"));
                                        ?>

                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $result['total'] ?></div>

                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Veículos em
                                            Viagem
                                        </div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <?php
                                                $result = mysqli_fetch_assoc($conn->executeQuery("SELECT COUNT(*) AS fimviagem FROM registro_ponto WHERE hora_fim = 0"));
                                                ?>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $result['fimviagem'] ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa fa-map-pin fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Requests Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-danger shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Mensagens
                                            de Alerta
                                        </div>
                                        <?php
                                        $result = mysqli_fetch_assoc($conn->executeQuery("SELECT COUNT(*) AS msgalerta FROM registro_ponto WHERE fk_motivo_parada_um <> 0 AND hora_fim = 0"));
                                        ?>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $result['msgalerta'] ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>
                <div class="row">
                    <!-- Area Chart -->
                    <div class="col-xl-12 col-lg-12 mx-auto">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <div class="mx-auto">
                                    <h6 class="m-0 font-weight-bold text-primary">Viagens em Andamento</h6>
                                </div>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                         aria-labelledby="dropdownMenuLink">
                                        <div class="dropdown-header">Relatórios:</div>
                                        <a class="dropdown-item" href="#">Viagens Realizadas</a>
                                        <a class="dropdown-item" href="#">Km's Rodados</a>
                                        <a class="dropdown-item" href="#">Horas Reais Rodados</a>
                                    </div>
                                </div>
                            </div>


                            <!-- Card Body TABLE-->
                            <div class="card-body">
                                <div class="">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th>Viagem</th>
                                                <th>Frota</th>
                                                <th>Placa</th>
                                                <th>Hora</th>
                                                <th>Última Localização</th>
                                                <th>Motorista</th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th>Viagem</th>
                                                <th>Frota</th>
                                                <th>Placa</th>
                                                <th>Hora</th>
                                                <th>Última Localização</th>
                                                <th>Motorista</th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            <?php
                                            setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                                            $selectRastrear = $conn->executeQuery("SELECT vei.frota, vei.placa, coo.hora, coo.latitude, coo.longitude, usu.nome, rp.cod_viagem, rp.hora_fim , rp.fk_motivo_parada_um , goo.road, goo.suburb, goo.city, goo.formatted_address FROM registro_ponto rp LEFT JOIN coordenadas coo ON rp.cod_viagem = coo.fk_cod_viagem LEFT JOIN usuario usu ON usu.usuario_id = rp.fk_usuario LEFT JOIN veiculos vei ON rp.fk_veiculo = vei.id LEFT JOIN dados_googleapi goo ON goo.id = coo.fk_dados_google WHERE rp.hora_fim = 0 GROUP BY rp.cod_viagem ORDER BY coo.hora DESC");
                                            $row = mysqli_num_rows($selectRastrear);
                                            while ($row = mysqli_fetch_assoc($selectRastrear)):

                                                $pillCodViagem = '';
                                                if ($row["hora_fim"] == 0 && $row["fk_motivo_parada_um"] != 0) {
                                                    $pillCodViagem = 'spinner-grow spinner-grow-sm text-danger';

                                                } elseif ($row["hora_fim"] == 0) {
                                                    $pillCodViagem = 'spinner-grow spinner-grow-sm text-warning';

                                                }

                                                ?>
                                                <tr>
                                                    <td>
                                                <span class="<?= $pillCodViagem ?>" role="status"
                                                      aria-hidden="true"></span>
                                                            <?= $row["cod_viagem"] ?>

                                                    </td>
                                                    <td>
                                                        <?= $row["frota"] ?>
                                                    </td>
                                                    <td><?= $row["placa"] ?></td>
                                                    <td><?= strftime("%x %R", strtotime($row["hora"])) ?>
                                                    </td>
                                                    <td><?php
                                                        $result = mysqli_fetch_assoc($conn->executeQuery("SELECT coo.fk_cod_viagem, coo.hora, goo.formatted_address FROM coordenadas coo JOIN dados_googleapi goo ON goo.id = coo.fk_dados_google WHERE fk_cod_viagem = {$row["cod_viagem"]} ORDER BY coo.hora DESC LIMIT 1"));
                                                        echo $result['formatted_address'];
                                                        ?></td>
                                                    <td><?= $row["nome"] ?></td>

                                                </tr>
                                            <?php
                                            endwhile;
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>


                            <!-- Card Body CHART OPTION-->
                            <!--                            <div class="card-body">-->
                            <!--                                <div class="chart-area">-->
                            <!--                                    <canvas id="myAreaChart"></canvas>-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<?php include '../menu/logoutmodal.php'; ?>

<!-- Bootstrap core JavaScript-->
<script src="../../../vendor/jquery/jquery.min.js"></script>
<script src="../../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../../../vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../../../js/sb-admin-2.min.js"></script>
<script src="../../../js/funcaoPopUp.js"></script>

<!-- Page level plugins -->
<script src="../../../vendor/chart.js/Chart.min.js"></script>

<!--FULLSCREEN-->
<script>
    function fullScreen(URL) {
        window.open(URL, '', 'fullscreen=yes, scrollbars=no');
    }
</script>

<!--DATA E HORA-->
<script>
    horasdodia();
    function horasdodia() {
        let dataehora = document.getElementById('dataehora');

        let data = new Date();
        let horas = (data.getHours()<10)?`0${data.getHours()}`:data.getHours();
        let minutos = (data.getMinutes()<10)?`0${data.getMinutes()}`:data.getMinutes();
        let segundos = (data.getSeconds()<10)?`0${data.getSeconds()}`:data.getSeconds();
        let dia = (data.getDate()<10)?`0${data.getDate()}`:data.getDate();
        let diadasemana = (data.getDay());
        let mes = (data.getMonth());
        let ano = data.getFullYear();

        switch (mes) {
            case 0:
                mes = 'janeiro';
                break;
            case 1:
                mes = 'fevereiro';
                break;
            case 2:
                mes = 'março';
                break;
            case 3:
                mes = 'abril';
                break;
            case 4:
                mes = 'maio';
                break;
            case 5:
                mes = 'junho';
                break;
            case 6:
                mes = 'julho';
                break;
            case 7:
                mes = 'agosto';
                break;
            case 8:
                mes = 'Setembro';
                break;
            case 9:
                mes = 'outubro';
                break;
            case 10:
                mes = 'novembro';
                break;
            case 11:
                mes = 'dezembro';
                break;
        }


        switch (diadasemana) {
            case 0:
                diadasemana = 'Domingo';
                break;
            case 1:
                diadasemana = 'Segunda';
                break;
            case 2:
                diadasemana = 'Terça';
                break;
            case 3:
                diadasemana = 'Quarta';
                break;
            case 4:
                diadasemana = 'Quinta';
                break;
            case 5:
                diadasemana = 'Sexta';
                break;
            case 6:
                diadasemana = 'Sábado';
                break;
        }

        doispontos = ((segundos%2)===0)?':':'&nbsp;';

        dataehora.innerHTML = `${diadasemana}, ${dia} de ${mes} de ${ano} | ${horas}${doispontos}${minutos}`;

        setTimeout(horasdodia, 1000);

    }
</script>

<!--CHART JS-->
<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    function number_format(number, decimals, dec_point, thousands_sep) {
        // *     example: number_format(1234.56, 2, ',', ' ');
        // *     return: '1 234,56'
        number = (number + '').replace(',', '').replace(' ', '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function (n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }

    // Area Chart Example
    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
            datasets: [{
                label: "Viagens",
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0.05)",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: [15, 10, 50, 45, 30, 20, 15, 25, 38, 60, 75, 20],
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                        // Include a sign in the ticks
                        callback: function (value, index, values) {
                            return '' + number_format(value);
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    label: function (tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': -> ' + number_format(tooltipItem.yLabel);
                    }
                }
            }
        }
    });
</script>

<script>
    //Recarrega a página a cada 5 minutos
    setInterval(function () {
        window.location.reload();
    }, 300000);
</script>

</body>

</html>
