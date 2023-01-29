<?php
require("../php/config.php");
session_start();
if($_SESSION['nivel']!=2){
    header("location:../index.php");
} 
$sql_lista=sprintf("select * from contas where nivel=1 order by nivel desc;");
$res_lista=mysqli_query($ligacao,$sql_lista);

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
                    <h2>Eliminar Utilizadores</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Eliminar Utilizadores</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

        <div class="wrapper wrapper-content animated fadeInRight ecommerce">


            <div class="ibox-content m-b-sm border-bottom">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="col-form-label" for="product_name">Nome do Utilizador</label>
                            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Nome do Utilizador" class="form-control">
                        </div>
                    </div>
                   <!-- <div class="col-sm-2">
                        <div class="form-group">
                            <label class="col-form-label" for="price">Price</label>
                            <input type="text" id="price" name="price" value="" placeholder="Price" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="col-form-label" for="quantity">Quantity</label>
                            <input type="text" id="quantity" name="quantity" value="" placeholder="Quantity" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="col-form-label" for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1" selected>Enabled</option>
                                <option value="0">Disabled</option>
                            </select>
                        </div>
                    </div> -->
                </div>

            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-content">
                            <?php
                            if(isset($_POST['eliminar'])){
                                $sql_up=sprintf("delete from contas  where id=%d;",$_POST['id']);
                                if(mysqli_query($ligacao,$sql_up)){
                                    ?><br>
                                    <div class="alert alert-success" align="center">
                                    DADOS ELIMINADOS COM SUCESSO, CLIQUE NO ATUALIZAR PARA VISUALIZAR AS ALTERAÇÕES
                                    <div class="col-2 d-flex shopping-box"> 
                                        <a href="euser-delete.php" class=" btn" style="width: 100%;" >Atualizar</a> 
                                    </div>
                                </div>
                                <?php
                                } else {
                                    $erros='DADOS NÃO FORAM ELIMINADOS';
                                    ?><div class="alert alert-danger" align="center"><?php echo $erros ; ?></div><?php
                                } 

                            } 
                            ?>
                            <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15" id="myTable">
                                <thead>
                                <tr>

                                    <th data-toggle="true">Nome do Utilizador</th>
                                    <th data-hide="phone">Email</th>
                                    <th data-hide="phone">Nivel</th>
                                    <th class="text-right" data-sort-ignore="true">Eliminar</th>

                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while($reg_lista=mysqli_fetch_array($res_lista)){
                                    ?>
                                <tr>
                                    <td>
                                       <?php echo $reg_lista['prinome'].' '.$reg_lista['ultnome']; ?>
                                    </td>
                                    <td>
                                       <?php echo $reg_lista['email']; ?>
                                    </td>
                                    <td>
                                        <?php echo $reg_lista['nivel']; ?>
                                    </td> 
                                    <td class="text-right">
                                        <div class="btn-group">
                                            <form method="post">
                                                <input type="submit" class="btn-white btn btn-xs" name="eliminar" value="Eliminar">
                                                <input type="hidden" name="id" value="<?php echo $reg_lista['id']; ?>">
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                    <?php
                                    }
                                ?>

                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="6">
                                        <ul class="pagination float-right"></ul>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
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

    <!-- FooTable -->
    <script src="js/plugins/footable/footable.all.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {

            $('.footable').footable();

        });
        
        function myFunction() {
              // Declare variables
              var input, filter, table, tr, td, i, txtValue;
              input = document.getElementById("myInput");
              filter = input.value.toUpperCase();
              table = document.getElementById("myTable");
              tr = table.getElementsByTagName("tr");

              // Loop through all table rows, and hide those who don't match the search query
              for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                  txtValue = td.textContent || td.innerText;
                  if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                  } else {
                    tr[i].style.display = "none";
                  }
                }
              }
            }

    </script>

</body>

</html>