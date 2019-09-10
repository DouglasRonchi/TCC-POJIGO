<?php
require_once '../../classes/Autoload.class.php';
$conn = new Site;
$login = new Login;
$login->VerificarLogin();
$usuario = New Usuario;
if (isset($_GET['id'])) {
    $selectUsuario = $conn->executeQuery("SELECT * FROM usuario WHERE usuario_id = {$_GET['id']}");
    $selectUsuariosRows = mysqli_fetch_assoc($selectUsuario);
}
    
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pojigo - Cadastro Usuarios</title>

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
                    <h1 class="h3 mb-4 text-gray-800">Cadastro de Usuários</h1>


                    <form action="../../controllers/usuariosController.php<?= (isset($_GET['editar'])) ? "?id=".$_GET['id'] : ''; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputNome">Nome</label>
                                <input type="text" class="form-control" id="inputNome" name="inputNome"
                                placeholder="Digite o seu nome completo."
                                value="<?= (isset($_GET['editar'])) ? $selectUsuariosRows['nome'] : ''; ?>">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputFoto">Foto de Perfil</label>
                                <input type="file" class="form-control-file" name="inputFoto" id="inputFoto" value="arquivos[]">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputUsuario">Usuário</label>
                                <input type="text" class="form-control" id="inputUsuario" name="inputUsuario"
                                placeholder="Digite seu nome para usuário" value="<?= (isset($_GET['editar'])) ? $selectUsuariosRows['usuario'] : ''; ?>">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputTelefone">Telefone</label>
                                <input type="number" class="form-control" id="inputTelefone" name="inputTelefone"
                                placeholder="" value="<?= (isset($_GET['editar'])) ? $selectUsuariosRows['telefone'] : ''; ?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail">E-mail</label>
                                <input type="text" class="form-control" id="inputEmail" name="inputEmail"
                                placeholder="Ex: blabla@blabla.com" value="<?= (isset($_GET['editar'])) ? $selectUsuariosRows['email'] : ''; ?>">
                            </div>
                            <?php if (!isset($_GET['editar'])): ?>
                            <div class="form-group col-md-6">
                                <label for="inputSenha">Senha</label>
                                <input type="password" class="form-control" id="inputSenha" name="inputSenha"
                                placeholder="Digite sua senha" value="<?= (isset($_GET['editar'])) ? $selectUsuariosRows['senha'] : ''; ?>">
                            </div>
                            <?php else: ?>

                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="inputEndereco">Endereço</label>
                            <input type="text" class="form-control" id="inputEndereco" name="inputEndereco"
                            placeholder="Ex: Rua Blumenau, 123" value="<?= (isset($_GET['editar'])) ? $selectUsuariosRows['endereco'] : ''; ?>">
                        </div>

                        <div class="form-group">
                            <label for="inputBairro">Bairro</label>
                            <input type="text" class="form-control" id="inputBairro" name="inputBairro"
                            placeholder="Ex: Velha" value="<?= (isset($_GET['editar'])) ? $selectUsuariosRows['bairro'] : ''; ?>">
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCidade">Cidade</label>
                                <input type="text" class="form-control" id="inputCidade" name="inputCidade" value="<?= (isset($_GET['editar'])) ? $selectUsuariosRows['cidade'] : ''; ?>">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputEstado">Estado</label>
                                <select id="inputEstado" class="form-control" name="inputEstado">
                                    <option selected>Procurar...</option>
                                    <option value="1">AC</option>
                                    <option value="2">AL</option>
                                    <option value="3">AP</option>
                                    <option value="4">AM</option>
                                    <option value="5">BA</option>
                                    <option value="6">CE</option>
                                    <option value="7">DF</option>
                                    <option value="8">ES</option>
                                    <option value="9">GO</option>
                                    <option value="10">MA</option>
                                    <option value="11">MT</option>
                                    <option value="12">MS</option>
                                    <option value="13">MG</option>
                                    <option value="14">PA</option>
                                    <option value="15">PB</option>
                                    <option value="16">PR</option>
                                    <option value="17">PE</option>
                                    <option value="18">PI</option>
                                    <option value="19">RJ</option>
                                    <option value="20">RN</option>
                                    <option value="21">RS</option>
                                    <option value="22">RO</option>
                                    <option value="23">RR</option>
                                    <option value="24">SC</option>
                                    <option value="25">SP</option>
                                    <option value="26">SE</option>
                                    <option value="27">TO</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputRG">RG</label>
                                <input type="number" class="form-control" id="inputRG" name="inputRG" placeholder="" value="<?= (isset($_GET['editar'])) ? $selectUsuariosRows['rg'] : ''; ?>",>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputCPF">CPF</label>
                                <input type="number" class="form-control" id="inputCPF" name="inputCPF" placeholder="" value="<?= (isset($_GET['editar'])) ? $selectUsuariosRows['cpf'] : ''; ?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputNascimento">Data de Nascimento</label>
                                <input type="date" data-mask="00/00/0000" maxlength="10" autocomplete="off" class="form-control data-mask" id="inputNascimento" name="inputNascimento" value="<?= (isset($_GET['editar'])) ? $selectUsuariosRows['data_nascimento'] : ''; ?>">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputAdmissao">Data de Admissão</label>
                                <input type="date" class="form-control" id="inputAdmissao" name="inputAdmissao" value="<?= (isset($_GET['editar'])) ? $selectUsuariosRows['data_admissao'] : ''; ?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCNH">CNH</label>
                                <input type="number" class="form-control" id="inputCNH" name="inputCNH" placeholder="" value="<?= (isset($_GET['editar'])) ? $selectUsuariosRows['cnh'] : ''; ?>">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputVencimentoCNH">Vencimento CNH</label>
                                <input type="date" class="form-control" id="inputVencimentoCNH" name="inputVencimentoCNH" value="<?= (isset($_GET['editar'])) ? $selectUsuariosRows['venc_cnh'] : ''; ?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputMOPP">MOPP</label>
                                <input type="number" class="form-control" id="inputMOPP" name="inputMOPP" placeholder="" value="<?= (isset($_GET['editar'])) ? $selectUsuariosRows['mopp'] : ''; ?>">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputVencimentoMOPP">Vencimento MOPP</label>
                                <input type="date" class="form-control" id="inputVencimentoMOPP" name="inputVencimentoMOPP" value="<?= (isset($_GET['editar'])) ? $selectUsuariosRows['venc_mopp'] : ''; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputTipoUsuario">Tipo de usuário</label>
                            <select id="inputTipoUsuario" class="form-control" name="inputTipoUsuario">
                                <option selected>Selecione...</option>
                                <option value="1">Administrador</option>
                                <option value="2">Gestor</option>
                                <option value="3">Motorista</option>
                            </select>
                        </div>
                        <?php 
                        if(isset($_GET['editar'])):
                            ?>
                            <button class="btn btn-primary" name="btnAtualizar" type="submit">Atualizar</button>
                            <?php 
                        else:
                            ?>
                            <button class="btn btn-primary" name="btnSalvar" type="submit">Salvar</button>
                         <a class="btn btn-secondary" href="dashboard.php" role="button">Voltar</a>
                            <?php 
                        endif;
                        ?>
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
