<?php
// verificar se o dispositivo é móvel ou desktop
$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
$palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
$berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
$ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
$symbian = strpos($_SERVER['HTTP_USER_AGENT'],"Symbian");
$windowsphone = strpos($_SERVER['HTTP_USER_AGENT'],"Windows Phone");
 
if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian || $windowsphone == true) {
   $dispositivo = "mobile";
}

else { $dispositivo = "computador";}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <!-- Custom fonts for this template-->
    <link href="../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../../css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../../css/institucional.css">

    <title>Pojigo - Início</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Favicon icon site -->
    <link rel="shortcut icon" type="image/x-icon" href="../../../favicon.ico"/>

</head>

<body id="page-top" class="sidebar-toggled">

    <div id="list-example" class="list-group">

        <!-- Begin Page Content -->
        <nav class="navbar navbar-expand-lg navbar-default">
            <a class="navbar-brand text-primary"><img class="mr-2"
              src="../../../img/institucional/inicial_icons/navicon.png" height="30"
              width="30"><strong class="titlenav">Pojigo</strong></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
                <span class="navbar-toggler-icon mr-2">
                    <svg class="ham hamRotate ham4" viewBox="0 0 100 100" width="60" onclick="this.classList.toggle('active')">
                        <path
                        class="line top"
                        d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20"/>
                        <path
                        class="line middle"
                        d="m 70,50 h -40"/>
                        <path
                        class="line bottom"
                        d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20"/>
                    </svg>

                </span>
            </button>

            <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
                <div class="navbar-nav mr-auto">
                    <div class="navbar-nav mr-auto">
                        <a class="nav-item nav-link text-white menulink" href="#"><strong>Home</strong><span class="sr-only">(current)</span></a>
                        <a href="#quemsomos" class="nav-item nav-link text-white btnscroll menulink"><strong>Quem somos</strong></a>
                        <a href="#faleconosco" class="nav-item nav-link text-white btnscroll menulink"><strong>Fale conosco</strong></a>

                    </div>
                </div>
                <form class="form-inline my-2 my-lg-0">
                  <a href="../../../login.php" class="btn btn-outline-success my-2 my-sm-0 btnentrar">Entrar</a>
              </form>
          </div>
      </nav>


      <div id="carouselExampleCaptions" class="carousel slide sombra" data-ride="carousel" data-wrap="true">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../../../img/institucional/monitoramento.jpg" class="d-block w-100 imgcarousel" 
                height="550">
                <div class="carousel-caption d-none d-md-block mb-4">
                    <H3><strong>MONITORAMENTO</strong></H3>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../../../img/institucional/rastreamento.png" class="d-block w-100 imgcarousel" 
                height="550">
                <div class="carousel-caption d-none d-md-block mb-4">
                    <H3><strong>RASTREAMENTO</strong></H3>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../../../img/institucional/cnh.jpg" class="d-block w-100 imgcarousel"  height="550">
                <div class="carousel-caption d-none d-md-block mb-4">
                    <H3><strong>CNH E MOPP</strong></H3>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon carouselicon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon carouselicon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <br><br>
    <div class="container-fluid">


        <center>
            <h1>CONECTANDO O VEÍCULO AO SEU NEGÓCIO</h1>
            <p>VOCÊ NÃO PRECISA TER UM GERENTE DE FROTAS PARA UTILIZAR O POJIGO.<br>
                SIMPLES DE USAR, ATRAVÉS DE UM CONJUNTO COMPLETO DE FUNÇÕES:<br>
                RASTREAMENTO, MONITORAMENTO, CONTROLE DE CNH E MOPP,<br>
                GERENCIAMENTO DE ENTREGAS E SERVIÇOS.<br>
                <strong>TUDO INTEGRADO EM UMA ÚNICA PLATAFORMA.</strong>
            </p>
        </center>

        <br><br><br>


        <div class="row rowcard">
            <div class="card col-lg col-sm-12 m-lg-2 mb-3 text-center sombra" id="card" style="width: 18rem;">
                <div class="col mt-4"><img class="imgcard" src="../../../img/institucional/monitoramento1.png" title="MONITORAMENTO"></div>
                <div class="card-body m-3">
                    <h3 class="card-title titlecard">MONITORAMENTO</h3>
                    <center>
                        <a class="btn bg-dark btnscroll col-3 mt-4 btncard" href="#monitoramento"><img height="30" width="30" src="../../../img/institucional/inicial_icons/down.gif"></a>
                    </center>
                </div>
            </div>

            <div class="card col-lg col-sm-12 m-lg-2 mb-3 text-center sombra" id="card" style="width: 18rem;">
                <div class="col mt-4"><img class="imgcard" src="../../../img/institucional/rastreamento1.jpg" title="RASTREAMENTO">
                </div>
                <div class="card-body m-3">
                    <h3 class="card-title titlecard">RASTREAMENTO</h3>

                    <center>
                        <a class="btn bg-dark btnscroll col-3 mt-4 btncard" href="#rastreamento"><img height="30" width="30" src="../../../img/institucional/inicial_icons/down.gif"></a>
                    </center>
                </div>
            </div>

            <div class="card col-lg col-sm-12 m-lg-2 mb-3 text-center sombra" id="card" style="width: 18rem;">
                <div class="col mt-4"><img class="imgcard" src="../../../img/institucional/cnh1.jpg" title="CNH E MOPP"></div>
                <div class="card-body m-3">
                    <h3 class="card-title titlecard">CNH e MOPP</h3>
                    <center>
                        <a class="btn bg-dark btnscroll col-3 mt-4 btncard" href="#cnhemopp"><img height="30" width="30" src="../../../img/institucional/inicial_icons/down.gif"></a>
                    </center>
                </div>
            </div>
        </div>

    </div>
