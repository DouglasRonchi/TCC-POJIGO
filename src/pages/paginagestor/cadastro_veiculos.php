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

          <form>
           <div class="form-row">
            <div class="form-group col-md-4">
              <label for="Frota">Frota</label>
              <input type="text" class="form-control" id="inputFrota" name="inputFrota" placeholder="">
            </div>

            <div class="form-group col-md-4">
              <label for="Marca">Marca</label>
              <input type="text" class="form-control" id="inputMarca" name="inputMarca" placeholder="">
            </div>

            <div class="form-group col-md-4">
              <label for="Modelo">Modelo</label>
              <input type="text" class="form-control" id="inputModelo" name="inputModelo" placeholder="">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="Placa">Placa</label>
              <input type="text" class="form-control" id="inputPlaca" name="inputPlaca" placeholder="">
            </div>

            <div class="form-group col-md-4">
              <label for="Chassi">Chassi</label>
              <input type="text" class="form-control" id="inputChassi" name="inputChassi" placeholder="">
            </div>

            <div class="form-group col-md-4">
              <label for="Renavam">Renavam</label>
              <input type="text" class="form-control" id="inputRenavam" name="inputRenavam" placeholder="">
            </div>
          </div>
          
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="DataDeFabricacao">Data de Fabricação</label>
              <input type="date" class="form-control" id="inputDataDeFabricacao" name="inputDataDeFabricacao">
            </div>

            <div class="form-group col-md-6">
              <label for="AnoModelo">Ano Modelo</label>
              <input type="date" class="form-control" id="inputAnoModelo" name="inputAnoModelo">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="CapacidadeDeCarga">Capacidade de Carga</label>
              <input type="text" class="form-control" id="InputCapacidaDeCarga" name="InputCapacidaDeCarga">
            </div>

            <div class="form-group col-md-6">
              <label for="CapacidadeDeTanque">Capacidade de Tanque</label>
              <input type="text" class="form-control" id="InputCapacidaDeTanque" name="InputCapacidaDeTanque">
            </div>
          </div>
          <button type="button" class="btn btn-primary">Salvar</button>
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

</body>

</html>
