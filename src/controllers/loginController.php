<?php
require_once ('../classes/Login.class.php');
require_once ('../classes/Site.class.php');
require_once ('../classes/PHPMailer.class.php'); //chama a classe de onde você a colocou.


$login = New Login;
$conn = New Site;

if (isset($_POST['btnLogar'])) {
    $login->setUser($_POST['inputUser']);
    $login->setSenha(hash('sha512', $_POST['inputSenha']));
    $login->Logar();


} else if (isset($_POST['logout'])) {
    $login->Logout();


} else if (isset($_POST['btnForgotpass'])) {
    $user = $_POST['inputUser'];
    $email = $_POST['inputEmail'];
    //Buscar no banco se este usuario confere com esse e-mail
    $query = $conn->executeQuery("SELECT * FROM usuario WHERE usuario = '{$user}' AND email = '{$email}'");
    $rows = mysqli_num_rows($query);

    if ($rows > 0) {



        //        //Email e Usuario Encontrados
        $token = hash('sha256', $email+time());
        $link = "localhost/TCC-POJIGO/resetpassword.php?token=".$token;

        $conn->executeQuery("UPDATE usuario SET token_recuperacao = '{$token}' WHERE email = '{$email}'");

        $mail = new PHPMailer(); // instancia a classe PHPMailer


//configuração do email
        DEFINE("USUARIO","pojigo.tk@gmail.com");
        DEFINE("SENHA","entra21@Blusoft");
        //$mail->SMTPDebug = 3;
        $mail->isSMTP();
        $mail->CharSet = "UTF-8"; //Configurando UTF-8
        $mail->Encoding = "base64"; //Codificação do Email
        $mail->Port = '465'; //porta usada pelo email.
        $mail->Host = 'smtp.gmail.com'; //Servidor SMTP utilizado para enviar o email
        $mail->IsHTML(true); //Forçando o email a ler o corpo em HTML
        $mail->SMTPSecure = 'ssl'; //Uso de Certificado

//configuração do usuário do email
        $mail->SMTPAuth = true; // Ativando Autenticação
        $mail->Username = USUARIO; // usuario servidor.
        $mail->Password = SENHA; // senha do servidor.


// configuração do email a ver enviado.
        $mail->SetFrom("pojigo.tk@gmail.com","Pojigo", 0);
        $mail->FromName = "POJIGO - Rotas & Registros";

        $mail->addAddress($email); // email do destinatario.


        // Compo E-mail
        $arquivo = "
  <!doctype html >
<html lang = \"en\" >
<head >
  <title > Title</title >
  <!--Required meta tags-->
  <meta charset = \"utf-8\" >
  <meta name = \"viewport\" content = \"width=device-width, initial-scale=1, shrink-to-fit=no\" >

  <!--Bootstrap CSS-->
  <link rel = \"stylesheet\" href = \"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css\" integrity = \"sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T\" crossorigin = \"anonymous\" >
</head >
<body >
  <div class=\"container\">
    <table class=\"table text-center\">

      <tr>
        <td><h2>Recuperação de Senha - POJIGO</h2></td>
      </tr>
      <tr>
        <td>Você enviou um email para alteração de senha caso não seja você desconsidere este email.</td>
      </tr>
      <tr>
        <td>Se for realmente você clique no link para redefinir a senha:<br><b><a>https://$link</a></b></td>
      </tr>

    </table>
  </div>
  <!--Optional JavaScript-->
  <!--jQuery first, then Popper . js, then Bootstrap JS-->
  <script src = \"https://code.jquery.com/jquery-3.3.1.slim.min.js\" integrity = \"sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo\" crossorigin = \"anonymous\" ></script >
  <script src = \"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js\" integrity = \"sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1\" crossorigin = \"anonymous\" ></script >
  <script src = \"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js\" integrity = \"sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM\" crossorigin = \"anonymous\" ></script >
</body >
</html >
  ";


        $mail->Subject = "Recuperação de Senha - POJIGO.";
        $mail->Body = $arquivo;

        if(!$mail->Send()){
            echo "Erro ao enviar Email:" . $mail->ErrorInfo;
        }else{
            echo "E-mail Enviado";
            //Email enviado com sucesso, verifique sua caixa de entrada
        }


    }

    //Usuario ou Email não conferem

}
