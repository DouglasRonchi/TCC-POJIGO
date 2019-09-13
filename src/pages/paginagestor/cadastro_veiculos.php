<?php
require_once '../../classes/Autoload.class.php';
$conn = New Site;
$login = new Login;
$login->VerificarLogin();
$veiculo = New Veiculo;
if(isset($_GET['id'])){
    $selectVeiculo = $conn->executeQuery("SELECT * FROM veiculos WHERE id = {$_GET['id']}");
    $selectVeiculoRows = mysqli_fetch_assoc($selectVeiculo);

    if (isset($_GET['editar'])){
        $query = $conn->executeQuery("SELECT * FROM modelo_veiculo WHERE id = {$selectVeiculoRows['fk_modelo']}");
        $modeloRow = mysqli_num_rows($query);
        while ($modeloRow = mysqli_fetch_assoc($query)){
            $fk_marca = $modeloRow['fk_marca'];
            $idModelo = $modeloRow['id'];
            $modeloModelo = $modeloRow['modelo'];
        }
    }



}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pojigo - Cadastro Veículos</title>

    <!-- Custom fonts for this template-->
    <link href="../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

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
                                <input type="text" class="form-control" id="inputFrota" name="inputFrota"
                                value="<?= (isset($_GET['editar']))? $selectVeiculoRows['frota'] :''; ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputMarca">Marca&nbsp;</label>
                                <a style="cursor: pointer" href="cadastro_novaMarca.php" class="text-decoration-none btn-sm text-muted">Nova marca/modelo</a>
                                <select class="form-control" name="inputMarca" id="inputMarca">
                                    <option>Selecione uma Marca</option>
                                    <?php
                                    $selectMarca = $conn->executeQuery("SELECT * FROM marca_veiculo");
                                    $row = mysqli_num_rows($selectMarca);
                                    if (isset($_GET['editar'])){
                                        $queryMarca = $conn->executeQuery("SELECT * FROM marca_veiculo WHERE id = {$fk_marca}");
                                        $marcaRow = mysqli_num_rows($queryMarca);
                                        while ($marcaRow = mysqli_fetch_assoc($queryMarca)){
                                            echo "<option value='".$fk_marca."' selected>".$marcaRow['marca']."</option>";
                                        }
                                    }
                                    while ($row = mysqli_fetch_assoc($selectMarca)) {
                                        echo "<option value='" . $row['id'] . "' >" . $row['marca'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputModelo">Modelo</label>
                                <select class="form-control" name="inputModelo" id="inputModelo">
                                    <option>Selecione um Modelo</option>
                                    <?php
                                    if (isset($_GET['editar'])){
                                        echo "<option value='".$idModelo."' selected>".$modeloModelo."</option>";
                                    }

                                    ?>
                                </select>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputPlaca">Placa</label>
                                <input type="text" class="form-control" id="inputPlaca" name="inputPlaca"
                                value="<?= (isset($_GET['editar']))? $selectVeiculoRows['placa'] :''; ?>">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputChassi">Chassi</label>
                                <input type="text" class="form-control" id="inputChassi" name="inputChassi"
                                value="<?= (isset($_GET['editar']))? $selectVeiculoRows['chassi'] :''; ?>">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputRenavam">Renavam</label>
                                <input type="text" class="form-control" id="inputRenavam" name="inputRenavam"
                                value="<?= (isset($_GET['editar']))? $selectVeiculoRows['renavam'] :''; ?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputDataDeFabricacao">Ano de Fabricação</label>
                                <input type="number" class="form-control" id="inputDataDeFabricacao"
                                name="inputDataDeFabricacao"
                                value="<?= (isset($_GET['editar']))? $selectVeiculoRows['ano_fab'] :''; ?>">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputAnoModelo">Ano do Modelo</label>
                                <input type="number" class="form-control" id="inputAnoModelo" name="inputAnoModelo"
                                value="<?= (isset($_GET['editar']))? $selectVeiculoRows['ano_mod'] :''; ?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCapacidadeDeCarga">Capacidade de Carga</label>
                                <input type="number" class="form-control" id="inputCapacidadeDeCarga"
                                name="inputCapacidadeDeCarga"
                                value="<?= (isset($_GET['editar']))? $selectVeiculoRows['capacidade_carga'] :''; ?>">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputCapacidadeDeTanque">Capacidade de Tanque</label>
                                <input type="number" class="form-control" id="inputCapacidadeDeTanque"
                                name="inputCapacidadeDeTanque"
                                value="<?= (isset($_GET['editar']))? $selectVeiculoRows['capacidade_tanque'] :''; ?>">
                            </div>
                        </div>

                        <button type="submit" name="btnSalvarNovo" class="btn btn-primary">Salvar</button>
                        <?php
                        if (isset($_GET['id'])) :?>
                        <a class="btn btn-secondary" href="relatorio_veiculos.php" role="button">Voltar</a>
                       <?php endif; ?> 
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
                data: {id: id},
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

</body>

</html>
