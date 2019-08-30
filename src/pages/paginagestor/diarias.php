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
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

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
          <h1 class="h3 mb-4 text-gray-800 text-center">Diárias</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
              <hr>
              <form action="" method="get" class="form-inline">
                <div class="form-group mr-2">
                  <label for="cad">Cadastro:</label>
                  <input type="number" class="form-control ml-2" name="cad" id="cad" value="<?= (isset($_GET['cad']))? $_GET['cad'] : '' ; ?>">       
                </div>
                <div class="form-group mr-2">
                  <label for="dtini">Data Inicial:</label>
                  <input type="date" class="form-control ml-2" name="dtini" id="dtini" value="<?= (isset($_GET['dtini']))? $_GET['dtini'] : '' ; ?>">
                </div>
                <div class="form-group mr-2">
                  <label for="dtfin">Data Final:</label>
                  <input type="date" class="form-control ml-2" name="dtfin" id="dtfin" value="<?= (isset($_GET['dtfin']))? $_GET['dtfin'] : '' ; ?>">
                </div>
                <button type="sumbit" class="btn btn-primary">Procurar</button>
                <a href="diarias.php" class="btn btn-secondary ml-2">Limpar</a>
              </form>

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Cadastro</th>
                      <th>Nome</th>
                      <th>Quantidade</th>
                      <th>Valor</th>
                      <th>Relatório</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Cadastro</th>
                      <th>Nome</th>
                      <th>Quantidade</th>
                      <th>valor</th>
                      <th>Relatório</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    if (isset($_GET['cad'])) {
                      $sql = "SELECT COUNT(rp.fk_diaria) as quantidade,SUM(dia.valor) as soma, rp.fk_usuario, usu.cadastro, usu.nome FROM registro_ponto rp JOIN diarias dia ON dia.id = rp.fk_diaria JOIN usuario usu on usu.usuario_id = rp.fk_usuario WHERE usu.cadastro = {$_GET['cad']} AND hora_inicio BETWEEN '{$_GET['dtini']}' AND '{$_GET['dtfin']}'";
                      $query = $conn->executeQuery($sql);
                      
                      $row = mysqli_num_rows($query);
                      while ($row = mysqli_fetch_assoc($query)): ?>
                        <tr>
                          <td><?=$row['cadastro']?></td>
                          <td><?=$row['nome']?></td>
                          <td><?=$row['quantidade']?></td>
                          <td><?=$row['soma']?></td>
                          <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Visualizar</button></td>

                          <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                              </div>
                            </div>
                          </div>

                        </tr>
                        <?php
                      endwhile;
                    } else {
                  
                       $sql = "SELECT COUNT(rp.fk_diaria) as quantidade,SUM(dia.valor) as soma, rp.fk_usuario, usu.cadastro, usu.nome FROM registro_ponto rp JOIN diarias dia ON dia.id = rp.fk_diaria JOIN usuario usu on usu.usuario_id = rp.fk_usuario WHERE previlegio = 3";
                        $query = $conn->executeQuery($sql);
                      
                      $row = mysqli_num_rows($query);
                      while ($row = mysqli_fetch_assoc($query)): ?>
                        <tr>
                          <td><?=$row['cadastro']?></td>
                          <td><?=$row['nome']?></td>
                          <td><?=$row['quantidade']?></td>
                          <td><?=$row['soma']?></td>
                          <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Visualizar</button></td>

                          <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                              </div>
                            </div>
                          </div>
                        </tr>
                        <?php
                        endwhile;
                    }
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


<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pronto para partir?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Selecione "Logout" abaixo se você estiver pronto para terminar sua sessão atual.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="login.html">Logout</a>
      </div>
    </div>
  </div>
</div>


</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pronto para partir?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Selecione "Logout" abaixo se você estiver pronto para terminar sua sessão atual.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="login.html">Logout</a>
      </div>
    </div>
  </div>
</div>


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
