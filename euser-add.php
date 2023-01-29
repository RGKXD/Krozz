<?php
require("../php/config.php");
session_start();

if($_SESSION['nivel']!=2){
    header("location:../index.php");
} 




if(isset($_POST['enviar'])){
    $erros='';
    if(strlen($_POST['prinome']=='')){
        $erros.='PRECISA DE COLOCAR O PRIMEIRO NOME DO UTILIZADOR<br>';
    }
    if(strlen($_POST['ultnome']=='')){
        $erros.='PRECISA DE COLOCAR O ÚLTIMO NOME DO ULTILIZADOR<br>';
    }
    if(strlen($_POST['email']=='')){
        $erros.='PRECISA DE COLOCAR O EMAIL DO UTILIZADOR<br>';
    }
    if(strlen($_POST['confpass']=='')){
        $erros.='PRECISA DE CONFIRMAR A PASSWORD<br>';
    } else {
        if($_POST['confpass']!=$_POST['pass']){
            $erros.='PALAVRAS PASSE DIFERENTES<br>';
        }
    }
    

    
    if ($erros==''){
        $sql_con=sprintf("select * from contas where email='%s'",$_POST['email']);
        $res_con=mysqli_query($ligacao,$sql_con);
        $num_con=mysqli_num_rows($res_con);
        
        if ($num_con ==0){
            $senha=md5($_POST['pass']);
            $sql_inserir=sprintf("insert into contas (prinome,ultnome,email,password) values ('%s','%s','%s', '%s');",$_POST['prinome'],$_POST['ultnome'],$_POST['email'],$senha);
             
            if(!mysqli_query($ligacao,$sql_inserir)){
                $erros = 'FALHA NA GRAVAÇÃO DOS DADOS';
            }
        } else {
            $erros = 'DADOS JÁ EXISTENTES';
        }
    }
}


?>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Krozz | Dashboard</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                    
                <li class="nav-label" style="vertical-align: text-top; " >
                    <a href="../index.php"> <img src="img/krozz.png"  alt="" width="200" height="80"></a>
                </li>
                <li class="nav-header">
                    
                    <div class="logo-element">
                        <a href="../index.php"><img src="../images/krozz-globo.png" width="80" height="30"></a>
                    </div>
                </li>
               
                <li class="active">
                    <a href="index.php"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span> </a>
                </li>
                <li>
                    <a href=""><i class="fa fa-vcard"></i> <span class="nav-label">Vendas</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="evendas_lista.php">Lista das Vendas</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Produtos</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="ecommerce_produto_eliminate.php">Eliminar Produtos</a></li>
                        <li><a href="ecommerce_produto_add.php">Adicionar Produtos</a></li>
                        <li><a href="ecommerce_product_list.php">Lista/Editar Produtos</a></li>
                        <li><a href="ecommerce_products_grid.php">Grelha Produtos</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-user-circle"></i> <span class="nav-label">Utilizadores</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="euser-delete.php">Eliminar Utilizadores</a></li>
                        <li><a href="euser-add.php">Adicionar Utilizadores</a></li>
                        <li><a href="euser-lista.php">Lista/Editar Utilizadores</a></li>
                        <li><a href="euser-lista-block.php">Utilizadores Bloqueados</a></li>
                        <li><a href="edetalhes_produtos_add.php">Adicionar Detalhes dos Produtos</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
            <ul class="nav navbar-top-links navbar-right">
               


                <li>
                    <a href="../limpar-session.php">
                        <i class="fa fa-sign-out"></i> Sair da Conta
                    </a>
                </li>
                <li>
                    <a class="right-sidebar-toggle">
                        <i class="fa fa-tasks"></i>
                    </a>
                </li>
            </ul>

        </nav>
        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Adicionar Utilizadores</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a>Utilizadores</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>Adicionar Utilizadores</strong>
                    </li>
                </ol>
            </div>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight ecommerce">

            <div class="row">
                <div class="col-lg-12">
                    <div class="tabs-container">
                            <ul class="nav nav-tabs">
                                <li><a class="nav-link active" data-toggle="tab" href="#tab-1">Adicionar Utilizadores</a></li>
                                <!-- <li><a class="nav-link" data-toggle="tab" href="#tab-2"> Data</a></li>
                                <li><a class="nav-link" data-toggle="tab" href="#tab-3"> Discount</a></li>
                                <li><a class="nav-link" data-toggle="tab" href="#tab-4"> Images</a></li> -->
                            </ul>
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <div class="panel-body">
                                        <?php
                                        if(isset($_POST['enviar'])){
                                            if($erros==''){
                                                ?><div class="alert alert-success" align="center">DADOS GUARDADOS COM SUCESSO</div><?php
                                            } else {
                                                ?><div class="alert alert-danger" align="center"><?php echo $erros ; ?></div><?php
                                            }
                                        }
                                        ?>
                                        <form method="post" >
                                       
                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Primeiro Nome:</label>
                                                <div class="col-sm-10"><input type="text" name="prinome" class="form-control" ></div>
                                            </div>
                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Último Nome:</label>
                                                <div class="col-sm-10"><input type="text" name="ultnome" class="form-control" ></div>
                                            </div>
                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Email:</label>
                                                <div class="col-sm-10"><input type="text" name="email" class="form-control" ></div>
                                            </div>
                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Password:</label>
                                                <div class="col-sm-10"><input type="password" name="pass" class="form-control" ></div>
                                            </div>
                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Confirmar Password:</label>
                                                <div class="col-sm-10"><input type="password" name="confpass" class="form-control" ></div>
                                            </div>
                                            
                                            <hr>
                                            <input type="submit" class="btn" id="enviar" name="enviar" value="Enviar">
                                        
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="footer">
            <div>
                <strong>Copyright</strong> Krozz &copy;
            </div>
        </div>

    </div>
</div>



<!-- Mainly scripts -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>

<!-- SUMMERNOTE -->
<script src="js/plugins/summernote/summernote-bs4.js"></script>

<!-- Data picker -->
<script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>

<script>
    $(document).ready(function(){

        $('.summernote').summernote();

        $('.input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });

    });
</script>

</body>

</html>