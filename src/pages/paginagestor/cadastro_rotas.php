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
    #map {
      max-width: 100%;
      height: 100%;
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

          <!--mapa ok-->
          <script async defer
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbqJXX7fEFddatn-vaBp3BtBS-4TJNIbg&callback=callback&sensor=false">
        </script>

        <!-- Parâmetro sensor é utilizado somente em dispositivos com GPS -->
        <script type="text/javascript">
          function CalculaDistancia() {
            $('#litResultado').html('Aguarde...');
            //Instanciar o DistanceMatrixService
            var service = new google.maps.DistanceMatrixService();
            //executar o DistanceMatrixService
            service.getDistanceMatrix(
            {
                  //Origem
                  origins: [$("#txtOrigem option:selected").text()],
                  //Destino
                  destinations: [$("#txtDestino option:selected").text()],
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


          <form action="../../controllers/cidadeController.php" method="post">

           <div class="row">
            <div class="form-group col-md-6">
              <label for="inputNome_cidade"><strong>Inserir nova cidade</strong></label>
              <input type="text" class="field" id="inputNome_cidade" name="inputNome_cidade"
              placeholder="Digite o nome da cidade." required>

              <button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#CidadeModal">Salvar cidade</button>
              <div class="modal fade" id="CidadeModal" tabindex="-1" role="dialog" aria-labelledby="CidadeModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                      <button type="submit" name="salvar" class="btn btn-primary">Salvar</button>
                    </div>
                  </div>
                </div>
              </div> 
            </div>
          </div>                   

        </form>
        <form action="../../controllers/rotasController.php" method="post">

         <div class="row">
          <div class="form-group col-md-6">
            <label for="txtOrigem"><strong>Endereço de origem</strong></label>
            <select style="width: 400px" class="field" id="txtOrigem" name="origem">
              <?php
              $dados = $conn->executeQuery("SELECT * FROM cidades");
              while($cidade = mysqli_fetch_assoc($dados)) {
                ?>
                <option value="<?=$cidade['id']?>"><?= $cidade['nome_cidade'] ?></option>
              <?php }?>
            </select>
          </div>
        </div>

        <div class="row">
          <div class="form-group col-md-12">
            <label for="txtDestino"><strong>Endereço de destino</strong></label>
            <select style="width: 400px" class="field" id="txtDestino" name="destino">
              <?php
              $dados = $conn->executeQuery("SELECT * FROM cidades");
              while($cidade = mysqli_fetch_assoc($dados)) {
                ?>
                <option value="<?=$cidade['id']?>"><?= $cidade['nome_cidade'] ?></option>
              <?php }?>
            </select>

            <input type="button" value="Calcular distância" onclick="CalculaDistancia()" class="btnNew btn btn-secondary mr-2"/>

            <button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#exampleModal">
              Salvar rota
            </button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" name="salvar" class="btn btn-primary">Salvar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>


      <div><span id="litResultado">&nbsp;</span></div>
      <div class="googlemaps">
        <iframe  id="map" src="https://maps.google.com/maps?saddr=&daddr=&output=embed"></iframe>
      </div>

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