</div>

<br><br><br><br><br id="rastreamento"><br><br><br>

<center>

    <div class="col-12">
        <h4 class="text-center mb-4 titlegif">RASTREAMENTO</h4>
        <div class="mb-5">
            <img class="sombra gif" title="RASTREAMENTO" style="border-radius: 15px;" src="../../../img/institucional/rastreagif.gif">
        </div>
        <h5 class="mb-5 text-center descricao"><strong>Rastreie suas frotas para uma melhor precisão em suas entregas.</strong></h5>
        <a class="btn btn-primary btngif" href="../../../login.php" role="button">EXPERIMENTE AGORA</a>
    </div>

    <br><br><br id="monitoramento"><br><br><br>

    <div class="col-12">
        <h4 class="text-center mb-4 titlegif">MONITORAMENTO</h4>
        <div class="mb-5">
            <img class="sombra gif" style="border-radius: 15px;" title="MONITORAMENTO" src="../../../img/institucional/monitorgif.gif"
            width="600" height="350">
        </div>
        <h5 class="mb-5 text-center descricao"><strong>Monitore seus motoristas, tenha controle e relatórios de horários, diárias entre outros.</strong></h5>
        <a class="btn btn-primary btngif" href="../../../login.php" role="button">EXPERIMENTE AGORA</a>
    </div>

    <br><br><br id="cnhemopp"><br><br><br>

    <div class="col-12">
        <h4 class="text-center mb-4 titlegif">CNH E MOPP</h4>
        <div class="mb-5">
            <img class="sombra gif" style="border-radius: 15px;" title="CNH E MOPP" src="../../../img/institucional/cnhgif.gif" width="600"
            height="350">
        </div>
        <h5 class="mb-5 text-center descricao"><strong>Garanta a segurança em sua empresa.
        Avisos sobre vencimento de CNH e MOPP serão enviados aos motoristas e gestores.</strong></h5>
        <a class="btn btn-primary btngif" href="../../../login.php" role="button">EXPERIMENTE AGORA</a>
    </div>

    <br id="quemsomos"><br><br><br><br>

    <div class="container-fluid pt-5 divfotos bg-indigo">
        <h2 class="card-title text-center text-white mb-5 titleperfil">QUEM SOMOS ?</h2>

        <div class="row pt-3 pb-5 rowperfil">

            <div class="card col-lg col-sm-10 border-0 divperfil">
                <img class="rounded-circle mt-2 col foto" title="Douglas" src="../../../img/institucional/perfil/douglas.png" alt="Imagem de capa do card">
                <div class="card-body text-center">
                    <h4 class="card-title text-white nomeperfil">Douglas Ronchi</h4>
                    <?php if ($dispositivo == "computador") { ?>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalDouglas">
                        Conheça
                    </button>
                <?php } elseif ($dispoditivo == "mobile") {?>
                    <!-- The social media icon bar -->
                    <div class="icon-bar text-center iconesico">
                        <a href="https://www.facebook.com/douglas.ronchi" class="facebook mr-3" target="_blank"><i class="fa fa-facebook"></i></a> 
                        <a href="https://twitter.com/douglasronchi" class="twitter mr-3" target="_blank"><i class="fa fa-twitter"></i></a> 
                        <a href="https://www.instagram.com/douglasronchi" class="instagram mr-3" target="_blank"><i class="fab fa-instagram"></i></a> 
                        <a href="https://github.com/DouglasRonchi" class="github mr-3" target="_blank"><i class="fab fa-github"></i></a> 
                        <a href="https://www.linkedin.com/in/douglas-ronchi-7b5a2b134" class="linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                <?php } ?>
                </div>
            </div>

            <div class="card col-lg col-sm-10 border-0 divperfil">
                <img class="rounded-circle mt-2 col foto" src="../../../img/institucional/perfil/paloma.jpg" title="Paloma" 
                alt="Imagem de capa do card">
                <div class="card-body text-center">
                    <h4 class="card-title text-white nomeperfil">Paloma Teply</h4>
                    <?php if ($dispositivo == "computador") { ?>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalPaloma">
                        Conheça
                    </button>
                <?php } elseif ($dispoditivo == "mobile") {?>
                    <!-- The social media icon bar -->
                    <div class="icon-bar text-center iconesico">
                       <a href="https://www.facebook.com/paloma.teply" class="facebook mr-3" target="_blank"><i class="fa fa-facebook"></i></a> 
                       <a href="https://twitter.com/TeplyPaloma" class="twitter mr-3" target="_blank"><i class="fa fa-twitter"></i></a> 
                       <a href="https://www.instagram.com/teply.p" class="instagram mr-3" target="_blank"><i class="fab fa-instagram"></i></a> 
                       <a href="https://github.com/Paloma-teply" class="github mr-3" target="_blank"><i class="fab fa-github"></i></a> 
                       <a href="https://www.linkedin.com/in/paloma-teply-b25970190" class="linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
                   </div>
               <?php } ?>
                </div>
            </div>

            <div class="card col-lg col-sm-10 border-0 divperfil">
                <img class="rounded-circle mt-2 col foto" src="../../../img/institucional/perfil/giovane.jpg" title="Geovane" 
                alt="Imagem de capa do card">
                <div class="card-body text-center">
                    <h4 class="card-title text-white nomeperfil">Geovane Duarte</h4>
                    <?php if ($dispositivo == "computador") { ?>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalGeovane">
                        Conheça
                    </button>
                <?php } elseif ($dispoditivo == "mobile") {?>
                    <!-- The social media icon bar -->
                    <div class="icon-bar text-center iconesico">
                       <a href="https://www.facebook.com/geovane.duarte.7359" class="facebook mr-3" target="_blank"><i class="fa fa-facebook"></i></a> 
                       <a href="" class="twitter mr-3" target="_blank"><i class="fa fa-twitter"></i></a> 
                       <a href="" class="instagram mr-3" target="_blank"><i class="fab fa-instagram"></i></a> 
                       <a href="https://github.com/Geovane22" class="github mr-3" target="_blank"><i class="fab fa-github"></i></a> 
                       <a href="https://www.linkedin.com/in/geovane-duarte-da-silva-3bb387194" class="linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
                   </div>
               <?php } ?>
                </div>
            </div>

            <div class="card col-lg col-sm-10 border-0 divperfil">
                <img class="rounded-circle mt-2 col foto" src="../../../img/institucional/perfil/dauana.jpg" alt="Imagem de capa do card" title="Dauana">
                <div class="card-body text-center">
                    <h4 class="card-title text-white nomeperfil">Dauana Severo</h4>
                    <?php if ($dispositivo == "computador") { ?>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalDauana">
                        Conheça
                    </button>
                <?php } elseif ($dispoditivo == "mobile") {?>
                    <!-- The social media icon bar -->
                    <div class="icon-bar text-center iconesico">
                       <a href="https://www.facebook.com/dauana.severo" class="facebook mr-3" target="_blank"><i class="fa fa-facebook"></i></a> 
                       <a href="" class="twitter mr-3" target="_blank"><i class="fa fa-twitter"></i></a> 
                       <a href="https://www.instagram.com/dauanasvro" class="instagram mr-3" target="_blank"><i class="fab fa-instagram"></i></a> 
                       <a href="https://github.com/dauanaana" class="github mr-3" target="_blank"><i class="fab fa-github"></i></a> 
                       <a href="https://www.linkedin.com/in/dauana-severo-bb152a18a" class="linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
                   </div>
               <?php } ?>
                </div>
            </div>

            <div class="card col-lg col-sm-10 border-0 divperfil">
                <img class="rounded-circle mt-2 col foto" src="../../../img/institucional/perfil/jonas.png" alt="Imagem de capa do card" title="Jonas">
                <div class="card-body text-center">
                    <h4 class="card-title text-white nomeperfil">Jonas Antunes</h4>
                    <?php if ($dispositivo == "computador") { ?>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalJonas">
                        Conheça
                    </button>
                <?php } elseif ($dispoditivo == "mobile") {?>
                    <!-- The social media icon bar -->
                    <div class="icon-bar text-center iconesico">
                        <a href="https://www.facebook.com/people/Jonas-Antunes/100012847776542" class="facebook mr-3" target="_blank"><i class="fa fa-facebook"></i></a> 
                        <a href="https://twitter.com/JonasAn14960845" class="twitter mr-3" target="_blank"><i class="fa fa-twitter"></i></a> 
                        <a href="https://www.instagram.com/jonas.antunes4955" class="instagram mr-3" target="_blank"><i class="fab fa-instagram"></i></a> 
                        <a href="https://github.com/Jonas4955" class="github mr-3" target="_blank"><i class="fab fa-github"></i></a> 
                        <a href="https://www.linkedin.com/in/jonas-antunes-049197187" class="linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>

</center>

<br><br><br><br><br><br><br><br>

<div class="contatos">
    <div class="cardgadgets">
        <a class="gadgets gadface" href="https://web.facebook.com/Pojigo-101839457873456" target="_blank">
        <img class="imgface" border="0" src="../../../img/institucional/inicial_icons/faceboock.png" title="Siga-nos no face" /></a>
    </div>
    <div class="cardgadgets">
        <a class="gadgets gedinsta" href="https://www.instagram.com/pojigoentra21" target="_blank">
        <img class="imginsta" border="0" src="../../../img/institucional/inicial_icons/insta.png" title="Siga-nos no Insta" /></a>
    </div>
    <div class="cardgadgets">
        <a class="gadgets gedwhats" data-toggle="modal" data-target=".bd-example-modal-sm" href="Whats:(47) 984380116" target="_blank">
        <img class="imgwhats" border="0" src="../../../img/institucional/inicial_icons/whatsapp.png" title="Whats:(47) 996545424" /></a>
    </div>
    <div class="cardgadgets">
        <a class="gadgets gedyoutube" href="https://www.youtube.com/channel/UCusMR_Z4ozLqcf__GpBgehg" target="_blank">
        <img class="imgyoutube" border="0" src="../../../img/institucional/inicial_icons/youtube.png" title="Pojigo Entra21" /></a>
    </div>
</div>

<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-sm">Small modal</button> -->

<!-- Small modal -->
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
        <div class="card modal-content" style="background-image: linear-gradient(rgb(0, 130, 255), rgb(0, 50, 255));">
    <small><button type="button" class="close col-2 mt-2" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button></small>
            <img height="200" width="200" src="../../../img/institucional/inicial_icons/qrPojigoWhats.png" class=" sombra rounded qrWhats ml-5" alt="...">
            <div class="card-body text-center" style="font-family: arial; color: white;">
                <h5 class="card-title">Whatsapp add+</h5>
                <p style="font-size: 14px;">Leia nosso Vcard ou adicione o nº abaixo</p>
                <input class="text-center" type="text" name="whatsapp" value="(47) 984380116" disabled="" style="border-radius: 5px;">
            </div>
        </div>
  </div>
</div>
<?php if ($dispositivo == "computador") {
    
    include 'Modal.php'; 
 
} ?>




        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded scroltop" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <footer class="text-center">
            <div class="p-4 text-dark">
                <strong>Copyright © Pojigo.tk 2019</strong>
            </div>
        </footer>



        <script type="text/javascript">
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
            $('.navbar').css("background-color", "rgba(0, 0, 0, 0.8)");
        } else {
            $('.navbar').css("background-color", "rgba(0, 0, 0, 0.0)");
        }
        if (document.body.scrollTop > 150 || document.documentElement.scrollTop > 150) {
            $('.gadface').css("display", "block");
            $('.gedinsta').css("display", "block");
            $('.gedwhats').css("display", "block");
            $('.gedyoutube').css("display", "block");
        } else {
            $('.gadface').css("display", "none");
            $('.gedinsta').css("display", "none");
            $('.gedwhats').css("display", "none");
            $('.gedyoutube').css("display", "none");
        }  
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }

</script>

<!-- Bootstrap core JavaScript-->
<script src="../../../vendor/jquery/jquery.min.js"></script>
<script src="../../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../../../vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../../../js/sb-admin-2.min.js"></script>

<script src="../../../js/funcoesMobile.js"></script>
<script type="text/javascript">

        // scrolls suaves areas site
        $('.btnscroll').on('click', function(e) {
            e.preventDefault();
            var id = $(this).attr('href'),
            targetOffset = $(id).offset().top;
            
            $('html, body').animate({ 
                scrollTop: targetOffset - 50
            }, 500);
        });

    </script>
</body>

</html>