<?php
require_once '../../classes/Autoload.class.php';
$login = new Login;
$login->VerificarLogin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <style type="text/css">
  .w3-myfont {
    font-family: "Comic Sans MS", cursive, sans-serif;
  }
  img{ filter: brightness(
51%
)}
</style>

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

<body id="page-top" class="sidebar-toggled">

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

          <center><div><h1 class="h3 mb-4 text-primary"><img src="../../../img/fav.png"> <strong>POJIGO </strong></h1></div></center>
          <body>
            <div class="bd-example">
              <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                  <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                  <div class="card p-4 ">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="../../../img/inicial_icons/monitoramento.jpg" class="d-block w-100" alt="..." height="500">
                        <div class="carousel-caption d-none d-md-block" style="margin-bottom: 380px;">
                          <H3><strong>MONITORAMENTO</strong></H3>
                          <h5><strong>Monitore seus motoristas, tenha controle e relatórios de horários, diárias entre outros.</strong></h5>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img src="../../../img/inicial_icons/rastreamento.png"" class="d-block w-100" alt="..." height="500">
                        <div class="carousel-caption d-none d-md-block " style="margin-bottom: 380px;">
                          <H3><strong>RASTREAMENTO</strong></H3>
                          <h5><strong>Rastreie suas frotas para uma melhor precisão em suas entregas.</strong></h5>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img src="../../../img/inicial_icons/cnh.jpg" class="d-block w-100" alt="..." height="500">
                        <div class="carousel-caption d-none d-md-block " style="margin-bottom: 360px;">
                          <H3><strong>CNH E MOPP</strong></H3>
                          <h5><strong>Garanta a segurança em sua empresa.
                          Avisos sobre vencimento de CNH e MOPP serão enviados aos motoristas.</strong></h5>
                        </div>
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
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

  </body>

  </html>
