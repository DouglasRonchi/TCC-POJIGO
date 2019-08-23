<?php
require_once '../../classes/Autoload.class.php';
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
                <h1 class="h3 mb-4 text-gray-800">
                    <center>REGISTROS</center>
                </h1>
                <h1 class="h3 mb-2 text-gray-800"></h1>
                <p class="mb-4"><a target="_blank" href="https://datatables.net"></a></p>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">

                        <form class="form-inline " style="padding-left:25rem!important">
                            <h5>Nome</h5>
                            <div class="form-group mx-sm-3 mb-2">
                                <input type="text" class="form-control" id="inputPassword2" placeholder="">
                                <button type="button" class="btn btn-outline-primary ml-3">Procurar</button>
                            </div>
                        </form>
                        <h6 class="m-0 font-weight-bold text-primary"></h6>
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
                                <tbody>
                                <?php
                                $selectRegistros = $conn->executeQuery("SELECT * FROM registro_ponto WHERE fk_usuario = 20");
                                $rows = mysqli_num_rows($selectRegistros);
                                while ($rows = mysqli_fetch_assoc($selectRegistros)):
                                ?>
                                <tr>
                                    <td><?=$rows['hora_inicio']?></td>
                                    <td><?=$rows['hora_inicio_intervalo']?></td>
                                    <td><?=$rows['hora_fim_intervalo']?></td>
                                    <td><?=$rows['inicio_parada_um']?></td>
                                    <td><?=$rows['fim_parada_um']?></td>
                                    <td><?=$rows['inicio_parada_dois']?></td>
                                    <td><?=$rows['fim_parada_dois']?></td>
                                    <td><?=$rows['hora_fim']?></td>
                                    <td>
                                        <button type="button" class="btn btn-outline-primary">Visualizar</button>
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
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2019</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


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

<!-- Page level plugins -->
<script src="../../../vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../../../vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="../../../js/demo/datatables-demo.js"></script>

<?php include_once '../../include/configdatatable.php' ?>


</body>

</html>
