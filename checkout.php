<?php
require("php/config.php");


$erros='';

if(!isset($_SESSION['user'])){
    header("location:login.php");
}

if(!isset($_SESSION['metodo'])){
    $_SESSION['metodo']=1;
}
if(!isset($_SESSION['pagamento'])){
    $_SESSION['pagamento']=1;
}

if(strpos($_SESSION['user'], " ") != false){
    $nome = explode(" ", $_SESSION['user']);

}

if(isset($_POST['metodo'])){
    if($_POST['metodo']=='option1'){
        $_SESSION['metodo']=1;
    }
    if($_POST['metodo']=='option2'){
        $_SESSION['metodo']=2;
    }
    if($_POST['metodo']=='option3'){
        $_SESSION['metodo']=3;
    }
}

if(isset($_POST['paymentMethod'])){
    if($_POST['paymentMethod']=='option1'){
        $_SESSION['pagamento']=1;
    }
    if($_POST['paymentMethod']=='option2'){
        $_SESSION['pagamento']=2;
    }
}

if(isset($_POST['checkout'])){
    $data=date("y-m-d H:i:s");
    
    if($_POST['pnome']==''){
        $erros.='Precisa de colocar o seu primeiro nome!<br>';
    }
    if($_POST['ultnome']==''){
        $erros.='Precisa de colocar o seu último nome!<br>';
    }
    if($_POST['email']==''){
        $erros.='Precisa de colocar o seu email!<br>';
    }
    if($_POST['morada']==''){
        $erros.='Precisa de colocar a sua morada!<br>';
    }
    if($_POST['distrito']==''){
        $erros.='Precisa de colocar o seu distrito!<br>';
    }
    if($_POST['zip']==''){
        $erros.='Precisa de colocar o seu código postal!<br>';
    }
    
    if($_SESSION['metodo']==1){
        $tipo_entrega='Normal';
    }
    if($_SESSION['metodo']==2){
        $tipo_entrega='Expresso';
    }
    if($_SESSION['metodo']==3){
        $tipo_entrega='Próximo dia';
    }
    
    if($_SESSION['pagamento']==1){
        if($_POST['nomecc']==''){
            $erros.='Precisa de colocar o nome do cartão!<br>';
        }
        if($_POST['numcc']==''){
            $erros.='Precisa de colocar o número de cartão!<br>';
        }
        if($_POST['datacc']==''){
            $erros.='Precisa de colocar a data do cartão!<br>';
        }
        if($_POST['cvvcc']==''){
            $erros.='Precisa de colocar o CVV do cartão!<br>';
        }
        
        $tipo_pagamento='Crédito/Débito';
    }
    if($_SESSION['pagamento']==2){
        if($_POST['paypal']==''){
            $erros.='Precisa de colocar o email de paypal!<br>';
        }
        
        $tipo_pagamento='Paypal';
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
                    <h2>Checkout</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <?php
    if (!isset($_SESSION['user'])){
        ?>
        <div class="alert alert-danger" align="center">Precisa de iniciar sessão para proceder ao checkout!<br>
            <button class="btn hvr-hover" type="submit"><a href="login.php">Entrar na sua conta</a></button>
        </div>
    <?php
    } else {
        
        ?>
            <div class="cart-box-main">
                <div class="container">
                    <?php
                    if(isset($_POST['checkout'])){
                       if($erros!=''){
                           ?><div class="alert alert-danger" align="center"><?php echo $erros ?></div><?php
                        } else {
                           $sql_status=sprintf("update venda set status=2 where email='%s' and status=1",$_SESSION['email']);
                            mysqli_query($ligacao,$sql_status);

                           $sql_inserir=sprintf("insert into venda (data_venda,tipo_entrega,tipo_pagamento,morada,distrito,codigo_postal,email) values ('%s','%s','%s', '%s','%s','%s','%s');",$data,$tipo_entrega,$tipo_pagamento,$_POST['morada'],$_POST['distrito'],$_POST['zip'],$_SESSION['email']);
                            if(!mysqli_query($ligacao,$sql_inserir)){
                                $erros= 'FALHA NA GRAVAÇÃO DOS DADOS';
                            }

                            $sql_venda=sprintf("select * from venda where email='%s' and status=1;",$_SESSION['email']);
                            $res_venda=mysqli_query($ligacao,$sql_venda);
                            $reg_venda=mysqli_fetch_array($res_venda);

                           $sql_update=sprintf("update detalhes_venda set id_venda='%d',ativo=2 where email='%s' and ativo=1",$reg_venda['id_venda'],$_SESSION['email']);
                            mysqli_query($ligacao,$sql_update);
                           
                            ?><div class="alert alert-success" align="center">CHECKOUT EFETUADO COM SUCESSO!</div><?php
                        }
                    }
                    ?>
                    <form class="needs-validation" method="post" novalidate>
                    <div class="row">
                            <div class="col-sm-6 col-lg-6 mb-3">
                                <div class="checkout-address">
                                    <div class="title-left">
                                        <h3>Morada de faturação</h3>
                                    </div>
                                    
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="firstName">Primeiro Nome *</label>
                                                <input type="text" class="form-control" id="firstName" placeholder="" name="pnome" value="<?php echo $nome[0]; ?>" required>
                                                <div class="invalid-feedback"> Valid first name is required. </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="lastName">Último Nome *</label>
                                                <input type="text" class="form-control" id="lastName" placeholder="" name="ultnome" value="<?php echo $nome[1]; ?>" required>
                                                <div class="invalid-feedback"> Valid last name is required. </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email">Endereço de email *</label>
                                            <input type="email" class="form-control" id="email" placeholder="" name="email" value="<?php echo $_SESSION['email']; ?>">
                                            <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="address">Morada *</label>
                                            <input type="text" class="form-control" name="morada" id="address" placeholder="" required>
                                            <div class="invalid-feedback"> Please enter your shipping address. </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <label for="state">Distrito *</label>
                                                <select class="wide w-100" id="state" name="distrito">
                                                <option></option>
                                                <option>Aveiro</option>
                                                <option>Beja</option>
                                                <option>Braga</option>
                                                <option>Bragança</option>
                                                <option>Castelo Branco</option>
                                                <option>Coimbra</option>
                                                <option>Évora</option>
                                                <option>Faro</option>
                                                <option>Guarda</option>
                                                <option>Leiria</option>
                                                <option>Lisboa</option>
                                                <option>Portalegre</option>
                                                <option>Porto</option>
                                                <option>Santarém</option>
                                                <option>Setúbal</option>
                                                <option>Viana do Castelo</option>
                                                <option>Vila Real</option>
                                                <option>Viseu</option>
                                            </select>
                                                <div class="invalid-feedback"> Please provide a valid state. </div>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="zip">Código postal *</label>
                                                <input type="text" class="form-control" id="zip" name="zip" placeholder="" maxlength="8" required>
                                            </div>
                                        </div>
                                        <hr class="mb-4">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="same-address">
                                            <label class="custom-control-label" for="same-address">A minha morada de faturação e envio é a mesma</label>
                                        </div>
                                        <hr class="mb-4">
                                        <div class="title"> <span>Método de pagamento</span> </div>
                                        <div class="d-block my-3">
                                            <div class="custom-control custom-radio">
                                                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" value="option1" <?php if( $_SESSION['pagamento']==1){ ?>checked <?php } ?> onclick="submit();" required>
                                                <label class="custom-control-label" for="credit">Cartão de crédito ou débito</label>
                                            </div>
                                            <!--<div class="custom-control custom-radio">
                                                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                                                <label class="custom-control-label" for="debit">Cartão de débito</label>
                                            </div> -->
                                            <div class="custom-control custom-radio">
                                                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" value="option2" <?php if( $_SESSION['pagamento']==2){ ?>checked <?php } ?> onclick="submit();" required>
                                                <label class="custom-control-label" for="paypal">Paypal</label>
                                            </div>
                                        </div>
                                        <?php
                                        if($_SESSION['pagamento']==1){
                                            ?>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="cc-name">Nome no cartão *</label>
                                                    <input type="text" class="form-control" id="cc-name" name="nomecc" placeholder="" required> <small class="text-muted">Nome como está no cartão</small>
                                                    <div class="invalid-feedback"> Name on card is required </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="cc-number">Número do cartão de crédito *</label>
                                                    <input type="text" class="form-control" name="numcc" id="cc-number" placeholder="" required>
                                                    <div class="invalid-feedback"> Credit card number is required </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5 mb-5">
                                                    <label for="cc-expiration">Data de expiração *</label>
                                                    <input type="text" class="form-control" name="datacc" id="cc-expiration" placeholder="" required>
                                                    <div class="invalid-feedback"> Expiration date required </div>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label for="cc-expiration">CVV *</label>
                                                    <input type="text" class="form-control" name="cvvcc" id="cc-cvv" placeholder="" maxlength="3" required>
                                                    <div class="invalid-feedback"> Security code required </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <div class="payment-icon">
                                                        <ul>
                                                            <li><img class="img-fluid" src="images/payment-icon/1.png" alt=""></li>
                                                            <li><img class="img-fluid" src="images/payment-icon/2.png" alt=""></li>
                                                            <li><img class="img-fluid" src="images/payment-icon/3.png" alt=""></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="mb-1"> 
                                        <?php
                                        }
                                        if($_SESSION['pagamento']==2){
                                        ?>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="cc-name">Email do paypal *</label>
                                                    <input type="text" class="form-control" name="paypal" id="cc-name" placeholder="" required>
                                                    <div class="invalid-feedback"> Email do paypal é preciso! </div>
                                                </div>
                                            </div>
                                        <hr class="mb-1"> 
                                        <?php
                                        }
                                ?>
                                    
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6 mb-3">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                            <form method="post">
                                                <div class="shipping-method-box">
                                                    <div class="title-left">
                                                        <h3>Método de Encomenda</h3>
                                                    </div>
                                                    <div class="mb-4">
                                                        <div class="custom-control custom-radio">
                                                            <input id="shippingOption1" name="metodo" value="option1" class="custom-control-input" <?php if($_SESSION['metodo']==1){ ?>checked="checked" <?php } ?> type="radio" onclick="submit();">
                                                            <label class="custom-control-label" for="shippingOption1">Entrega normal</label> <span class="float-right font-weight-bold">Grátis</span> 
                                                        </div>
                                                        <div class="ml-4 mb-2 small">(3-7 dias úteis)</div>
                                                        <div class="custom-control custom-radio">
                                                            <input id="shippingOption2" name="metodo" value="option2" class="custom-control-input" <?php if($_SESSION['metodo']==2){ ?>checked="checked" <?php } ?> type="radio" onclick="submit();">
                                                            <label class="custom-control-label" for="shippingOption2">Entrega expresso</label> <span class="float-right font-weight-bold">10 €</span> 
                                                        </div>
                                                        <div class="ml-4 mb-2 small">(2-4 dias úteis)</div>
                                                        <div class="custom-control custom-radio">
                                                            <input id="shippingOption3" name="metodo" value="option3" class="custom-control-input" <?php if($_SESSION['metodo']==3){ ?>checked="checked" <?php } ?> type="radio" onclick="submit();">
                                                            <label class="custom-control-label" for="shippingOption3">Próximo dia útil</label> <span class="float-right font-weight-bold">20 €</span> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    <div class="col-md-12 col-lg-12">
                                        <div class="odr-box">
                                            <div class="title-left">
                                                <h3>Carrinho</h3>
                                            </div>
                                            <div class="rounded p-2 bg-light">
                                                <?php
                                                $sql_cart2=sprintf("select * from detalhes_venda where email='%s' and ativo=1;",$_SESSION['email']);
                                                $res_cart2=mysqli_query($ligacao,$sql_cart2);
            
                                                $sub_total=0;
                                                while($reg_cart2=mysqli_fetch_array($res_cart2)){
                                                    $soma=$reg_cart2['preco']*$reg_cart2['quant'];
                                                    $sub_total+=$soma;
                                                    ?>
                                                    <div class="media mb-2 border-bottom">
                                                        <div class="media-body"> <a href="#"> <?php echo $reg_cart2['nome_prod']; ?></a>
                                                            <div class="small text-muted">Preço: <?php echo $reg_cart2['preco']; ?> € <span class="mx-2">|</span> Qty: <?php echo $reg_cart2['quant']; ?><span class="mx-2">|</span> Subtotal: <?php echo  $soma; ?> €</div>
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                            ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12">
                                        <div class="order-box">
                                            <div class="title-left">
                                                <h3>Ordem</h3>
                                            </div>
                                            <div class="d-flex">
                                                <h4>Sub Total</h4>
                                                <div class="ml-auto font-weight-bold"> <?php echo  $sub_total; ?> €</div>
                                            </div>
                                            <div class="d-flex">
                                                <h4>Desconto</h4>
                                                <div class="ml-auto font-weight-bold"> 0 €</div>
                                            </div>
                                            <hr class="my-1">
                    
                                            <div class="d-flex">
                                                <h4>Taxas</h4>
                                                <div class="ml-auto font-weight-bold"> <?php echo $sub_total*0.23; ?> €</div>
                                                <?php
                                                $total=$sub_total;
                                                $total+=$sub_total*0.23;
                                                ?>
                                            </div>
                                            
                                            <div class="d-flex">
                                                <h4>Portes de envio</h4>
                                                <?php
                                                if($_SESSION['metodo']==1){
                                                    ?>
                                                    <div class="ml-auto font-weight-bold"> Free </div>
                                                <?php
                                                } 
                                                if($_SESSION['metodo']==2){
                                                    $total+=10;
                                                    ?>
                                                    <div class="ml-auto font-weight-bold"> 10 € </div>
                                                <?php
                                                }
                                                if($_SESSION['metodo']==3){
                                                    $total+=20;
                                                    ?>
                                                    <div class="ml-auto font-weight-bold"> 20 € </div>
                                                <?php
                                                }
                                            ?>
                                            </div>
                                            <hr>
                                            <div class="d-flex gr-total">
                                                <h5>Total</h5>
                                                <div class="ml-auto h5"> <?php echo $total; ?> €</div>
                                            </div>
                                            <hr> </div>
                                    </div>
                                    <div class="col-12 d-flex shopping-box"> <input type="submit" name="checkout" class="ml-auto btn hvr-hover" value="Checkout" ></div>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
            <!-- End Cart -->
    <?php
        }
    
    ?>

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