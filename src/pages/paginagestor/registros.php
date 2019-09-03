<?php
require_once '../../classes/Autoload.class.php';
$conn = new Site;
?>
<!DOCTYPE html>
<html lang="en">
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #333;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

    .largura10 {
        width: 10%;
    }

    .largura02 {
        width: 0.4%;
    }

    tr.subtitles th {
        text-align: center;
    }

</style>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Pojigo - Registros</title>

    <!-- Custom fonts for this template-->
    <link href="../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../../css/sb-admin-2.min.css" rel="stylesheet">

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
                <h1 class="h3 mb-4 text-gray-800">
                    Registros
                </h1>

                <form action="" method="get" class="form-inline">
                    <div class="form-group mr-2">
                        <label for="cad">Cadastro:</label>
                        <input type="number" class="form-control ml-2" name="cad" id="cad"
                               value="<?= (isset($_GET['cad'])) ? $_GET['cad'] : ''; ?>">
                    </div>
                    <div class="form-group mr-2">
                        <label for="dtini">Data Inicial:</label>
                        <input type="date" class="form-control ml-2" name="dtini" id="dtini"
                               value="<?= (isset($_GET['dtini'])) ? $_GET['dtini'] : ''; ?>">
                    </div>
                    <div class="form-group mr-2">
                        <label for="dtfin">Data Final:</label>
                        <input type="date" class="form-control ml-2" name="dtfin" id="dtfin"
                               value="<?= (isset($_GET['dtfin'])) ? $_GET['dtfin'] : ''; ?>">
                    </div>
                    <button type="sumbit" class="btn btn-primary">Procurar</button>
                    <a href="registros.php" class="btn btn-secondary ml-2">Limpar</a>
                </form>

                <?php if (isset($_GET['cad']) && isset($_GET['dtini']) && isset($_GET['dtfin']) && $_GET['cad'] != '' && $_GET['dtini'] != '' && $_GET['dtfin'] != ''): ?>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 mt-3">
                        <div class="card-header py-3">
                            <?php setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese'); ?>
                            <h6 class="m-0 font-weight-bold text-primary">Mostrando resultados do
                                cadastro <?= $_GET['cad'] ?> desde <?= strftime("%x", strtotime($_GET['dtini'])) ?>
                                até <?= strftime("%x", strtotime($_GET['dtfin'])) ?>.</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Inicio de Jornada</th>
                                        <th>Inicio de Intervalo</th>
                                        <th>Fim de Intervalo</th>
                                        <th>Inicio de Parada 1</th>
                                        <th>Fim de Parada 1</th>
                                        <th>Inicio de Parada 2</th>
                                        <th>Fim de Parada 2</th>
                                        <th>Fim de Jornada</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Inicio de Jornada</th>
                                        <th>Inicio de Intervalo</th>
                                        <th>Fim de Intervalo</th>
                                        <th>Inicio de Parada 1</th>
                                        <th>Fim de Parada 1</th>
                                        <th>Inicio de Parada 2</th>
                                        <th>Fim de Parada 2</th>
                                        <th>Fim de Jornada</th>
                                        <th></th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $selectRegistros = $conn->executeQuery("SELECT * FROM registro_ponto rp JOIN usuario us ON rp.fk_usuario = us.usuario_id WHERE us.cadastro = {$_GET['cad']} AND hora_inicio BETWEEN '{$_GET['dtini']}' AND '{$_GET['dtfin']}'");
                                    $rows = mysqli_num_rows($selectRegistros);
                                    while ($rows = mysqli_fetch_assoc($selectRegistros)):
                                        ?>
                                        <tr>
                                            <td><?= $rows['hora_inicio'] ?></td>
                                            <td><?= $rows['hora_inicio_intervalo'] ?></td>
                                            <td><?= $rows['hora_fim_intervalo'] ?></td>
                                            <td><?= $rows['inicio_parada_um'] ?></td>
                                            <td><?= $rows['fim_parada_um'] ?></td>
                                            <td><?= $rows['inicio_parada_dois'] ?></td>
                                            <td><?= $rows['fim_parada_dois'] ?></td>
                                            <td><?= $rows['hora_fim'] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-outline-primary">Editar</button>
                                            </td>
                                        </tr>

                                    <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary" data-toggle="modal" data-target=".bd-modal-ponto">Gerar Relatório
                    </button>
                <?php else: ?>
                    <div class="mt-3">
                        Selecione um cadastro, uma data inicial e uma data final para visualisar os registros...
                    </div>
                <?php endif; ?>
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

