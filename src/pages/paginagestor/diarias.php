<?php

require_once '../../classes/Autoload.class.php';
$conn = new Site;
$login = new Login;
$login->VerificarLogin();
?>
<!DOCTYPE html>
<html lang="pt-br">
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td,
th {
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
  <title>Pojigo - Diarias</title>
  <!-- Custom fonts for this template-->
  <link href="../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
  href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
  rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../../../css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Custom styles for this page -->
  <link href="../../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar --> <?php include '../menu/sidebar.php'; ?>
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
          <h1 class="mb-4 text-gray-800 text-center">Diárias</h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold"><b>Preencha os dados abaixo e precione <strong class="text-primary">'visualizar'</strong> para ver o relatório de diarias!</b></h6>
              <hr>
              <form action="" method="get" class="form-inline">

                <div class="form-group mr-2">
                  <label for="cad">Cadastro:</label>
                  <input type="number" class="form-control ml-2" name="cad" id="cad"
                  value="<?= (isset($_GET['cad']))? $_GET['cad'] : '' ; ?>">
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
                <a href="diarias.php" class="btn btn-secondary ml-2">Limpar</a>
              </form>
            </div>


           <?php if (isset($_GET['cad']) && isset($_GET['dtini']) && isset($_GET['dtfin']) && $_GET['cad'] != '' && $_GET['dtini'] != '' && $_GET['dtfin'] != ''): ?>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Cadastro</th>
                      <th>Nome</th>
                      <th>Quantidade</th>
                      <th>valor</th>
                      <th>Relatório</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Cadastro</th>
                      <th>Nome</th>
                      <th>Quantidade</th>
                      <th>valor</th>
                      <th>Relatório</th>
                    </tr>
                  </tfoot>
                  <tbody> <?php
                  if (isset($_GET['cad'])) {
                    $sql = "SELECT COUNT(rp.fk_diaria) as quantidade, SUM(dia.valor) as soma, rp.fk_usuario, usu.cadastro, usu.nome FROM registro_ponto rp JOIN diarias dia ON dia.id = rp.fk_diaria JOIN usuario usu on usu.usuario_id = rp.fk_usuario WHERE usu.cadastro = {$_GET['cad']} AND hora_inicio BETWEEN '{$_GET['dtini']}' AND '{$_GET['dtfin']}'";

                  } else {
                    $sql = "SELECT COUNT(rp.fk_diaria) as quantidade, SUM(dia.valor) as soma, rp.fk_usuario, usu.cadastro, usu.nome FROM registro_ponto rp JOIN diarias dia ON dia.id = rp.fk_diaria JOIN usuario usu on usu.usuario_id = rp.fk_usuario WHERE previlegio = 3 GROUP BY fk_usuario";
                  }

                  $query = $conn->executeQuery($sql);
                  $row = mysqli_num_rows($query);
                  while ($row = mysqli_fetch_assoc($query)): ?>
                  <tr>
                    <td name="cadastro" id="cadastro"><?=$row['cadastro']?></td>
                    <td><?=utf8_encode($row['nome'])?></td>
                    <td><?=utf8_encode($row['quantidade'])?></td>
                    <td><?=utf8_encode($row['soma'])?></td>
                    <td class="text-center"><button class="btn btn-primary" data-toggle="modal"
                      data-target=".bd-modal-ponto">Visualizar</button></td>
                  </tr> <?php
                  endwhile;
                  ?>
                  </tbody>
                </table>
              </div>
            </div>
          <?php endif;?>
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
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<!-- Footer --> <?php include '../menu/footer.php'; ?>
<!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>
<!-- Logout Modal--> <?php include '../menu/logoutmodal.php'; ?>
<!-- Logout Modal-->
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
</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Modal de Registro de Diárias -->
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
              <h3>Relatório de Diárias</h3>
            </div>
            <button class="btn btn-info" title="Imprimir" onclick="imprimirDiv('printableArea')"><i class="fas fa-print"></i></button>
            <?php
             if (isset($_GET['cad'])) :
              $selectRegistrosModal = $conn->executeQuery("SELECT * FROM usuario WHERE cadastro = {$_GET['cad']}");?>
              <?php
              $row = mysqli_num_rows($selectRegistrosModal);
              while ($row = mysqli_fetch_assoc($selectRegistrosModal)):?>
              <div id="printableArea" class="mt-3">
                <table>
                  <tr>
                    <th class="largura10 text-center" colspan="4">Dados do Colaborador</th>
                  </tr>
                  <tr>
                    <th class="largura10">Nome:</th>
                    <td><?=utf8_encode($row['nome'])?></td>
                    <th class="largura10">CPF:</th>
                    <td><?=utf8_encode($row['cpf'])?></td>
                  </tr>
                  <tr>
                    <th>Cadastro:</th>
                    <td><?=utf8_encode($row['cadastro'])?></td>
                    <th>RG:</th>
                    <td><?=utf8_encode($row['rg'])?></td>
                  </tr>
                  <tr>
                    <th>Cidade:</th>
                    <td><?=utf8_encode($row['cidade'])?></td>
                    <th>Bairro:</th>
                    <td><?=utf8_encode($row['bairro'])?></td>
                  </tr>
                  <tr>
                    <th>Cargo:</th>
                    <td><?=utf8_encode($row['tipo_usuario'])?></td>
                    <th>Obs:</th>
                    <td></td>
                  </tr>
                </table>
              <?php endwhile;?>
                <table class="mt-1">
                  <tr>
                    <th class="largura10 text-center" colspan="10">Relatório de Diárias</th>
                  </tr>
                  <tr class="subtitles">
                    <th colspan="2">Dia</th>
                    <th>Entrada</th>
                    <th>Tipo Diária</th>
                    <th>Saída</th>
                    <th>Valor Diaria</th>
                  </tr>
                    <?php
                    $selectRegistrosUnicos = $conn->executeQuery("SELECT SUM(dia.valor) as soma, rp.hora_inicio, rp.hora_fim, dia.nome as nome FROM registro_ponto rp JOIN usuario us ON us.usuario_id = rp.fk_usuario JOIN diarias dia on dia.id = rp.fk_diaria WHERE us.cadastro = {$_GET['cad']} GROUP BY rp.hora_inicio");

                    $rowHoras = mysqli_num_rows($selectRegistrosUnicos);
                    while ($rowHoras = mysqli_fetch_assoc($selectRegistrosUnicos)):?>
                  <tr class="subtitles">
                    <th class="largura02">
                    <?php
                    setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                    echo ucfirst( utf8_encode( strftime("%A", strtotime($rowHoras['hora_inicio']))))?>
                    </th>
                    <th class="largura02">
                      <?php echo strftime("%d", strtotime($rowHoras['hora_inicio']))?>
                    </th>
                    <th><?=strftime("%R", strtotime($rowHoras['hora_inicio']))?></th>
                    <th><?=utf8_encode($rowHoras['nome'])?></th>
                    <th><?=strftime("%R", strtotime($rowHoras['hora_fim']))?></th>
                    <th><?=$rowHoras['soma']?></th>
                  </tr>
                  <?php endwhile; ?>
                  <tr class="subtitles">
                    <th colspan="4"></th>
                    <th>Valor Total</th>
                    <?php
                    $sqlSoma = $conn->executeQuery ("SELECT COUNT(rp.fk_diaria) as quantidade, SUM(dia.valor) as soma FROM registro_ponto rp JOIN diarias dia ON dia.id = rp.fk_diaria JOIN usuario usu on usu.usuario_id = rp.fk_usuario WHERE usu.cadastro = {$_GET['cad']} AND hora_inicio BETWEEN '{$_GET['dtini']}' AND '{$_GET['dtfin']}'");
                    $rowSoma = mysqli_num_rows($sqlSoma);
                    while($soma = mysqli_fetch_assoc($sqlSoma)):?>
                    <th><?=$soma['soma']?></th>
                  </tr>
                </table>
                <br>
                <div class="text-center"> ______________________<br> Assinatura </div>
              </div>
            <?php endwhile;?>
            <?php endif;?>
            <button type="button" title="Fechar" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>
  </div>

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
