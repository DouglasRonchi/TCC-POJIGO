<?php
require_once '../../classes/Site.class.php';
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
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../../css/sb-admin-2.min.css" rel="stylesheet">

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
          <h1 class="h3 mb-4 text-gray-800">Cadastro de Veículos</h1>

          <form action="../../controllers/veiculosController.php" method="post">
           <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputFrota">Frota</label>
              <input type="text" class="form-control" id="inputFrota" name="inputFrota" placeholder="">
            </div>

               <div class="form-group col-md-4">
                   <label for="inputMarca">Marca&nbsp;</label><a style="cursor: pointer" class="btn-gradient-primary btn-sm" data-toggle="modal" data-target=".modal-nova-marcaemodelo">Nova marca/modelo</a>
                   <select class="form-control" name="inputMarca" id="inputMarca">
                   <option>Selecione uma Marca</option>
                       <?php
                      $selectMarca = $conn->executeQuery("SELECT * FROM marca_veiculo");
                      $row = mysqli_num_rows($selectMarca);
                      while ($row = mysqli_fetch_assoc($selectMarca)){
                              echo "<option value='".$row['id']."'>".$row['marca']."</option>";
                            }
                            
                      ?>
                   </select>
               </div>

               <div class="form-group col-md-4">
                   <label for="inputModelo">Modelo</label>
                   <select class="form-control" name="inputModelo" id="inputModelo">
                       <option>Selecione um Modelo</option>

                   </select>
               </div>

          </div>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputPlaca">Placa</label>
              <input type="text" class="form-control" id="inputPlaca" name="inputPlaca" placeholder="">
            </div>

            <div class="form-group col-md-4">
              <label for="inputChassi">Chassi</label>
              <input type="text" class="form-control" id="inputChassi" name="inputChassi" placeholder="">
            </div>

            <div class="form-group col-md-4">
              <label for="inputRenavam">Renavam</label>
              <input type="text" class="form-control" id="inputRenavam" name="inputRenavam" placeholder="">
            </div>
          </div>
          
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputDataDeFabricacao">Data de Fabricação</label>
              <input type="date" class="form-control" id="inputDataDeFabricacao" name="inputDataDeFabricacao">
            </div>

            <div class="form-group col-md-6">
              <label for="inputAnoModelo">Ano Modelo</label>
              <input type="date" class="form-control" id="inputAnoModelo" name="inputAnoModelo">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputCapacidadeDeCarga">Capacidade de Carga</label>
              <input type="number" class="form-control" id="inputCapacidadeDeCarga" name="inputCapacidadeDeCarga">
            </div>

            <div class="form-group col-md-6">
              <label for="inputCapacidadeDeTanque">Capacidade de Tanque</label>
              <input type="number" class="form-control" id="inputCapacidadeDeTanque" name="inputCapacidadeDeTanque">
            </div>
          </div>

          <button type="submit" class="btn btn-primary">Salvar</button>
        </form>


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

<!-- Script Ajax para selecionar a marca e modelo de veiculos -->

<script>

$(document).ready(function () {
    $('#inputMarca').change(function () {
        let id = $('#inputMarca').val();

        // console.log(id);

            $.ajax({
                url: 'cadastro_veiculosAjax.php',
                type: 'post',
                data: { id: id },
                success: function (data) {
                    $('#inputModelo').append(data);
                },
                error: function (data) {
                    
                },
                beforeSend: function () {
                  $('#inputModelo').children('option:not(:first)').remove();
                }

            }).done(function () {
              
            });

    });

});

</script>


  <!-- Small modal Nova Marca e Modelo de Veículo -->

  <div class="modal fade modal-nova-marcaemodelo" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Nova Marca/Modelo</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form>
                      <div class="form-group">
                          <label for="inputNovaMarca" class="col-form-label">Marca:</label>
                          <input type="text" class="form-control" id="inputNovaMarca" name="inputNovaMarca" required>
                      </div>
                      <div class="form-group">
                          <label for="inputNovoModelo" class="col-form-label">Modelo:</label>
                          <input type="text" class="form-control" id="inputNovoModelo" name="inputNovoModelo" required>
                      </div>

              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn-primary">Salvar</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
  </div>

  <!-- Small modal Nova Marca e Modelo de Veículo -->

</body>

</html>
