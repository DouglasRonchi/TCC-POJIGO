<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Pojigo - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/styleLogin.css" rel="stylesheet">

</head>
<body>

  <form action="index.php" class="login-form">
    <div class="text-center logologin">
      <h1>POJIGO</h1>
      <small>Rotas & Registros</small>
      <hr>
      <small>Digite seu usuário e seu e-mail e enviaremos para você um link para redefinição de senha.</small>

    </div>


    <div class="txtb">
      <input type="text" id="inputUser" name="inputUser">
      <span data-placeholder="Usuário"></span>
    </div>

    <div class="txtb">
      <input type="email" id="inputEmail" name="inputEmail">
      <span data-placeholder="E-mail"></span>
    </div>

    <input type="submit" class="logbtn btn btn-primary" value="Redefinir Senha">

    <div class="bottom-text">
      <a href="login.php">Lembrou? Logar!</a>
    </div>

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
    $(".txtb input").on("focus",function(){
      $(this).addClass("focus");
    });

    $(".txtb input").on("blur",function(){
      if($(this).val() == "")
        $(this).removeClass("focus");
    });

  </script>
</body>
</html>
