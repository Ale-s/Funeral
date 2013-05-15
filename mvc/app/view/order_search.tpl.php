<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

<h2> List of orders : </h2>
<?php
    if ($productsNr == 0){
        echo '<h3> Please select a product </h3>' . '</br>';
    }
    else {
        $n = count($orders);
        for ($i = 0; $i < $n; $i++) {
            $var = $orders[$i];
            if ($var == FALSE)
                echo "<b>" .$products[$i] ."</b>" . ' is not found in any order. </br></br>';
            else {
                echo "<b>" .$products[$i] .":</b> </br>";
                foreach($var as $key => $value){ ?>
                    <li> OrderID : <a href = "<?php echo APP_URL; ?>order/view/<?php echo $value ?>"><?php echo $value ?></a></li>
                <?php }
                echo "</br>";
            }
        }

     } ?>
<a href="<?php echo APP_URL; ?>product/displayProductsName">&laquo;Back</a>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php';
