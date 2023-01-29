<?php
$sql_soma=sprintf("select * from detalhes_venda where email='%s' and ativo=1;",$_SESSION['email']);
$res_soma=mysqli_query($ligacao,$sql_soma);
if($res_soma!=''){

    $soma_carrinho=0;

    while($reg_soma=mysqli_fetch_array($res_soma)){
        $soma_carrinho+=$reg_soma['quant'];
    }

    echo $soma_carrinho; 
}
?>