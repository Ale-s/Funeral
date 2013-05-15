<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

<h2> Select products : </h2>
<form action = "<?php echo APP_URL; ?>order/displaySpecificOrders" method="post">
    <?php
        foreach($products as $product){
    ?>
    <input type = "checkbox" name = "product[]" value = "<?php echo $product['product_name']; ?>" > <?php echo $product['product_name'] ?> <br>
    <?php } ?>
    <input type = "submit" value = GO! >
</form>
<a href="<?php echo APP_URL; ?>admin/index">&laquo;Back</a>
