<?php
require_once '../../classes/Autoload.class.php';
$conn = new Site;
$login = new Login;
$usuario = new Usuario;
$login->VerificarLogin();

if (isset($_POST["btnsalvar"])) {
  $cnh = $_POST["VenciCNH"];
  $mopp = $_POST["VenciMOPP"];
  $usuarioId = $_POST["UsuarioId"];

if ($cnh < date ('Y-m-d') || $mopp < date('Y-m-d')) {

  echo  "<script>alert('Data de vencimento não pode ser menor que a data atual e que o vencimento já registrado !!');</script>";  

} else {
  $result = $conn->executeQuery("UPDATE usuario SET venc_cnh = '{$cnh}', venc_mopp = '{$mopp}' WHERE usuario_id = {$usuarioId}");

  $conn->setAlerta(
    'success',
    'CNH ' . $usuario->getCnh() . 'MOPP' . $usuario->getMopp()  . ' atualizado com sucesso',
    '<img class="img-fluid" src="' . $conn->path('img/icons/success.png') . '">',
    $_SESSION['usuario_id']
  );

  header('Location: cnhemopp.php');
}
}



if (isset($_GET['userId'])) {
  header('Content-type: application/json');
  $usuario_id = $_GET['userId'];
  $resultado = $conn->executeQuery("SELECT venc_cnh, venc_mopp FROM usuario WHERE usuario_id = '{$usuario_id}'");
  $user = mysqli_fetch_assoc($resultado);
  echo json_encode($user);
} else {
  ?>

  <!DOCTYPE html>
  <html lang="pt-br">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pojigo - CNH e MOPP</title>

    <!-- Custom fonts for this template-->
    <link href="../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
    <!-- stylo geral -->
    <link rel="stylesheet" type="text/css" href="../../../css/estilo.css">
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
            <h1 class=" mb-4 "><center>CNH & MOPP</center></h1>

            <!-- DataTales Example -->

            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
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
                      while ($Rows = mysqli_fetch_assoc($selectUsers)):
                        ?>
                        <tr>
                          <td><?= $Rows["cadastro"] ?></td>
                          <td><?= $Rows["nome"] ?></td>
                          <td><?= $Rows["cpf"] ?></td>
                          <td><?= $Rows["cnh"] ?></td>
                          <td><?= $Rows["venc_cnh"] ?></td>
                          <td><?= $Rows["mopp"] ?></td>
                          <td><?= $Rows["venc_mopp"] ?></td>
                          <td><button type="button" class="btn btn-primary" name="btnEditar" id="<?= $Rows["usuario_id"] ?>" data-toggle="modal" data-target="#exampleModal">Editar</button></td>
                        </tr>
                      <?php endwhile; ?>
                    </tbody>
                    <tfoot>
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
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>


            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <form action="cnhemopp.php" method="POST">
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
                      <input type="date" class="form-control" id="VenciCNH" name="VenciCNH">
                      <br>
                      <br>
                      <label>Vencimento MOPP</label>
                      <input type="date" class="form-control" id="VenciMOPP" name="VenciMOPP">
                      <input type="hidden" class="form-control" id="UsuarioId" name="UsuarioId">

                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                      <button type="submit" class="btn btn-primary" name="btnsalvar" id="btnsalvar">Salvar</button>

                    </div>
                  </div>
                </div>
              </form>
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
            <h5 class="modal-title" id="exampleModalLabel">Pronto para partir?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Selecione "Sair" abaixo se você estiver pronto para encerrar sua sessão atual.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-primary" href="login.html">Sair</a>
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

<?php include_once '../../include/configdatatable.php'?>


<script>
$('.btn[name="btnEditar"]').click(function(event){
  btn = $(event.currentTarget);
  id = btn.attr("id");
  $.ajax(location["href"] + "?userId=" + id).done(function(data){
    $("#VenciCNH").val(data["venc_cnh"]);
    $("#VenciMOPP").val(data["venc_mopp"]);
    $("#UsuarioId").val(id);
  })
});
</script>
</body>

</html>
<?php } ?>