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
      width: 100%;
      height: 100%;
    }

    .content-heading {
      height: 10%!important;
    }

    .content-form {
      height: 85%!important;
    }

    .content-form .form-row .form-group {
      width: 100%;
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

      <!-- Topbar Navbar -->
      <?php include '../menu/topbar.php'; ?>
      <!-- End of Topbar -->

      <!-- Main Content -->
      <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid h-100">

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
                $origem = response.originAddresses;
                $destino = response.destinationAddresses;
                $origem = $origem[0].split(",");
                $destino = $destino[0].split(",");


                $('#txtOrigem').val($origem[0]);
                $('#txtDestino').val($destino[0]);


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



          <!-- Auto complete -->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbqJXX7fEFddatn-vaBp3BtBS-4TJNIbg&libraries=places&callback=initAutocomplete"
        async defer></script>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbqJXX7fEFddatn-vaBp3BtBS-4TJNIbg&libraries=places&callback=initAutocomplete2"
        async defer></script>

          <script>

            var placeSearch, autocomplete;

            var componentForm = {
              street_number: 'short_name',
              route: 'long_name',
              locality: 'long_name',
              administrative_area_level_1: 'short_name',
              country: 'long_name',
              postal_code: 'short_name'
            };

            function initAutocomplete() {
            // Create the autocomplete object, restricting the search predictions to
            // geographical location types.
            autocomplete = new google.maps.places.Autocomplete(
              document.getElementById('txtOrigem'), {types: ['geocode']});

          // Avoid paying for data that you don't need by restricting the set of
          // place fields that are returned to just the address components.
          autocomplete.setFields(['address_component']);

          // When the user selects an address from the drop-down, populate the
          // address fields in the form.
          autocomplete.addListener('place_changed', fillInAddress);
        }

        function fillInAddress() {
          // Get the place details from the autocomplete object.
          var place = autocomplete.getPlace();

          for (var component in componentForm) {
            document.getElementById(component).value = '';
            document.getElementById(component).disabled = false;
          }

          // Get each component of the address from the place details,
          // and then fill-in the corresponding field on the form.
          for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            if (componentForm[addressType]) {
              var val = place.address_components[i][componentForm[addressType]];
              document.getElementById(addressType).value = val;
            }
          }
        }

        // Bias the autocomplete object to the user's geographical location,
        // as supplied by the browser's 'navigator.geolocation' object.
        function geolocate() {
          if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
              var geolocation = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
              };
              var circle = new google.maps.Circle(
                {center: geolocation, radius: position.coords.accuracy});
              autocomplete.setBounds(circle.getBounds());
            });
          }
        }
      </script>


<script>

            var placeSearch, autocomplete;

            var componentForm = {
              street_number: 'short_name',
              route: 'long_name',
              locality: 'long_name',
              administrative_area_level_1: 'short_name',
              country: 'long_name',
              postal_code: 'short_name'
            };

            function initAutocomplete2() {
            // Create the autocomplete object, restricting the search predictions to
            // geographical location types.
            autocomplete = new google.maps.places.Autocomplete(
              document.getElementById('txtDestino'), {types: ['geocode']});

          // Avoid paying for data that you don't need by restricting the set of
          // place fields that are returned to just the address components.
          autocomplete.setFields(['address_component']);

          // When the user selects an address from the drop-down, populate the
          // address fields in the form.
          autocomplete.addListener('place_changed', fillInAddress);
        }

        function fillInAddress() {
          // Get the place details from the autocomplete object.
          var place = autocomplete.getPlace();

          for (var component in componentForm) {
            document.getElementById(component).value = '';
            document.getElementById(component).disabled = false;
          }

          // Get each component of the address from the place details,
          // and then fill-in the corresponding field on the form.
          for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            if (componentForm[addressType]) {
              var val = place.address_components[i][componentForm[addressType]];
              document.getElementById(addressType).value = val;
            }
          }
        }

        // Bias the autocomplete object to the user's geographical location,
        // as supplied by the browser's 'navigator.geolocation' object.
        function geolocate() {
          if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
              var geolocation = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
              };
              var circle = new google.maps.Circle(
                {center: geolocation, radius: position.coords.accuracy});
              autocomplete.setBounds(circle.getBounds());
            });
          }
        }
      </script>




      <div class="row content-heading mb-3">
        <!-- Page Heading -->
        <div class="col-md-12">
          <h1 class="h3 text-gray-800">Cadastro de Rotas</h1>
        </div>
      </div>
      <div class="row content-form">
        <form class="col-md-4" action="../../controllers/rotasController.php" method="post">


        <?php 
        if (isset($_GET['id'])){
          $query = $conn->executeQuery("SELECT ci.nome_cidade AS origem, ci2.nome_cidade AS destino FROM rotas ro JOIN cidades ci ON ci.id = ro.fk_cidade_origem JOIN cidades ci2 ON ci2.id = ro.fk_cidade_destino WHERE ro.id = {$_GET['id']}");
          $result = mysqli_fetch_assoc($query);
        }
        ?>


        <div class="form-group">
          <label for="txtOrigem"><strong>Endereço de origem</strong></label>
          <input  type="text" class="field form-control" id="txtOrigem" name="origem" value="<?= (isset($_GET['id']))? $result['origem'] : '' ; ?>">

        </div>

        <div class="form-group">
          <label for="txtDestino"><strong>Endereço de destino</strong></label>
          <input type="text" class="field form-control" id="txtDestino" name="destino" value="<?= (isset($_GET['id']))? $result['destino'] : '' ; ?>">


        </div>

        <div class="form-group">
          <input type="button" value="Calcular distância" onclick="CalculaDistancia()" id="calcdist" class="btnNew btn btn-secondary mr-2"/>

          <?php
          if (isset($_GET['id'])):
            ?>
            <input type="hidden" name="id" value="<?=$_GET['id']?>">
            <button type="submit" name="atualizar" class="btn btn-primary mr-2">Atualizar Rota</button>
            <?php else: ?>

              <button type="submit" name="salvar" class="btn btn-primary mr-2" onclick="return confirm('Tem certeza que deseja salvar a rota?')">Salvar Rota</button>

            <?php endif; ?>

          </div>
          <div><span id="litResultado">&nbsp;</span></div>
        </form>
        <div class="googlemaps col-md-8">
          <iframe  id="map" src="https://maps.google.com/maps?saddr=&daddr=&output=embed"></iframe>
        </div>
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


<?php if (isset($_GET['id'])) :  
  ?>
  <script type="text/javascript">
    $(document).ready(function () {
      function sleep() {
        $('#calcdist').trigger('click');            
      }

      setTimeout(sleep,1000);

    });

  </script>

<?php endif; ?>


</body>

</html>