<script>
    function imprimirDiv(div) {
        var impressao = document.getElementById(div).innerHTML;
        var original = document.body.innerHTML;

        document.body.innerHTML = impressao;

        window.print();

        document.body.innerHTML = original;
        location.reload();
    }
</script>





<!-- Modal de Registro de Pontos -->
<div class="modal fade bd-modal-ponto" tabindex="-1" role="dialog" aria-labelledby="pontoLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="conteudo m-3">
                        <button type="button" title="Fechar" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="text-center">
                            <h3>Relatório de Horas</h3>
                        </div>
                        <button class="btn btn-info" title="Imprimir" onclick="imprimirDiv('printableArea')"><i
                                    class="fas fa-print"></i></button>

                        <?php
                        $selectRegistrosModal = $conn->executeQuery("SELECT * FROM usuario WHERE cadastro = {$_GET['cad']}");
                        $row = mysqli_num_rows($selectRegistrosModal);
                        while ($row = mysqli_fetch_assoc($selectRegistrosModal)):
                            ?>
                            <div id="printableArea" class="mt-3">
                                <table>
                                    <tr>
                                        <th class="largura10 text-center" colspan="4">Dados do Colaborador</th>
                                    </tr>
                                    <tr>
                                        <th class="largura10">Nome:</th>
                                        <td><?= utf8_encode($row['nome']) ?></td>
                                        <th class="largura10">CPF:</th>
                                        <td><?= utf8_encode($row['cpf']) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Cadastro:</th>
                                        <td><?= utf8_encode($row['cadastro']) ?></td>
                                        <th>RG:</th>
                                        <td><?= utf8_encode($row['rg']) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Cidade:</th>
                                        <td><?= utf8_encode($row['cidade']) ?></td>
                                        <th>Bairro:</th>
                                        <td><?= utf8_encode($row['bairro']) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Cargo:</th>
                                        <td><?= utf8_encode($row['tipo_usuario']) ?></td>
                                        <th>Obs:</th>
                                        <td></td>
                                    </tr>
                                </table>
                                <table class="mt-1">
                                    <tr>
                                        <th class="largura10 text-center" colspan="8">Registros</th>
                                    </tr>
                                    <tr class="subtitles">
                                        <th colspan="2">Dia</th>
                                        <th>Entrada</th>
                                        <th>Inicio Intervalo</th>
                                        <th>Retorno Intervalo</th>
                                        <th>Saída</th>
                                        <th>Total Horas</th>
                                        <th>Horas Extras</th>
                                    </tr>

                                    <?php
                                    $horas_totais_mensais = 0;
                                    $selectRegistrosUnicos = $conn->executeQuery("SELECT * FROM registro_ponto rp JOIN usuario us ON rp.fk_usuario = us.usuario_id WHERE us.cadastro = {$_GET['cad']} AND rp.hora_inicio BETWEEN '{$_GET['dtini']}' AND '{$_GET['dtfin']}' ORDER BY rp.hora_inicio");
                                    $rowHoras = mysqli_num_rows($selectRegistrosUnicos);
                                    while ($rowHoras = mysqli_fetch_assoc($selectRegistrosUnicos)):
                                        ?>


                                        <tr class="subtitles">
                                            <th class="largura02">
                                                <?php
                                                setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                                                echo ucfirst(utf8_encode(strftime("%A", strtotime($rowHoras['hora_inicio'])))) ?>
                                            </th>
                                            <th class="largura02">
                                                <?php
                                                echo strftime("%d", strtotime($rowHoras['hora_inicio'])) ?>
                                            </th>
                                            <th><?= strftime("%R", strtotime($rowHoras['hora_inicio'])) ?></th>
                                            <th><?= strftime("%R", strtotime($rowHoras['hora_inicio_intervalo'])) ?></th>
                                            <th><?= strftime("%R", strtotime($rowHoras['hora_fim_intervalo'])) ?></th>
                                            <th><?= strftime("%R", strtotime($rowHoras['hora_fim'])) ?></th>
                                            <th>
                                                <?php
                                                //Pega as horas e transforma em segundos
                                                $inicio_jornada = strtotime($rowHoras['hora_inicio']);
                                                $inicio_intervalo = strtotime($rowHoras['hora_inicio_intervalo']);
                                                $fim_intervalo = strtotime($rowHoras['hora_fim_intervalo']);
                                                $fim_jornada = strtotime($rowHoras['hora_fim']);
                                                //Testa se virar o dia na viagem calcula da mesma forma as Horas
                                                if ($fim_jornada < $inicio_jornada) {
                                                    //Se vira o dia acrescenta mais 24 horas para realizar o cálculo
                                                    $fim_jornada = $fim_jornada + 86400;
                                                } else {
                                                    //nada...
                                                }
                                                //Pega as horas trabalhadas e desconta o intervalo
                                                $intervalo = $fim_intervalo - $inicio_intervalo;
                                                $horas_trabalhadas = ($fim_jornada - $inicio_jornada) - $intervalo;
                                                //verifica as horas extras
                                                if ($horas_trabalhadas > 28800) {
                                                    $horasExtras = $horas_trabalhadas - 28800;
                                                }
                                                //setando as horas totais do período
                                                $horas_mensais += ($horas_trabalhadas + $horasExtras);
                                                $horaTot = sprintf("%02s", floor($horas_mensais / (60 * 60)));
                                                $horas_mensais = ($horas_mensais % (60 * 60));
                                                $minutoTot = sprintf("%02s", floor($horas_mensais / 60));
                                                $horas_mensais = ($horas_mensais % 60);
                                                $horas_totais_mensais .= $horaTot;

                                                //Arredonda para formato de Horas
                                                $hora = sprintf("%02s", floor($horas_trabalhadas / (60 * 60)));
                                                $horas_trabalhadas = ($horas_trabalhadas % (60 * 60));
                                                $minuto = sprintf("%02s", floor($horas_trabalhadas / 60));
                                                $horas_trabalhadas = ($horas_trabalhadas % 60);

                                                $horaExtra = sprintf("%02s", floor($horasExtras / (60 * 60)));
                                                $horasExtras = ($horasExtras % (60 * 60));
                                                $minutoExtra = sprintf("%02s", floor($horasExtras / 60));
                                                $horasExtras = ($horasExtras % 60);
                                                $horas_extras = $horaExtra . ":" . $minutoExtra;

                                                echo $hora . ":" . $minuto;
                                                ?>

                                            </th>
                                            <th><?= $horas_extras ?></th>
                                        </tr>

                                    <?php endwhile; ?>
                                    <tr class="subtitles">
                                        <th colspan="6"></th>
                                        <th>Horas Totais</th>
                                        <th><?= $horas_totais_mensais ?></th>
                                    </tr>
                                </table>
                                <br>
                                <div class="text-center">
                                    ______________________<br>
                                    Assinatura
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <button type="button" title="Fechar" class="btn btn-secondary" data-dismiss="modal">Fechar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Logout Modal-->
    <?php include '../menu/logoutmodal.php'; ?>

</body>

</html>
