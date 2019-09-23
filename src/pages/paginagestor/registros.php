<?php

require_once '../../classes/Autoload.class.php';
$conn = new Site;
$login = new Login;
$login->VerificarLogin();

$registro = new Registro;

if (isset($_POST["btnSalvar"])) {

$id = $_POST['Id'];
$cad = $_POST['cad'];
$hora_ini = $_POST['hora_ini'];
$ini_intervalo = $_POST['ini_intervalo'];
$fim_intervalo = $_POST['fim_intervalo'];
$ini_parada_um = $_POST['ini_parada_um'];
$fim_parada_um = $_POST['fim_parada_um'];
$ini_parada_dois = $_POST['ini_parada_dois'];
$fim_parada_dois = $_POST['fim_parada_dois'];
$hora_fim = $_POST['hora_fim'];

$result = $conn->executeQuery("UPDATE registro_ponto SET hora_inicio = '{$hora_ini}', hora_inicio_intervalo = '{$ini_intervalo}', hora_fim_intervalo = '{$fim_intervalo}', inicio_parada_um = '{$ini_parada_um}', fim_parada_um = '{$fim_parada_um}', inicio_parada_dois = '{$ini_parada_dois}', fim_parada_dois = '{$fim_parada_dois}', hora_fim = '{$hora_fim}' WHERE id = '{$id}'");

$conn->setAlerta(
'success',
'Registro Ponto cad: '.$_GET['cad'].' atualizado com sucesso',
'<img class="img-fluid" src="'.$conn->path('img/icons/success.png').'">',
$_SESSION['usuario_id']
); 

header('Location: registros.php?cad='.$_GET['cad'].'&dtini='.$_GET['dtini'].'&dtfin='.$_GET['dtfin'].'');

}

?>
<!DOCTYPE html>
<html lang="pt-br">
<style>
  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  td, th {
    border: 1px solid #333;
    text-align: left;
    padding: 8px;
  }

  tr:nth-child(even) {
    background-color: #dddddd;
  }

  .largura10 {
    width: 10%;
  }

  .largura02 {
    width: 0.4%;
  }

  tr.subtitles th {
    text-align: center;
  }
