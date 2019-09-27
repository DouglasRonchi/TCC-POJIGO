<?php
require_once 'src/classes/Autoload.class.php';
$conn = new Site;
$login = new Login;

if (!isset($_GET['token'])){
    //exige um token
    header("Location: index.php");
}else{
    $result = mysqli_fetch_assoc($conn->executeQuery("SELECT email,token_recuperacao FROM usuario WHERE token_recuperacao = '{$_GET['token']}'"));
    $email = $result['email'];
    if (!$_GET['token'] == $result['token_recuperacao']){
        header("Location: index.php");
    } else if (isset($_POST['inputNewPassword'])){

        $conn->executeQuery("UPDATE usuario SET senha = {$_POST['inputNewPassword']} WHERE email = {$email}");

    }

}



?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pojigo - Redefinir Senha</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/styleLogin.css" rel="stylesheet">

</head>
<body>

<form action="#" class="login-form" method="post">
    <div class="text-center logologin">
        <h1>POJIGO</h1>
        <small>Rotas & Registros</small>
        <hr>
        <small>Digite a nova senha.</small>

    </div>

    <div class="txtb">
        <input type="password" id="inputNewPassword" name="inputNewPassword">
        <span data-placeholder="Nova Senha"></span>
    </div>

    <div class="txtb">
        <input type="password" id="inputNewPasswordConf" name="inputNewPasswordConf">
        <span data-placeholder="Confirmação Nova Senha"></span>
    </div>

    <input type="submit" class="logbtn btn btn-primary" value="Confirmar">


</form>


<!-- Logout Modal-->
<?php include 'src/pages/menu/logoutmodal.php'; ?>

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
