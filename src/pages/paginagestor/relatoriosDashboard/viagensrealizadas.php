<?php
require_once '../../../classes/Autoload.class.php';

$conn = new Site;
$login = new Login;
?>
<!doctype html>
<html lang="en">
<head>
    <title>Relatório</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="../../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- stylo geral -->
    <link rel="stylesheet" type="text/css" href="../../../../css/estilo.css">
    <!-- Custom styles for this template-->
    <link href="../../../../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../../../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>

<div>
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="row">
                <div class="col-md-12">
                    <div id="printableArea" class="conteudo m-3">
                        <div class="text-center">
                            <h3>Relatório de Viagens</h3>
                        </div>
                        <button class="btn btn-info" title="Imprimir" onclick="imprimirDiv('printableArea')"><i
                                class="fas fa-print"></i></button>
                        <div class="mt-3">
                            <table class="table">
                                <tr>
                                    <th>Viagem</th>
                                    <th>Rota</th>
                                    <th>Motorista</th>
                                    <th>Frota</th>
                                    <th>Hora Inicial</th>
                                    <th>Hora Final</th>
                                </tr>
                                <?php
                                $query = $conn->executeQuery("SELECT rp.*,rt.nome_rota,usu.nome, vei.frota FROM registro_ponto rp LEFT JOIN rotas rt ON rp.fk_rota = rt.id LEFT JOIN usuario usu ON usu.usuario_id = rp.fk_usuario LEFT JOIN veiculos vei ON vei.id = rp.fk_veiculo GROUP BY rp.cod_viagem");
                                $rows = mysqli_num_rows($query);
                                while ($rows = mysqli_fetch_assoc($query)):
                                    ?>
                                <tr>
                                    <td><?= $rows['cod_viagem'] ?></td>
                                    <td><?= $rows['nome_rota'] ?></td>
                                    <td><?= $rows['nome'] ?></td>
                                    <td><?= $rows['frota'] ?></td>
                                    <td><?= $rows['hora_inicio'] ?></td>
                                    <td><?= $rows['hora_fim'] ?></td>
                                </tr>
                                <?php
                                endwhile;
                                ?>
                            </table>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="../../../../chosen/docsupport/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="../../../../chosen/chosen.jquery.js" type="text/javascript"></script>
<script src="../../../../chosen/docsupport/init.js" type="text/javascript" charset="utf-8"></script>

<!-- Logout Modal-->
<?php include '../../menu/logoutmodal.php'; ?>
<!-- Bootstrap core JavaScript-->
<script src="../../../../vendor/jquery/jquery.min.js"></script>
<script src="../../../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="../../../../vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="../../../../js/sb-admin-2.min.js"></script>
<!-- Page level plugins -->
<script src="../../../../vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../../../../vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Page level custom scripts -->
<script src="../../../../js/demo/datatables-demo.js"></script>

<?php include_once '../../../include/configdatatable.php' ?>

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

</body>
</html>
