<?php
require_once '../../classes/Autoload.class.php';
// Cria a conexão:
$conn = new Site;
$login = new Login;
$login->VerificarLogin();
if (isset($_GET['btnExcluirRota'])) {
    $conn->executeQuery("DELETE FROM registro_ponto WHERE cod_viagem = {$_GET['cdv']}");
    $conn->executeQuery("DELETE FROM coordenadas WHERE fk_cod_viagem = {$_GET['cdv']}");
    $conn->setAlerta(
        'danger',
        'Rastreamento da viagem N.' . $_GET['cdv'] . ' excluído com sucesso',
        '<img class="img-fluid" src="' . $conn->path('img/icons/success.png') . '">',
        $_SESSION['usuario_id']
    );
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pojigo - Rastreamento</title>

    <!-- Custom fonts for this template-->
    <link href="../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../../css/sb-admin-2.min.css" rel="stylesheet">

    <!--  CSS personalizado  -->
    <link href="../../../css/rastreamento.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="../../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?php include '../menu/sidebar.php'; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar Navbar -->
            <?php include '../menu/topbar.php'; ?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="mb-4 text-gray-800">Rastreamentos</h1>
                <div class="card shadow mb-4">
                    
                    <div class="card-body">
                        <div id="map"></div>
                        <h2>Informações da rota:</h2>
                        <div id="directions-panel">
                            <span class="font-weight-light">Selecione uma viagem para ver as informações...</span>
                        </div>
                        <?php
                        if (isset($_GET['cdv'])) {
                            $query = $conn->executeQuery("SELECT * FROM coordenadas WHERE fk_cod_viagem = {$_GET['cdv']} ORDER BY hora ASC");
                            $row = mysqli_fetch_assoc($query);
                            $startPosition = $row['latitude'] . "," . $row['longitude'];
                            $query = $conn->executeQuery("SELECT * FROM coordenadas WHERE fk_cod_viagem = {$_GET['cdv']} ORDER BY hora DESC");
                            $row = mysqli_fetch_assoc($query);
                            $endPosition = $row['latitude'] . "," . $row['longitude'];
                            $wayp = array();
                            $query = $conn->executeQuery("SELECT * FROM coordenadas WHERE fk_cod_viagem = {$_GET['cdv']}");
                            $queryMediaTotal = $conn->executeQuery("SELECT * FROM coordenadas WHERE fk_cod_viagem = {$_GET['cdv']}");
                            $rows = mysqli_num_rows($queryMediaTotal);
                            if ($rows < 23) {
                                $queryMediaMenor = $conn->executeQuery("SELECT COUNT(*)/{$rows} AS media FROM coordenadas WHERE fk_cod_viagem = {$_GET['cdv']}");
                                $result = mysqli_fetch_assoc($queryMediaMenor);
                                $row = mysqli_fetch_all($query);
                                $i = 1;
                                while ($i < $rows - 1) {
                                    $i += 1;
                                    array_push($wayp, $row[$i][3] . "," . $row[$i][4]);
                                }
                            } else {
                                $queryMedia = $conn->executeQuery("SELECT COUNT(*)/23 AS media FROM coordenadas WHERE fk_cod_viagem = {$_GET['cdv']}");
                                $result = mysqli_fetch_assoc($queryMedia);
                                $row = mysqli_fetch_all($query);
                                $i = 1;
                                while ($i < $rows - 1) {
                                    $i += 1;
                                    if ($i % ceil($result['media']) == 0) {
                                        array_push($wayp, $row[$i][3] . "," . $row[$i][4]);
                                    }
                                }
                            }
                            $jsonwayp = json_encode($wayp);
                        }
                        ?>
                        <div id="infos" data-start="<?= $startPosition ?>" data-end="<?= $endPosition ?>"
                             data-wayp='<?= $jsonwayp ?>'></div>
                    </div>
                </div>

                <!-- DataTales Rastreamento -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 text-center">
                        <form action="" method="get">
                            <div class="btn-group">
                                <label class="btn btn-secondary pb-1 p-2 disabled">
                                    Filtros
                                </label>
                                <label class="btn btn-primary pb-1 p-2">
                                    <input type="checkbox" name="TRIPfinalizadas" id="TRIPfinalizadas"
                                           value="1" <?= (isset($_GET['TRIPfinalizadas'])) ? 'checked' : ''; ?>>Viagens
                                    Finalizadas
                                </label>
                                <label class="btn btn-primary pb-1 p-2">
                                    <input type="checkbox" name="TRIPandamento" id="TRIPandamento"
                                           value="1" <?= (isset($_GET['TRIPandamento'])) ? 'checked' : ''; ?>>Viagens em
                                    Andamento
                                </label>
                                <label class="btn btn-primary pb-1 p-2">
                                    <input type="checkbox" name="TRIPproblema" id="TRIPproblema"
                                           value="1" <?= (isset($_GET['TRIPproblema'])) ? 'checked' : ''; ?>>Viagens com
                                    Problema
                                </label>
                                <label class="btn btn-primary p-0 pt-1 pr-1">
                                    <button type="submit" class="btn btn-dark btn-sm" name="TRIPfiltrar"
                                            id="TRIPfiltrar">Filtrar
                                    </button>
                                </label>
                            </div>
                        </form>
                        <div>
                            Legenda: <br>
                            <i class="fa fa-circle text-success" aria-hidden="true"></i><small> Viagem
                                Finalizada</small><br>
                            <span class="spinner-grow spinner-grow-sm text-warning" role="status" aria-hidden="true"></span><small>
                                Viagem em Andamento</small><br>
                            <span class="spinner-grow spinner-grow-sm text-danger" role="status"
                                  aria-hidden="true"></span><small>
                                Viagem com Problema</small><br>
                        </div>
                    </div>

                    <div class="card-body">
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
                                    <th>Visualizar</th>
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
                                    <th>Visualizar</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php
                                setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                                $selectRastrear = $conn->executeQuery("SELECT vei.frota, vei.placa, coo.hora, coo.latitude, coo.longitude, usu.nome, rp.cod_viagem, rp.hora_fim , rp.fk_motivo_parada_um , goo.road, goo.suburb, goo.city, goo.formatted_address FROM registro_ponto rp LEFT JOIN coordenadas coo ON rp.cod_viagem = coo.fk_cod_viagem LEFT JOIN usuario usu ON usu.usuario_id = rp.fk_usuario LEFT JOIN veiculos vei ON rp.fk_veiculo = vei.id LEFT JOIN dados_googleapi goo ON goo.id = coo.fk_dados_google GROUP BY rp.cod_viagem ORDER BY coo.hora DESC");
                                $row = mysqli_num_rows($selectRastrear);
                                while ($row = mysqli_fetch_assoc($selectRastrear)):
                                    $pillCodViagem = '';
                                    if ($row["hora_fim"] == 0 && $row["fk_motivo_parada_um"] != 0) {
                                        $pillCodViagem = 'spinner-grow spinner-grow-sm text-danger';
                                        if (isset($_GET['TRIPfiltrar']) && !isset($_GET['TRIPproblema'])) {
                                            continue;
                                        }
                                    } elseif ($row["hora_fim"] == 0) {
                                        $pillCodViagem = 'spinner-grow spinner-grow-sm text-warning';
                                        if (isset($_GET['TRIPfiltrar']) && !isset($_GET['TRIPandamento'])) {
                                            continue;
                                        }
                                    } else {
                                        $pillCodViagem = 'fa fa-circle text-success';
                                        if (isset($_GET['TRIPfiltrar']) && !isset($_GET['TRIPfinalizadas'])) {
                                            continue;
                                        }
                                    }
                                    ?>
                                    <tr>
                                        <td><small>
                                                <span class="<?= $pillCodViagem ?>" role="status"
                                                      aria-hidden="true"></span>
                                                <?= $row["cod_viagem"] ?>
                                            </small>
                                        </td>
                                        <td>
                                            <button class="btn infoveiculo modalVeiculo"
                                                    data-frota="<?= $row["frota"] ?>">
                                                <i class="fa fa-truck" aria-hidden="true"></i>
                                            </button>
                                            <small><?= $row["frota"] ?></small>
                                        </td>
                                        <td><small><?= $row["placa"] ?></small></td>
                                        <td><small><?= strftime("%x %R", strtotime($row["hora"])) ?></small></td>
                                        <td><small><?php
                                                $result = mysqli_fetch_assoc($conn->executeQuery("SELECT coo.fk_cod_viagem, coo.hora, goo.formatted_address FROM coordenadas coo LEFT JOIN dados_googleapi goo ON goo.id = coo.fk_dados_google WHERE fk_cod_viagem = {$row["cod_viagem"]} ORDER BY coo.hora DESC LIMIT 1"));
                                                echo $result['formatted_address'];
                                                ?></small></td>
                                        <td><small><?= utf8_encode($row["nome"]) ?></small></td>
                                        <td>
                                            <div class="btn-group btn-block">
                                                <form action="" method="get">
                                                    <input type="hidden" name="cdv" value="<?= $row["cod_viagem"] ?>">
                                                    <button class="btn btn-sm btn-primary submit" type="submit"
                                                            name="btnVisualizar">Ver no Mapa
                                                    </button>
                                                    <button class="btn btn-sm btn-danger" value="Excluir"
                                                            name="btnExcluirRota" type="submit"
                                                            onclick="return confirm('Tem certeza que deseja excluir a viagem?')">
                                                        &times;
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                endwhile;
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <?php include '../menu/footer.php'; ?>
        <!-- End of Footer -->

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

<!-- Page level plugins -->
<script src="../../../vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../../../vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="../../../js/demo/datatables-demo.js"></script>

<?php include_once '../../include/configdatatable.php' ?>

<!-- Script Routes-->
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbqJXX7fEFddatn-vaBp3BtBS-4TJNIbg&callback=initMap">
</script>

<script>
    function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 6,
            center: {lat: -26.89, lng: -49.08}
        });
        directionsDisplay.setMap(map);
        calculateAndDisplayRoute(directionsService, directionsDisplay);
    }
    function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        var infos = document.querySelector('#infos');
        // console.log(infos.dataset.start); //inicio
        // console.log(infos.dataset.end); //final
        // console.log(infos.dataset.wayp); //waypoints
        var waypts = [];
        var ObjWaypts = JSON.parse(infos.dataset.wayp);
        for (var item in ObjWaypts) {
            ObjWaypts.hasOwnProperty(item);
            {
                waypts.push({
                    location: ObjWaypts[item],
                    stopover: true
                });
            }
        }
        console.log(infos.dataset.start);
        console.log(infos.dataset.end);
        console.log(waypts);

        directionsService.route({
            origin: infos.dataset.start, //Primeira Coordenada
            destination: infos.dataset.end, //Última Coordenada
            waypoints: waypts, //restante delas
            optimizeWaypoints: true,
            travelMode: 'DRIVING'
        }, function (response, status) {
            if (status === 'OK') {
                directionsDisplay.setDirections(response);
                var route = response.routes[0];
                // console.log(parseFloat(response.routes[0].legs[0].distance.text));
                var summaryPanel = document.getElementById('directions-panel');
                summaryPanel.innerHTML = '';
                // For each route, display summary information.
                var total = 0;
                for (var i = 0; i < route.legs.length; i++) {
                    var routeSegment = i + 1;
                    summaryPanel.innerHTML += '<b>Ponto de Checagem: ' + routeSegment +
                        '</b><br>';
                    summaryPanel.innerHTML += route.legs[i].start_address + ' para ';
                    summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
                    summaryPanel.innerHTML += route.legs[i].distance.text + '<br><br>';
                    var str = route.legs[i].distance.text;
                    // console.log(str);
                    var n = str.indexOf("km");
                    if (n === -1) {
                        //Metros
                        total += parseFloat(route.legs[i].distance.text) / 1000;
                        // console.log("metros");
                    } else {
                        //Kms
                        total += parseFloat(route.legs[i].distance.text);
                        // console.log("Kms");
                    }
                }
                total = parseFloat(total.toFixed(2));
                summaryPanel.innerHTML += "Distância Total da Viagem: " + total + " Km";
            } else {
                // window.alert('Directions request failed due to ' + status);
            }
        });
    }
</script>
<script>
    $(".modalVeiculo").click(function () {
        var dataFrota = $(this).attr("data-frota");
        var dados = {
            frota: dataFrota
        };
        $.post("carregarveiculoAjax.php", dados, function (retorna) {
            //Carregar o conteúdo para o usuário
            $("#visul_veiculo").html(retorna); //BodyModal
            $("#modalinfoveiculo").modal('show');
        })
    });
</script>

<!-- Modal -->
<div class="modal fade" id="modalinfoveiculo" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Informações do Veículo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span id="visul_veiculo"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<script>
    //Recarrega a página a cada 5 minutos
    setInterval(function () {
        window.location.reload();
    }, 300000);
</script>

</body>

</html>