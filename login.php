<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/styleLogin.css" rel="stylesheet">
    <!-- Favicon icon site -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>


    <title>Pojigo - Login</title>

</head>
<body>

<form action="src/controllers/loginController.php" class="login-form" method="post">
    <div class="text-center logologin">
        <h1>POJIGO</h1>
        <small>Rotas & Registros</small>
    </div>

    <?php
    if (isset($_COOKIE['recuperacaoSucesso'])): ?>
        <div class="alert alert-success alert-dismissible animated--grow-in fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            Senha alterada com sucesso!
        </div>
    <?php endif; ?>



    <?php
    if (isset($_COOKIE['emailenviado']) && $_COOKIE['emailenviado'] == 'true'): ?>
        <div class="alert alert-warning alert-dismissible animated--grow-in fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            Foi enviado para o e-mail cadastrado, o link para redefinir a sua senha, verifique sua caixa de e-mail.
        </div>
    <?php endif; ?>

    <?php
    if (isset($_COOKIE['tokeninvalido']) && $_COOKIE['tokeninvalido'] == 'true'): ?>
        <div class="alert alert-warning alert-dismissible animated--grow-in fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            E-mail inválido ou link de recuperação expirado/inválido.
        </div>
    <?php endif; ?>


    <?php if (isset($_COOKIE['inv'])): ?>
        <div class="alert alert-danger alert-dismissible animated--grow-in fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Usuário ou senha Inválidos.</strong>
        </div>
    <?php endif; ?>

    <div class="txtb">
        <input type="text" id="inputUser" name="inputUser">
        <span data-placeholder="Usuário"></span>
    </div>


    <div class="txtb">
        <input type="password" id="inputSenha" name="inputSenha">
        <span data-placeholder="Senha"></span>
    </div>

    <input type="submit" class="logbtn btn btn-primary" name="btnLogar" value="Entrar">

    <div class="bottom-text">
        <a href="forgotpassword.php">Esqueçeu a senha?</a>
    </div>

</form>


<!-- Logout Modal-->

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>


<script type="text/javascript">
    $(".txtb input").on("focus", function () {
        $(this).addClass("focus");
    });

    $(".txtb input").on("blur", function () {
        if ($(this).val() == "")
            $(this).removeClass("focus");
    });
</script>
</body>
</html>
