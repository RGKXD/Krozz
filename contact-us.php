<?php
header("location:index.php");

if(isset($_POST['enviar'])){
    require 'smtp/PHPMailerAutoload.php';
    require  'smtp/class.phpmailer.php' ;
    $erros='';
    if(isset($_POST['assunto']) && !empty($_POST['assunto'])){
        $assunto = $_POST['assunto'];
    } 

    if(isset($_POST['mensagem']) && !empty($_POST['mensagem'])){
        $mensagem = $_POST['mensagem'];
    }

    if(isset($_POST['email']) && !empty($_POST['email'])){
        $email = $_POST['email'];
    }

    $mail = new PHPMailer; 
    $mail->isHTML(true);

    $mail->Subject = utf8_decode($assunto);
    $mail->Body = $mensagem;
    $mail->AltBody = strip_tags($mensagem);
    $mail->addAddress('aluno12170@damiaodegoes.pt', 'Remetente');
    $mail->SetFrom($email);

    if(!$mail->send()) {
        $erros='Não foi possivel enviar a mensagem. <br>'; 
        echo 'Erro: '.$mail->ErrorInfo;
    } else {
        $sucesso='MENSAGEM ENVIADA';
    }
}
?>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Krozz</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/krozz-globo.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/krozz-globo.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Start Main Top -->
   <div class="main-top">
        <div class="container-fluid">
             <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-7 col-xs-7">
                    <div class="text-slid-box">
                        <div id="offer-box" class="carouselTicker">
                            <ul class="offer-box">
                                <li>
                                    <i class="fab fa-opencart"></i> Krozz
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Krozz
                                </li>
                            </ul>
                        </div>
                    </div> 
                </div>
                <div class="col-lg-9 col-md-9 col-sm-17 col-xs-17">
                    <div class="custom-select-box">
                        <select id="basic" class="selectpicker show-tick form-control" data-placeholder="€ EUR">
						<option>€ EUR</option>
					</select>
                    </div>
                    <div class="right-phone-box">
                        <p>Ligue-nos :<a href="#"> 942384275</a></p>
                    </div>
                    <div class="our-link">
                        <ul>
                            <?php
                            if(isset($_SESSION['nivel'])){
                                if($_SESSION['nivel']==2){
                                    ?>
                                    <li><a href="admin-panel/index.php">Aceder</a></li>
                                <?php
                                }
                            }
                            ?>
                            <li><a href="my-account.php">Minha Conta</a></li>
                            <li><a href="https://www.google.com/maps/place/Parque+Das+Na%C3%A7oes/@38.7584038,-9.105525,17z/data=!3m1!4b1!4m5!3m4!1s0xd19322ac567792f:0x629a4aada72d2af1!8m2!3d38.7583996!4d-9.1033363" target="_blank">Nossa Localização</a></li>
                            <li><a href="contact-us.php">Apoio ao Cliente</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="index.php"><img src="images/krozz.png" class="logo" alt="" width="200" height="80"></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
                        
                        <li class="dropdown megamenu-fw">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Produtos</a>
                            <ul class="dropdown-menu megamenu-content" role="menu">
                                <li>
                                     <div class="row">
                                        <div class="col-menu col-md-3">
                                            <h6 class="title">Computadores</h6>
                                            <div class="content">
                                                <ul class="menu-col">
                                                    <li><a href="shop.php">Desktops Gaming</a></li>
                                                    <li><a href="shop.php">Desktops</a></li>
                                                   <!-- <li><a href="shop.php">Desktops All-in-One</a></li> -->
                                                    <li><a href="shop.php">Portáteis</a></li>
                                                  <!--  <li><a href="shop.php">Acessórios para Portáties</a></li> -->
                                                    <li><a href="shop.php">Software</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- end col-3 -->
                                        <div class="col-menu col-md-3">
                                            <h6 class="title">Periféricos</h6>
                                            <div class="content">
                                                <ul class="menu-col">
                                                    <li><a href="shop.php">Ratos</a></li>
                                                    <li><a href="shop.php">Teclados</a></li>
                                                    <li><a href="shop.php">Tapetes</a></li>
                                                    <li><a href="shop.php">Headsets</a></li>
                                                    <li><a href="shop.php">Headphones</a></li>
                                                   <!-- <li><a href="shop.php">Colunas</a></li> -->
                                                    <li><a href="shop.php">Microfones</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- end col-3 -->
                                        <div class="col-menu col-md-3">
                                            <h6 class="title">Mobilidade</h6>
                                            <div class="content">
                                                <ul class="menu-col">
                                                    <li><a href="shop.php">Smartphones</a></li>
                                                   <!-- <li><a href="shop.php">Telemóveis</a></li> -->
                                                    <li><a href="shop.php">Tablets</a></li>
                                                    <li><a href="shop.php">SmartWatch</a></li>
                                                 <!--   <li><a href="shop.php">SmartBand</a></li> -->
                                                  <!--  <li><a href="shop.php">Acessórios</a></li> -->
                                                </ul>
                                            </div>
                                        </div>
                                        
                                        <!-- end col-3 -->
                                        <div class="col-menu col-md-3">
                                            <h6 class="title">Componentes</h6>
                                            <div class="content">
                                                <ul class="menu-col">
                                                    <li><a href="shop.php">Processadores</a></li>
                                                    <li><a href="shop.php">Placas Gráficas</a></li>
                                                    <li><a href="shop.php">Fontes de Alimentação</a></li>
                                                    <li><a href="shop.php">MotherBoards</a></li>
                                                    <li><a href="shop.php">Coolers</a></li>
                                                    <li><a href="shop.php">Caixas de Computador</a></li>
                                                    <li><a href="shop.php">Memórias RAM</a></li>
                                                    <li><a href="shop.php">Armazenamento Interno</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Loja</a>
                            <ul class="dropdown-menu">
                                <li><a href="cart.php">Carrinho</a></li>
                                <li><a href="checkout.php">Checkout</a></li>
                                <li><a href="my-account.php">Minha Conta</a></li>
                                <li><a href="wishlist.php">Lista de Desejos</a></li>
                                
                            </ul>
                        </li>
                        
                        <li class="nav-item"><a class="nav-link" href="contact-us.php">Apoio ao Cliente</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <li class="side-menu"><a href="#">
						<i class="fa fa-shopping-bag"></i>
                            <span class="badge"><?php
                                require('soma-carrinho.php');
                            ?></span>
					</a></li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                        <?php
                        require("carrinho.php"); 
                        ?>
                    </ul>
                </li>
            </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Contacte-nos</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"> Contacte-nos </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Contact Us  -->
    <div class="contact-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <div class="contact-info-left">
                        <h2>Como contactar-nos</h2>
                        <ul>
                            <li>
                                <p><i class="fas fa-map-marker-alt"></i>Largo Professor Arnaldo Sampaioooo<br>Lisboa 537<br> 1549-001 </p>
                            </li>
                            <li>
                                <p><i class="fas fa-phone-square"></i>Telefone: <a href="tel:+1-888705770">216 234 123</a></p>
                            </li>
                            <li>
                                <p><i class="fas fa-envelope"></i>Email: <a href="mailto:contactinfo@gmail.com">krozzcliente@gmail.com</a></p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8 col-sm-12">
                    <div class="contact-form-right">
                        <h2>Suporte</h2>
                        <?php
                        if(isset($_POST['enviar'])){
                            if($erros==''){
                                ?>            
                                <div class='alert alert-success'>
                                    <?php echo $sucesso; ?>
                                </div> 
                                <br>
                                <?php
                            } else {
                                ?>  
                                <div class='alert alert-danger'>
                                    <?php echo $erros; ?>
                                </div>
                            <?php
                            }
                        }
                        ?>
                        <form method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control"  name="name" placeholder="O seu Nome" required data-error="Introduza o seu nome">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="O seu email"  class="form-control" name="email" required data-error="Introduza o seu email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control"  name="assunto" placeholder="Assunto" required data-error="Introduza o assunto">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control"  name="mensagem" placeholder="Mensagem" rows="4" data-error="Escreva a mensagem" required></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="submit-button text-center">
                                        <input class="btn hvr-hover" name="enviar" type="submit" value="Enviar Mensagem">
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart -->


    <!-- Start Footer  -->
    <footer>
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-widget">
                            <h4>Sobre a Krozz</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </p>
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link">
                            <h4>Informação</h4>
                            <ul>
                                <li><a href="#">Sobre Nós</a></li>
                                <li><a href="#">Apoio ao Cliente</a></li>
                                <li><a href="#">Termos &amp; Condições</a></li>
                                <li><a href="#">Politica de Privacidade</a></li>
                                <li><a href="#">Informação de entrega</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link-contact">
                            <h4>Contacte-nos</h4>
                            <ul>
                                <li>
                                    <p><i class="fas fa-map-marker-alt"></i>Morada: Largo Professor Arnaldo Sampaio<br>Lisboa 537<br> 1549-001 </p>
                                </li>
                                <li>
                                    <p><i class="fas fa-phone-square"></i>Telefone: <a href="tel:+1-888705770">216 234 123</a></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-envelope"></i>Email: <a href="mailto:contactinfo@gmail.com">krozzcliente@gmail.com</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer  -->

    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company">Todos os Direitos Reservados. &copy; 2020 <a href="index.php">Krozz</a> Feito por:
            <a href="https://html.design/">Filipe Gato</a></p>
    </div>
    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/jquery.superslides.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/inewsticker.js"></script>
    <script src="js/bootsnav.js"></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/baguetteBox.min.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>