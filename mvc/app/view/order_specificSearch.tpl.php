<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>


<?php
if ($productsNr == 0){
    echo '<h3> Please select a product </h3>' . '</br>';
}
else { ?>
    <h2> List of special orders : </h2>
    <?php
        if (!empty($ordersId)){
            $n = count($ordersId);
            for ($i = 0; $i < $n; $i++) { ?>
                <li> Order : <a href = "<?php echo APP_URL; ?>order/view/<?php echo $ordersId[$i] ?>"><?php echo $ordersId[$i] ?></a> </li>
            <?php } ?>
        <?php }
    else {
        echo 'NO such orders </br>';
    }
    ?>
<?php } ?>
<a href="<?php echo APP_URL; ?>product/displayProductsName">&laquo;Back</a>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php'; ?>