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
           <div class="form-group">
            <label for="frota">Frota: </label>
            <input type="number" class="form-control" id="frota"  name="frota"placeholder=""  min="0" >
          </div>
          <form class="form-group">
            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Marca</label>
            <select class="custom-select my-1 mr-sm-2" id="marca" name="marca">
              <option selected></option>
              <option value="1">One</option>
              <option value="2">Two</option>
            </select>
            <div class="custom-control custom-checkbox my-1 mr-sm-2">
              <input type="checkbox" class="custom-control-input" id="marca">
            </div>
          </form>
          <form class="form-group">
            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Modelo</label>
            <select class="custom-select my-1 mr-sm-2" id="modelo">
              <option selected></option>
              <option value="1">One</option>
              <option value="2">Two</option>
            </select>
            <div class="custom-control custom-checkbox my-1 mr-sm-2">
            </div>
          </form>

          <div class="form-group">
            <label for="formGroupExampleInput">Placa: </label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Chassi: </label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="">
          </div>
          <div class="form-group">
            <label for="renavam">Renavam: </label>
            <input type="number" class="form-control" id="renavam"  name="renavam" placeholder=""  min="0" >
          </div>
          <div class="form-group">
            <label for="tanque">Capacidade Tanque: </label>
            <input type="number" class="form-control" id="tanque"  name="tanque" placeholder=""  min="0" >
          </div>
          <div class="form-group">
            <label for="ano_fabricacao">Ano Fabricação: </label>
            <input type="date" class="form-control" id="ano_fabricacao" name="ano_fabricacao"placeholder="">
          </div>
          <div class="form-group">
            <label for="ano_modelo">Ano Modelo: </label>
            <input type="date" class="form-control" id="ano_modelo" name="ano_modelo" placeholder="">
          </div>
          <div class="form-group">
            <label for="carga">Capacidade De Carga: </label>
            <input type="number" class="form-control" id="carga"  name="carga" placeholder=""  min="0" >
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