</style>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- select-chosen -->
  <link rel="stylesheet" href="../../../chosen/chosen.css">

  <title>Pojigo - Registros</title>
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
          <h1 class="mb-4 text-gray-800 text-center">Registros</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold"><b>Preencha os dados abaixo e precione <strong class="text-primary">'Procurar'</strong> para ver os registros!</b></h6>
              <hr>
              <form action="" method="get" class="form-inline">
                <div class="side-by-side clearfix mr-2">
                  <div>
                    <select data-placeholder="Cadastro..." id="cad" name="cad" class="chosen-select">
                      <option value=""></option> 

                      <?php  require_once 'select.php'; ?>

                    </select>
                  </div>
                </div>
                <div class="form-group mr-2">
                  <label for="dtini">Data Inicial:</label>
                  <input type="date" class="form-control ml-2" name="dtini" id="dtini"
                  value="<?= (isset($_GET['dtini']))? $_GET['dtini'] : '' ; ?>">
                </div>
                <div class="form-group mr-2">
                  <label for="dtfin">Data Final:</label>
                  <input type="date" class="form-control ml-2" name="dtfin" id="dtfin"
                  value="<?= (isset($_GET['dtfin']))? $_GET['dtfin'] : '' ; ?>">
                </div>
                <button type="sumbit" class="btn btn-primary">Procurar</button>
                <a href="registros.php" class="btn btn-secondary ml-2">Limpar</a>
              </form>
            </div>


            <?php if (isset($_GET['cad']) && isset($_GET['dtini']) && isset($_GET['dtfin']) && $_GET['cad'] != '' && $_GET['dtini'] != '' && $_GET['dtfin'] != ''): ?>
            <?php setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese'); ?>


            <h6 class="mt-3 ml-3 font-weight-bold text-primary">Mostrando resultados do
              cadastro <?= $_GET['cad'] ?> desde <?= strftime("%x", strtotime($_GET['dtini'])) ?>
              até <?= strftime("%x", strtotime($_GET['dtfin'])) ?>.</h6>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Inicio de Jornada</th>
                        <th>Inicio de Intervalo</th>
                        <th>Fim de Intervalo</th>
                        <th>Inicio de Parada 1</th>
                        <th>Fim de Parada 1</th>
                        <th>Inicio de Parada 2</th>
                        <th>Fim de Parada 2</th>
                        <th>Fim de Jornada</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $selectRegistros = $conn->executeQuery("SELECT * FROM registro_ponto rp JOIN usuario us ON rp.fk_usuario = us.usuario_id WHERE us.cadastro = {$_GET['cad']} AND hora_fim <> 'NULL' AND hora_inicio BETWEEN '{$_GET['dtini']}' AND '{$_GET['dtfin']}'");

                      $rows = mysqli_num_rows($selectRegistros);
                      while ($rows = mysqli_fetch_assoc($selectRegistros)):
                      ?>
                      <tr>
                        <td><?= $rows['hora_inicio'] ?></td>
                        <td><?= strftime("%R", strtotime($rows['hora_inicio_intervalo'])) ?></td>
                        <td><?= strftime("%R", strtotime($rows['hora_fim_intervalo'])) ?></td>
                        <td><?= strftime("%R", strtotime($rows['inicio_parada_um'])) ?></td>
                        <td><?= strftime("%R", strtotime($rows['fim_parada_um'])) ?></td>
                        <td><?= strftime("%R", strtotime($rows['inicio_parada_dois'])) ?></td>
                        <td><?= strftime("%R", strtotime($rows['fim_parada_dois'])) ?></td>
                        <td><?= $rows['hora_fim'] ?></td>
                        <td>
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-id="<?= $rows['id'] ?>" data-inicio="<?= $rows['hora_inicio'] ?>" data-ini_inter="<?= strftime("%R", strtotime($rows['hora_inicio_intervalo'])) ?>" data-fim_inter="<?= strftime("%R", strtotime($rows['hora_fim_intervalo'])) ?>" data-ini_para_um="<?= strftime("%R", strtotime($rows['inicio_parada_um'])) ?>" data-fim_para_um="<?= strftime("%R", strtotime($rows['fim_parada_um'])) ?>" data-ini_para_dois="<?= strftime("%R", strtotime($rows['inicio_parada_dois'])) ?>" data-fim_para_dois="<?= strftime("%R", strtotime($rows['fim_parada_dois'])) ?>" data-fim="<?= $rows['hora_fim'] ?>">Editar</button>
                        </td>
                      </tr>

                      <?php endwhile; ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Inicio de Jornada</th>
                        <th>Inicio de Intervalo</th>
                        <th>Fim de Intervalo</th>
                        <th>Inicio de Parada 1</th>
                        <th>Fim de Parada 1</th>
                        <th>Inicio de Parada 2</th>
                        <th>Fim de Parada 2</th>
                        <th>Fim de Jornada</th>
                        <th></th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
            <button class="btn btn-primary mb-4" data-toggle="modal" data-target=".bd-modal-ponto">Gerar Relatório</button>
          </div>
          <!-- /.container-fluid -->
          <?php endif; ?>
        </div>
        <!-- End of Main Content -->
      </div>
      <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Footer -->
    <?php include '../menu/footer.php'; ?>
    <!-- End of Footer -->

    <!-- Logout Modal-->
    <?php include '../menu/logoutmodal.php'; ?>
    <!-- Logout Modal-->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- modal-logout -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pronto para partir?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selecione "Sair" abaixo se você estiver pronto para terminar sua sessão atual.
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="login.html">Sair</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Editar -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Alterações</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <form method="POST">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Inicio de Jornada</th>
                      <th>Inicio de Intervalo</th>
                      <th>Fim de Intervalo</th>
                      <th>Inicio de Parada 1</th>
                      <th>Fim de Parada 1</th>
                      <th>Inicio de Parada 2</th>
                      <th>Fim de Parada 2</th>
                      <th>Fim de Jornada</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><input style="width: 175px" class="form-control" id="hora_ini" name="hora_ini" maxlength="19"></td>
                      <td><input class="form-control" id="ini_intervalo" name="ini_intervalo" maxlength="5"></td>
                      <td><input class="form-control" id="fim_intervalo" name="fim_intervalo" maxlength="8"></td>
                      <td><input class="form-control" id="ini_parada_um" name="ini_parada_um" maxlength="8"></td>
                      <td><input class="form-control" id="fim_parada_um" name="fim_parada_um" maxlength="8"></td>
                      <td><input class="form-control" id="ini_parada_dois" name="ini_parada_dois" maxlength="8"></td>
                      <td><input class="form-control" id="fim_parada_dois" name="fim_parada_dois" maxlength="8"></td>
                      <td><input style="width: 175px" class="form-control" id="hora_fim" name="hora_fim" maxlength="19"></td>
                      <input type="hidden" class="form-control" id="Id" name="Id">
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Inicio de Jornada</th>
                      <th>Inicio de Intervalo</th>
                      <th>Fim de Intervalo</th>
                      <th>Inicio de Parada 1</th>
                      <th>Fim de Parada 1</th>
                      <th>Inicio de Parada 2</th>
                      <th>Fim de Parada 2</th>
                      <th>Fim de Jornada</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary" name="btnSalvar" id="btnSalvar">Salvar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal de Registro de Pontos -->
  <div class="modal fade bd-modal-ponto" tabindex="-1" role="dialog" aria-labelledby="pontoLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="row">
          <div class="col-md-12">
            <div class="conteudo m-3">
              <button type="button" title="Fechar" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
              </button>
              <div class="text-center">
                <h3>Relatório de Horas</h3>
              </div>
              <button class="btn btn-info" title="Imprimir" onclick="imprimirDiv('printableArea')"><i
                class="fas fa-print"></i></button>
                <?php
                if (isset($_GET['cad'])) :
                $selectRegistrosModal = $conn->executeQuery("SELECT * FROM usuario WHERE cadastro = {$_GET['cad']}");
                $row = mysqli_num_rows($selectRegistrosModal);
                while ($row = mysqli_fetch_assoc($selectRegistrosModal)):?>
                <div id="printableArea" class="mt-3">
                  <table>
                    <tr>
                      <th class="largura10 text-center" colspan="4">Dados do Colaborador</th>
                    </tr>
                    <tr>
                      <th class="largura10">Nome:</th>
                      <td><?= $row['nome'] ?></td>
                      <th class="largura10">CPF:</th>
                      <td><?= utf8_encode($row['cpf']) ?></td>
                    </tr>
                    <tr>
                      <th>Cadastro:</th>
                      <td><?= utf8_encode($row['cadastro']) ?></td>
                      <th>RG:</th>
                      <td><?= utf8_encode($row['rg']) ?></td>
                    </tr>
                    <tr>
                      <th>Cidade:</th>
                      <td><?= $row['cidade'] ?></td>
                      <th>Bairro:</th>
                      <td><?= $row['bairro'] ?></td>
                    </tr>
                    <tr>
                      <th>Cargo:</th>
                      <td><?= utf8_encode($row['tipo_usuario']) ?></td>
                      <th>Obs:</th>
                      <td></td>
                    </tr>
                  </table>
                  <table class="mt-1">
                    <tr>
                      <th class="largura10 text-center" colspan="8">Registros</th>
                    </tr>
                    <tr class="subtitles">
                      <th colspan="2">Dia</th>
                      <th>Entrada</th>
                      <th>Inicio Intervalo</th>
                      <th>Retorno Intervalo</th>
                      <th>Saída</th>
                      <th>Total Horas</th>
                      <th>Horas Extras</th>
                    </tr>


                    <?php
                    $horas_totais_mensais = 0;
                    $selectRegistrosUnicos = $conn->executeQuery("SELECT * FROM registro_ponto rp JOIN usuario us ON rp.fk_usuario = us.usuario_id WHERE us.cadastro = {$_GET['cad']} AND hora_fim <> 'NULL' AND rp.hora_inicio BETWEEN '{$_GET['dtini']}' AND '{$_GET['dtfin']}' ORDER BY rp.hora_inicio");
                    $rowHoras = mysqli_num_rows($selectRegistrosUnicos);
                    $horas_mensais_exibicao = 0;
                    $minutos_mensais_exibicao = 0;
                    while ($rowHoras = mysqli_fetch_assoc($selectRegistrosUnicos)):
                    ?>


                    <tr class="subtitles">
                      <th class="largura02">
                        <?php
                        setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                        echo ucfirst(utf8_encode(strftime("%A", strtotime($rowHoras['hora_inicio'])))) ?>
                      </th>
                      <th class="largura02">
                        <?php
                        echo strftime("%d", strtotime($rowHoras['hora_inicio'])) ?>
                      </th>
                      <th><?= strftime("%R", strtotime($rowHoras['hora_inicio'])) ?></th>
                      <th><?= strftime("%R", strtotime($rowHoras['hora_inicio_intervalo'])) ?></th>
                      <th><?= strftime("%R", strtotime($rowHoras['hora_fim_intervalo'])) ?></th>
                      <th><?= strftime("%R", strtotime($rowHoras['hora_fim'])) ?></th>
                      <th>
                        <?php
                        $horas_mensais = 0;
                        //Pega as horas e transforma em segundos
                        $inicio_jornada = strtotime($rowHoras['hora_inicio']);
                        $inicio_intervalo = strtotime($rowHoras['hora_inicio_intervalo']);
                        $fim_intervalo = strtotime($rowHoras['hora_fim_intervalo']);
                        $fim_jornada = strtotime($rowHoras['hora_fim']);
                        //Testa se virar o dia na viagem calcula da mesma forma as Horas
                        if ($fim_jornada < $inicio_jornada) {
                        //Se vira o dia acrescenta mais 24 horas para realizar o cálculo
                        $fim_jornada = $fim_jornada + 86400;
                      } else {
                      //nada...
                    }
                    //Pega as horas trabalhadas e desconta o intervalo
                    if (strtotime($rowHoras['hora_inicio_intervalo']==00)){
                    $horas_trabalhadas = ($fim_jornada - $inicio_jornada);
                  } else {
                  $intervalo = $fim_intervalo - $inicio_intervalo;
                  $horas_trabalhadas = ($fim_jornada - $inicio_jornada) - $intervalo;
                }

                //verifica as horas extras
                if ($horas_trabalhadas > 28800) {
                $horasExtras = $horas_trabalhadas - 28800;
              } else {
              $horasExtras = 0;
            }
            //setando as horas totais do período
            $horas_mensais += $horas_trabalhadas;
            $horaTot = sprintf("%02s", floor($horas_mensais / (60 * 60)));
            $horaTot = (int) $horaTot;
            $horaTot = intval($horaTot);


            $horas_mensais = ($horas_mensais % (60 * 60));
            $minutoTot = sprintf("%02s", floor($horas_mensais / 60));
            $minutoTot = (int) $minutoTot;
            $minutoTot = intval($minutoTot);

            $horas_mensais = ($horas_mensais % 60);
            $horas_mensais_exibicao += $horaTot;
            $minutos_mensais_exibicao += $minutoTot; 
            // var_dump($minutoTot);


            //Arredonda para formato de Horas
            $hora = sprintf("%02s", floor($horas_trabalhadas / (60 * 60)));
            $horas_trabalhadas = ($horas_trabalhadas % (60 * 60));
            $minuto = sprintf("%02s", floor($horas_trabalhadas / 60));
            $horas_trabalhadas = ($horas_trabalhadas % 60);

            $horaExtra = sprintf("%02s", floor($horasExtras / (60 * 60)));
            $horasExtras = ($horasExtras % (60 * 60));
            $minutoExtra = sprintf("%02s", floor($horasExtras / 60));
            $horasExtras = ($horasExtras % 60);
            $horas_extras = $horaExtra . ":" . $minutoExtra;

            $horas_totais = $hora . ":" . $minuto;

            echo $horas_totais;
            ?>

          </th>
          <th><?=$horas_extras?></th>
        </tr>

        <?php endwhile;?>
        <tr class="subtitles">
          <th colspan="6"></th>
          <th>Horas Totais</th>
          <th><?php 
            $horadominuto = floor($minutos_mensais_exibicao / 60);
            $nova_hora_exibicao = $horas_mensais_exibicao + $horadominuto;
            $nova_minuto_exibicao = $minutos_mensais_exibicao - ($horadominuto * 60);

            echo $nova_hora_exibicao . ":" . $nova_minuto_exibicao;
            ?>
          </th>
        </tr>
      </table>
      <br>
      <div class="text-center">
        ______________________<br>
        Assinatura
      </div>
    </div>
    <?php endwhile; ?>
    <?php endif;?>
    <button type="button" title="Fechar" class="btn btn-secondary" data-dismiss="modal">Fechar
    </button>
  </div>
