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
  <style type="text/css">
    a{
      border-radius: 10px;

    }


  </style>

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
          <h1 class="h3 mb-4 text-gray-800"><center>CNH & MOPP</center></h1>
          <h1 class="h3 mb-2 text-gray-800"></h1>
          <p class="mb-4"><a target="_blank" href="https://datatables.net"></a>.</p>

          <!-- DataTales Example -->

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>CADASTRO</th>
                      <th>NOME</th>
                      <th>CPF</th>
                      <th>CNH</th>
                      <th>VENCIMENTO CNH</th>
                      <th>MOPP</th>
                      <th>VENCIMENTO MOPP</th>
                      <th></th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                    $selectUsers = $conn->executeQuery("SELECT * FROM usuario");
                    $selectUsersRows = mysqli_num_rows($selectUsers);
                    while ($selectUsersRows = mysqli_fetch_assoc($selectUsers)):
                      ?>
                      <tr>
                        <td><?= $selectUsersRows["cadastro"] ?></td>
                        <td><?= $selectUsersRows["nome"] ?></td>
                        <td><?= $selectUsersRows["cpf"] ?></td>
                        <td><?= $selectUsersRows["cnh"] ?></td>
                        <td><?= $selectUsersRows["venc_cnh"] ?></td>
                        <td><?= $selectUsersRows["mopp"] ?></td>
                        <td><?= $selectUsersRows["venc_mopp"] ?></td>
                        <td>
                         <form action="" method="get">
                          <a  class="btn btn-primary botao_ajax_modal text-white" data-id="<?= $selectUsersRows["cadastro"] ?>" data-toggle="modal" data-target="#exampleModal">
                            Editar
                          </a>
                        </form>
                      </td>
                    </tr>
                  <?php endwhile; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <!--   $('.botao_ajax_modal').click(function() {

          var id = $(this).getAttr('data-id');

          $.ajax({});
        });
      -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Alterações</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>

           <div class="modal-body">

            <label>Vencimento CNH</label>
            <input type="date" class="form-control" id="inputVencimentoCNH" name="inputVencimentoCNH" value="<?=(isset($_GET['editar'])) ? $selectUsuariosRows['venc_cnh'] : ''; ?>">
            <br>
            <br>
            <label>Vencimento MOPP</label>
            <input type="date" class="form-control" id="inputVencimentoMOPP" name="inputVencimentoMOPP" value="<?=(isset($_GET['editar'])) ? $selectUsuariosRows['venc_mopp'] : ''; ?>">

          </div>

          <div class="modal-footer">

            <?php
            if (isset($_POST['btnSalvar'])) {
              $sqlUpdate = $conn->executeQuery("UPDATE usuario SET venc_cnh = {$_POST['inputVencimentoCNH']} AND venc_mopp = {$_POST['inputVencimentoMOPP']} WHERE cadastro = {$selectUsersRows["cadastro"]}");
              $salvar = mysqli_fetch_assoc($sqlUpdate);
              header('Location: /cnhemopp.php');
            }
            ?>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-primary" name="btnSalvar" id="btnSalvar">Salvar</button>

          </div>
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
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="login.html">Logout</a>
      </div>
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
</body>

</html>
