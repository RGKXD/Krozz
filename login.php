<?php
require("php/config.php");


if(isset($_SESSION['user']))
{
    header("location:index.php");
}

if(isset($_POST['submeter'])){
    $erros='';
    if(strlen($_POST['email']=='')){
        $erros.='PRECISA DE COLOCAR UM EMAIL<br>';
    }
    if(strlen($_POST['pass']=='')){
        $erros.='PRECISA DE COLOCAR UMA PASSWORD<br>';
    }
    if ($erros==''){
        $sql_con=sprintf("select * from contas where email='%s'",$_POST['email']);
        $res_con=mysqli_query($ligacao,$sql_con);
        $num_con=mysqli_num_rows($res_con);
        
        if ($num_con >0){
            $sql_procura=sprintf("select * from contas where email='%s';",$_POST['email']);
            $res_procura=mysqli_query($ligacao,$sql_procura);
            $reg_procura=mysqli_fetch_array($res_procura);
        }
    }
}
?>
<html>
    <title>Krozz</title>
    <link rel="shortcut icon" href="images/krozz-globo.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/krozz-globo.png">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/login.css">
    <center><a href="index.php"><img src="images/krozz.png" width="350" height="150"></a></center>
    
    <div class="form">
        <ul class="tab-group">
            <li class="tab"><a href="signup.php">Criar Conta</a></li>
            <li class="tab active"><a href="login.php">Iniciar Sessão</a></li>
        </ul>
        <div id="login">   
            <h1>Bem Vindo de Volta!</h1>
            <?php
            if(isset($_POST['submeter'])){
                if(isset($reg_procura)){
                    $senha=md5($_POST['pass']);
                    if ($senha==$reg_procura['password']){
                       
                            ?><div class="alert alert-success" align="center">LOGIN EFETUADO COM SUCESSO!</div><?php
                                $_SESSION['user']=$reg_procura['prinome'].' '.$reg_procura['ultnome'];
                                $_SESSION['nivel']=$reg_procura['nivel'];
                                $_SESSION['email']=$reg_procura['email'];
                                 ?><meta http-equiv="refresh" content="0; url=index.php  " /><?php
                       
                    } else {
                         ?><div class="alert alert-danger" align="center">E-MAIL OU PASSWORD ERRADOS!</div><?php
                    }
                } else {
                     ?><div class="alert alert-danger" align="center">E-MAIL OU PASSWORD ERRADOS!</div><?php
                }
            }
                ?>
            <form  method="post">
                <div class="field-wrap">
                    <input type="email"required  placeholder="E-Mail*" name="email"/>
                </div>
                <div class="field-wrap">
                    <input type="password"required  placeholder="Password *" name="pass"/>
                </div>
                <!-- <p class="forgot"><a href="#">Forgot Password?</a></p> -->
                <button class="button button-block" name="submeter">Log In</button>
            </form>
        </div>
    </div>
</html>