</div>
</div>
</div>
</div>
</div>


<script src="../../../chosen/docsupport/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="../../../chosen/chosen.jquery.js" type="text/javascript"></script>
<script src="../../../chosen/docsupport/init.js" type="text/javascript" charset="utf-8"></script>

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

<?php include_once '../../include/configdatatable.php' ?>

<script type="text/javascript">
  $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipientId = button.data('id')
  var recipientinicio = button.data('inicio')
  var recipientini_inter = button.data('ini_inter')
  var recipientfim_inter = button.data('fim_inter') // Extract info from data-* attributes
  var recipientini_para_um = button.data('ini_para_um') // Extract info from data-* attributes
  var recipientfim_para_um = button.data('fim_para_um') // Extract info from data-* attributes
  var recipientini_para_dois = button.data('ini_para_dois') // Extract info from data-* attributes
  var recipientfim_para_dois = button.data('fim_para_dois') // Extract info from data-* attributes
  var recipientfim = button.data('fim') // Extract info from data-* attributes

  var modal = $(this)
  // modal.find('.modal-title').text('Alterações' + recipient)
  modal.find('#Id').val(recipientId)
  modal.find('#hora_ini').val(recipientinicio)
  modal.find('#ini_intervalo').val(recipientini_inter)
  modal.find('#fim_intervalo').val(recipientfim_inter)
  modal.find('#ini_parada_um').val(recipientini_para_um)
  modal.find('#fim_parada_um').val(recipientfim_para_um)
  modal.find('#ini_parada_dois').val(recipientini_para_dois)
  modal.find('#fim_parada_dois').val(recipientfim_para_dois)
  modal.find('#hora_fim').val(recipientfim)
})
</script>                      
<script>
  function imprimirDiv(div) {
    var impressao = document.getElementById(div).innerHTML;
    var original = document.body.innerHTML;

    document.body.innerHTML = impressao;

    window.print();

    document.body.innerHTML = original;
    location.reload();
  }
</script>

</body>
</html>