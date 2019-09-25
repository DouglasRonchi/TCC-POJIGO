<?php
require_once '../../classes/Autoload.class.php';
// Cria a conexão:
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

  <title>Pojigo - Relatório Rotas</title>

  <!-- Custom fonts for this template-->
  <link href="../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
  rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../../css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <!-- stylo geral -->
  <link rel="stylesheet" type="text/css" href="../../../css/estilo.css">
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
          <h1 class=" mb-4">Relatório de Rotas</h1>






          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tabela Rotas</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Rotas</th>
                      <th style="width: 10%">Editar/Excluir</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Rotas</th>
                      <th>Editar/Excluir</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    $selectNome_rota = $conn->executeQuery("SELECT * FROM rotas");
                    $selectNome_rotaRows = mysqli_num_rows($selectNome_rota);
                    while ($selectNome_rotaRows = mysqli_fetch_assoc($selectNome_rota)):
                      ?>
                      <tr>
                        <td><?= utf8_encode($selectNome_rotaRows["nome_rota"]) ?></td>

                        <td>

                          <form action="../../controllers/rotasController.php" method="post">
                            <input type="hidden" name="idRota" value="<?=$selectNome_rotaRows["id"]?>">
                            <button class="btn btn-sm btn-primary submit" type="submit"
                            name="btnEditarRota">Editar
                          </button>
                          <button class="btn btn-sm btn-danger" value="Excluir"
                          name="btnExcluirRota" type="submit"
                          onclick="return confirm('Tem certeza que deseja excluir a rota?')">
                          &times;
                        </button>
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

<?php include_once '../../include/configdatatable.php' ?>

</body>

</html>
