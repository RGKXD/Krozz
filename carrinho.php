<?php
$sql_cart=sprintf("select * from detalhes_venda where email='%s' and ativo=1;",$_SESSION['email']);
$res_cart=mysqli_query($ligacao,$sql_cart);

$soma=0;
?>
<html>
    <?php
    while($reg_cart=mysqli_fetch_array($res_cart)){
        ?>
        <li>
            <a href="#" class="photo"><img src="<?php echo $reg_cart['imagem']; ?>" class="cart-thumb" alt="" /></a>
            <h6><a href="shop-detail.php?id=<?php echo $reg_cart['id_prod']; ?>"><?php echo $reg_cart['nome_prod']; ?> </a></h6>
            <p><?php echo $reg_cart['quant']; ?>x - <span class="price"><?php echo $reg_cart['preco']; ?> €</span></p>
            <?php
            $soma+=$reg_cart['preco']*$reg_cart['quant'];
        ?>
        </li>
    <?php
    }
    ?>
    <li class="total">
        <a href="cart.php" class="btn btn-default hvr-hover btn-cart">Ver Carrinho</a>
        <span class="float-right"><strong>Total</strong>: <?php echo $soma; ?> €</span>
    </li>
</html>