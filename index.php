<?php
require("php/config.php");


if(isset($_SESSION["quantidade_prod"])){
    $_SESSION["quantidade_prod"]=1;
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
                            <span class="badge">
                                <?php
                                if(isset($_SESSION['user'])){
                                    require('soma-carrinho.php');
                                }
                            ?>
                            </span>
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
                        if(isset($_SESSION['user'])){
                            require("carrinho.php"); 
                        }
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

    <!-- Start Slider -->
    <div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            <li class="text-left">
                <img src="images/banner1-index.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Bem vindo à <br> Krozz</strong></h1>
                            <p class="m-b-40">Na nosso loja irá encontrar os melhores e mais baratos produtos no mercado português.</p>
                            <!-- <p><a class="btn hvr-hover" href="#">Shop New</a></p> !-->
                        </div>
                    </div>
                </div>
            </li>
           <li class="text-center">
                <img src="images/banner2-index.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Bem vindo à <br> Krozz</strong></h1>
                            <p class="m-b-40">A Krozz tem como objetivos: <br>
                                
                                    Fornecer produtos a um preço acessivel a todos os clientes.<br>
                                    Fazer entregas a Portugal continental e ilhas.<br>
                                
                            </p>
                           <!--  <p><a class="btn hvr-hover" href="#">Shop New</a></p> -->
                        </div>
                    </div>
                </div>
            </li>
            <!--  <li class="text-right">
                <img src="images/banner3-index.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Bem vindo à <br> Krozz</strong></h1>
                            <p class="m-b-40">See how your users experience your website in realtime or view <br> trends to see any changes in performance over time.</p>
                             <p><a class="btn hvr-hover" href="#">Shop New</a></p> 
                        </div>
                    </div> 
              
            </li> -->
        </ul> 
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End Slider -->

    <!-- Start Categories  -->
    <div class="categories-shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="images/torreindex.webp" alt="" />
                        <a class="btn hvr-hover" href="shop.php">Desktops</a>
                    </div>
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="images/ratoindex.jpg" alt="" />
                        <a class="btn hvr-hover" href="shop.php">Ratos</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="images/tecladoindex.jpg" alt="" />
                        <a class="btn hvr-hover" href="shop.php">Teclados</a>
                    </div>
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="images/headsetindex.jpg" alt="" />
                        <a class="btn hvr-hover" href="shop.php">Fones</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="images/telemovelindex.jpg" alt="" />
                        <a class="btn hvr-hover" href="shop.php">Telemóveis</a>
                    </div>
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="images/portatilindex.jpg" alt="" />
                        <a class="btn hvr-hover" href="shop.php">Portáteis</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Categories -->

    <!-- Start Products  -->
    <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Melhores Produtos</h1>
                        <p>Aqui irá encontrar os melhores e mais comprados produtos da nossa loja.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <div class="button-group filter-button-group">
                            <button class="active" data-filter="*">Todos</button>
                            <button data-filter=".top-featured">Mais Destacados</button>
                            <button data-filter=".best-seller">Mais vendidos</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row special-list">
                <div class="col-lg-3 col-md-6 special-grid best-seller">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                                <p class="sale">Promoção</p>
                            </div>
                            <img src="images/rato1-index.jpg" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <?php 
                                    $link='shop-detail.php?id=6';
                                    ?>
                                    <li><a href="<?php echo $link; ?>" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                    <li><a href="wishlist.php?desejo=6" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                </ul>
                                
                            </div>
                        </div>
                        <div class="why-text">
                            <h4>Rato Asus ROG Gladius II Origin</h4>
                            <h5> 69,99€</h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 special-grid top-featured">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                                <p class="new">Novo</p>
                            </div>
                            <img src="images/monitor1-index.jpg" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <?php 
                                    $link='shop-detail.php?id=5';
                                    ?>
                                    <li><a href="<?php echo $link; ?>" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                    <li><a href="wishlist.php?desejo=5" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                </ul>
                                
                            </div>
                        </div>
                        <div class="why-text">
                            <h4>Monitor Asus VP248QG TN 24"</h4>
                            <h5> 160€</h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 special-grid top-featured">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                                <p class="sale">Promoção</p>
                            </div>
                            <img src="images/teclado1-index.jpg" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <?php 
                                    $link='shop-detail.php?id=21';
                                    ?>
                                    <li><a href="<?php echo $link; ?>" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                    <li><a href="wishlist.php?desejo=21" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                </ul>
                                
                            </div>
                        </div>
                        <div class="why-text">
                            <h4>Teclado Razer Ornata Chroma</h4>
                            <h5> 110€</h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 special-grid best-seller">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                                <p class="sale">Promoção</p>
                            </div>
                            <img src="images/monitor2-index.jpg" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <?php 
                                    $link='shop-detail.php?id=8';
                                    ?>
                                    <li><a href="<?php echo $link; ?>" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                    <li><a href="wishlist.php?desejo=8" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                </ul>
                                
                            </div>
                        </div>
                        <div class="why-text">
                            <h4>Monitor AOC G2790VXA VA 27"</h4>
                            <h5> 189,99€</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Products  -->

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