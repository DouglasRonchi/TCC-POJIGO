<?php
require_once '../../classes/Autoload.class.php';
// Cria a conexão:
$conn = new Site;

?>
<!DOCTYPE html>
<html lang="en">

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
                <h1 class="h3 mb-4 text-gray-800">Rastreamentos</h1>

                <div style="height: 400px; background: green">A</div>


                <!-- DataTales Rastreamento -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Frota</th>
                                    <th>Placa</th>
                                    <th>Última Posição</th>
                                    <th>Motorista</th>
                                    <th>Info</th>
                                    <th>Visualizar</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Frota</th>
                                    <th>Placa</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Motorista</th>
                                    <th>Visualizar</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php
                                $selectRastrear = $conn->executeQuery("SELECT vei.frota, vei.placa, coo.hora, coo.latitude, coo.longitude, usu.nome FROM registro_ponto rp JOIN coordenadas coo ON rp.cod_viagem = coo.fk_cod_viagem JOIN usuario usu ON usu.usuario_id = rp.fk_usuario JOIN veiculos vei ON rp.fk_veiculo = vei.id GROUP BY vei.frota ORDER BY coo.hora DESC");
                                $row = mysqli_num_rows($selectRastrear);
                                while ($row = mysqli_fetch_assoc($selectRastrear)):
                                    ?>
                                    <tr>
                                        <td><?= $row["frota"] ?></td>
                                        <td><?= $row["placa"] ?></td>
                                        <td><?= $row["latitude"] ?></td>
                                        <td><?= $row["longitude"] ?></td>
                                        <td><?= $row["nome"] ?></td>
                                        <td>
                                            <form action="" method="post">
                                                <div class="btn-group btn-block">
                                                    <button class="btn btn-sm btn-primary" name="btnEditar">Editar</button>
                                                </div>

                                            </form>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
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

<?php include_once '../../include/configdatatable.php'?>

</body>

</html>
