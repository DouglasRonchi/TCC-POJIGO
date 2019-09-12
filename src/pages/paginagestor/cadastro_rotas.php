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

  <title>Pojigo - Cadastro Rotas</title>

  <!-- Custom fonts for this template-->
  <link href="../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../../css/sb-admin-2.min.css" rel="stylesheet">
  <style>
    #mapa {
      height:400px;
      width:400px;
    }
  </style>
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
          <h1 class="h3 mb-4 text-gray-800">Cadastro de Rotas</h1>

          <!-- chave google api AIzaSyCbqJXX7fEFddatn-vaBp3BtBS-4TJNIbg -->

          <!-- Parâmetro sensor é utilizado somente em dispositivos com GPS -->
  <!--  <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript">
        function CalculaDistancia() {
            $('#litResultado').html('Aguarde...');
            //Instanciar o DistanceMatrixService
            var service = new google.maps.DistanceMatrixService();
            //executar o DistanceMatrixService
            service.getDistanceMatrix(
              {
                  //Origem
                  origins: [$("#txtOrigem").val()],
                  //Destino
                  destinations: [$("#txtDestino").val()],
                  //Modo (DRIVING | WALKING | BICYCLING)
                  travelMode: google.maps.TravelMode.DRIVING,
                  //Sistema de medida (METRIC | IMPERIAL)
                  unitSystem: google.maps.UnitSystem.METRIC
                  //Vai chamar o callback
              }, callback);
        }
        //Tratar o retorno do DistanceMatrixService
        function callback(response, status) {
            //Verificar o Status
            if (status != google.maps.DistanceMatrixStatus.OK)
                //Se o status não for "OK"
                $('#litResultado').html(status);
            else {
                //Se o status for OK
                //Endereço de origem = response.originAddresses
                //Endereço de destino = response.destinationAddresses
                //Distância = response.rows[0].elements[0].distance.text
                //Duração = response.rows[0].elements[0].duration.text
                $('#litResultado').html("<strong>Origem</strong>: " + response.originAddresses +
                    "<br /><strong>Destino:</strong> " + response.destinationAddresses +
                    "<br /><strong>Distância</strong>: " + response.rows[0].elements[0].distance.text +
                    " <br /><strong>Duração</strong>: " + response.rows[0].elements[0].duration.text
                    );
                //Atualizar o mapa
                $("#map").attr("src", "https://maps.google.com/maps?saddr=" + response.originAddresses + "&daddr=" + response.destinationAddresses + "&output=embed");
            }
        }
    </script>
    <table width="100%" cellspacing="0" cellpadding="0" border="0">
        <tbody>
            <tr>
                <td>
                    <label for="txtOrigem"><strong>Endere&ccedil;o de origem</strong></label>
                    <input type="text" id="txtOrigem" class="field" style="width: 400px" />

                </td>
            </tr>
            <tr>
                <td>
                    <label for="txtDestino"><strong>Endere&ccedil;o de destino</strong></label>
                    <input type="text" style="width: 400px" class="field" id="txtDestino" />

                </td>
            </tr>
            <tr>
                <td>
                    <input type="button" value="Calcular dist&acirc;ncia" onclick="CalculaDistancia()" class="btnNew" />
                </td>
            </tr>
        </tbody>
    </table>
    <div><span id="litResultado">&nbsp;</span></div>
    <div style="padding: 10px 0 0; clear: both">
        <iframe width="750" scrolling="no" height="350" frameborder="0" id="map" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?saddr=são paulo&daddr=rio de janeiro&output=embed"></iframe>
      </div> -->

    <div class="map-responsive">
 <table width="100%" cellspacing="0" cellpadding="0" border="0">
      <tbody>
        <tr >
          <td>
            <label for="txtOrigem"><strong>Origem:</strong></label>
            <input type="text" id="txtOrigem" class="field" style="width: 400px"/>
          </td>
        </tr>
        
        <tr>
          <td>
            <label for="txtDestino"><strong>Destino:</strong></label>
            <input type="text" id="txtDestino" class="field" style="width: 398px"/>
          </td>
        

        
          <td>
            <input type="button" value="Calcular distância" onclick="CalculaDistancia()" class="btnNew" id="txtDestino"/>
            <input type="text" id="txtDistancia" class="field" style="width: 100px"/>
          </td>
        </tr>
      </tbody>
    </table>

      <div id="mapa" style="width: 100%; margin-top: 12px"></div>
      <script>

        function inicializar() {
          var coordenadas = {lat: -22.912869, lng: -43.228963};

          var mapa = new google.maps.Map(document.getElementById('mapa'), {
            zoom: 15,
            center: coordenadas 
          });

          var marker = new google.maps.Marker({
            position: coordenadas,
            map: mapa,
            title: 'Meu marcador'
          });
        }
      </script>
      <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbqJXX7fEFddatn-vaBp3BtBS-4TJNIbg&callback=inicializar">
    </script>
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
