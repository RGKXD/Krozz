<?php
require("php/config.php");




if(isset($_SESSION['user']))
{
    header("location:index.php");
}

if(isset($_POST['submeter'])){
    $erros='';
    if(strlen($_POST['prinome']=='')){
        $erros.='PRECISA DE COLOCAR PRIMEIRO NOME<br>';
    }
    if(strlen($_POST['ultnome']=='')){
        $erros.='PRECISA DE COLOCAR ÚLTIMO NOME<br>';
    }
    if(strlen($_POST['email']=='')){
        $erros.='PRECISA DE COLOCAR EMAIL<br>';
    }
    if(strlen($_POST['pass']=='')){
        $erros.='PRECISA DE COLOCAR PASSWORD<br>';
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
    <title>Krozz</title>
    <link rel="shortcut icon" href="images/krozz-globo.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/krozz-globo.png">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/login.css">
    <center><a href="index.php"><img src="images/krozz.png" width="350" height="150"></a></center>
    <div class="form">
        <ul class="tab-group">
            <li class="tab active"><a href="signup.php">Criar Conta</a></li>
            <li class="tab"><a href="login.php">Iniciar Sessão</a></li>
        </ul>
        <div id="signup">   
            <h1>Registe-se gratuitamente</h1>
            <?php
            if(isset($_POST['submeter'])){
                if($erros==''){
                    ?><div class="alert alert-success" align="center">DADOS GUARDADOS COM SUCESSO, EFETUE O LOGIN</div><?php
                } else {
                    ?><div class="alert alert-danger" align="center"><?php echo $erros ; ?></div><?php
                }
            }
            ?>
            <form method="post" >
                <div class="top-row">
                    <div class="field-wrap">
                      <input type="text"  name="prinome" placeholder="Primeiro nome*" />
                    </div>
                    <div class="field-wrap">
                        <input type="text"required  name="ultnome"  placeholder="Último nome*"/>
                    </div>
                </div>
                <div class="field-wrap">
                    <input type="email"required name="email" placeholder="E-Mail*" />
                </div>
                <div class="field-wrap">
                    <input type="password"required name="pass" placeholder="Password *" />
                </div>
                <div class="field-wrap">
                    <input type="password"required name="confpass"  placeholder="Confirmar Password *" />
                </div>
                <button type="submit" class="button button-block" name="submeter">Registar</button>
            </form>
        </div>
    </div> 
 </html>
    