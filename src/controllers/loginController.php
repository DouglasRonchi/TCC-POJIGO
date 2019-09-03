<?php
require_once '../classes/Autoload.class.php';

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
        //Email e Usuario Encontrados
        $token = hash('sha256', $email);
        $link = "localhost/TCC-POJIGO/resetpassword.php?tok=".$token;

        // Please specify your Mail Server - Example: mail.yourdomain.com.
        ini_set("SMTP","mail.hotmail.com");

        // Please specify an SMTP Number 25 and 8889 are valid SMTP Ports.
        ini_set("smtp_port","25");

        // Please specify the return address to use
        ini_set('sendmail_from', 'douglasronchi02@hotmail.com');


        // Compo E-mail
        $arquivo = "
  <style type='text/css'>
  body {
  margin:0px;
  font-family:Verdane;
  font-size:12px;
  color: #666666;
  }
  a{
  color: #666666;
  text-decoration: none;
  }
  a:hover {
  color: #FF0000;
  text-decoration: none;
  }
  </style>
    <html>
        <table width='510' border='1' cellpadding='1' cellspacing='1' bgcolor='#CCCCCC'>
            <tr>
              <td>
  <tr>
                 <td width='500'>Você enviou um email para alteração de senha caso não seja você desconsidere este email.</td>
                </tr>
                <tr>
                  <td width='320'>Se for realmente você clique no link para redefinir a senha:<b>$link</b></td>
     </tr>
            </td>
          </tr>  
          <tr>
          </tr>
        </table>
    </html>
  ";

//enviar

// emails para quem será enviado o formulário
        $emailenviar = $email;
        $destino = $emailenviar;
        $assunto = "Redefinição de Senha";

// É necessário indicar que o formato do e-mail é html
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: $nome <$email>';
//$headers .= "Bcc: $EmailPadrao\r\n";

        $enviaremail = mail($destino, $assunto, $arquivo, $headers);
        if ($enviaremail) {
            $mgm = "E-MAIL ENVIADO COM SUCESSO! <br> O link será enviado para o e-mail fornecido no formulário";
            echo " <meta http-equiv='refresh' content='10;URL=contato.php'>";
        } else {
            $mgm = "ERRO AO ENVIAR E-MAIL!";
            echo "";
        }

    } else {
        //Email e Usuario Inválidos
        echo "Não Deu Boa";
    }

    //Enviar email para recuperar a senha com link para outra página com um token de redefinição

}