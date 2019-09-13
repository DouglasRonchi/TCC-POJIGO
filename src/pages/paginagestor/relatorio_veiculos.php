<?php
require_once '../../classes/Autoload.class.php';
$conn = New Site;
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

    <title>Pojigo - Relatório de Veiculos</title>

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
                <h1 class="h3 mb-4 text-gray-800">Relatório de Veículos</h1>


                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Tabela de Veículos</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Frota</th>
                                    <th>Placa</th>
                                    <th>Marca Veículo</th>
                                    <th>Modelo Veículo</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tfoot>

                                </tfoot>
                                <tbody>
                                <?php
                                $selectVeiculo = $conn->executeQuery("SELECT * FROM veiculos");
                                $selectVeiculoRows = mysqli_num_rows($selectVeiculo);

                                while ($selectVeiculoRows = mysqli_fetch_assoc($selectVeiculo)):
                                    $selectModelo = $conn->executeQuery("SELECT modelo, fk_marca FROM modelo_veiculo WHERE id = {$selectVeiculoRows["fk_modelo"]}");
                                    $modelo = mysqli_fetch_assoc($selectModelo);

                                    $selectMarca = $conn->executeQuery("SELECT marca FROM marca_veiculo WHERE id = {$modelo['fk_marca']}");
                                    $marca = mysqli_fetch_assoc($selectMarca);
                                    ?>
                                    <tr>
                                        <td><?= $selectVeiculoRows["frota"] ?></td>
                                        <td><?= $selectVeiculoRows["placa"] ?></td>
                                        <td><?= $marca['marca'] ?></td>
                                        <td><?= $modelo['modelo'] ?></td>
                                        <td>
                                            <form action="../../controllers/veiculosController.php?id=<?=$selectVeiculoRows["id"]?>" method="post">
                                                <div class="btn-group btn-block">
                                                    <button class="btn btn-sm btn-primary" name="btnEditar">Editar</button>
                                                    <button class="btn btn-sm btn-danger" name="btnExcluir" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir
                                                    </button>
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
            <!-- /..container-fluid -->

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


</body>

</html>
