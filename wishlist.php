<?php
require("php/config.php");

if(!isset($_SESSION['user'])){
    header("location:login.php");
}

if(isset($_GET['desejo'])){
    $sql_prod=sprintf("select * from produtos where id=%d",$_GET['desejo']);
    $res_prod=mysqli_query($ligacao,$sql_prod);
    $reg_prod=mysqli_fetch_array($res_prod);
    
    $sql_inserir=sprintf("insert into lista_desejos (nome_prod,imagem,preco,stock,email,id_prod) values ('%s','%s',%d,%d,'%s',%d)",$reg_prod['nome'],$reg_prod['imagem'],$reg_prod['preco'],$reg_prod['stock'],$_SESSION['email'],$reg_prod['id']);
    $res_inserir=mysqli_query($ligacao,$sql_inserir);
    
}

if(isset($_GET['id'])){
    $quant=0;
    $quantidade=0;
    $sql_verificar=sprintf("select * from detalhes_venda where email='%s' and ativo=1;",$_SESSION['email']);
    $res_verificar=mysqli_query($ligacao,$sql_verificar);
    while($reg_verificar=mysqli_fetch_array($res_verificar)){
        if($_GET['id']==$reg_verificar['id_prod']){
            $quant=1;
            $quantidade=$reg_verificar['quant'];
            $quantidade++;
        } 
    }
    
    $sql_cart2=sprintf("select * from produtos where id=%d;",$_GET['id']);
    $res_cart2=mysqli_query($ligacao,$sql_cart2);
    $reg_cart2=mysqli_fetch_array($res_cart2);
    
    if($quant==1){
        $sql=sprintf("update detalhes_venda set quant=%d where id_prod=%d;",$quantidade,$_GET['id']);
        mysqli_query($ligacao,$sql);  
        
    } else {
        $sql=sprintf("insert into detalhes_venda (nome_prod,email,imagem,quant,preco,id_prod) values ('%s','%s','%s', 1,%d,%d);",$reg_cart2['nome'],$_SESSION['email'],$reg_cart2['imagem'],$reg_cart2['preco'],$_GET['id']);
        mysqli_query($ligacao,$sql); 
    }
}

if(isset($_GET['remover'])){
    $sql_remover=sprintf("DELETE FROM `lista_desejos` WHERE id_prod=%d",$_GET['remover']);
    $res_remover=mysqli_query($ligacao,$sql_remover);
}

$sql_lista=sprintf("select * from lista_desejos where email='%s'",$_SESSION['email']);
$res_lista=mysqli_query($ligacao,$sql_lista);



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
                                require('soma-carrinho.php');
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
                    <h2>Lista de Desejos</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Loja</a></li>
                        <li class="breadcrumb-item active">Lista de Desejos</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Wishlist  -->
    <div class="wishlist-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Imagem</th>
                                    <th>Nome do Produto</th>
                                    <th>Preço Unitário </th>
                                    <th>Stock</th>
                                    <th>Adicionar Produto</th>
                                    <th>Remover</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while($reg_lista=mysqli_fetch_array($res_lista)){
                                ?>
                                    <tr>
                                        <td class="thumbnail-img">
                                            <a href="shop-detail.php?id=<?php echo $reg_lista['id_prod']; ?>">
                                        <img class="img-fluid" src="<?php echo $reg_lista['imagem']; ?>" alt="" />
                                    </a>
                                        </td>
                                        <td class="name-pr">
                                            <a href="shop-detail.php?id=<?php echo $reg_lista['id_prod']; ?>">
                                        <?php echo $reg_lista['nome_prod']; ?>
                                    </a>
                                        </td>
                                        <td class="price-pr">
                                            <p><?php echo $reg_lista['preco']; ?> €</p>
                                        </td>
                                        <?php
                                        if($reg_lista['stock']==1){
                                        ?>
                                            <td class="quantity-box">Tem stock</td>
                                        <?php
                                        } else {
                                        ?>
                                            <td class="quantity-box">Não tem stock</td>
                                        <?php
                                        }
                                        ?>
                                        <td class="add-pr">
                                            <a class="btn hvr-hover" href="wishlist.php?id=<?php echo $reg_lista['id_prod']; ?>">Adicionar ao carrinho</a>
                                        </td>
                                        <td class="remove-pr">
                                            <a href="wishlist.php?remover=<?php echo $reg_lista['id_prod']; ?>">
                                        <i class="fas fa-times"></i>
                                    </a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Wishlist -->


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