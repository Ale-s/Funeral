<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

    <h2>PRODUCT NAME: <?php echo $product->name; ?></h2>

    <p>DESCRIPTION:<?php echo $product->description; ?></p>

    <p>PRICE:<?php echo $product->price; ?></p>

    <p>AMOUNT:<?php echo $product->amount; ?></p>

    <p>CATEGORY:<?php echo $product->category_id; ?></p>

    <a href = "<?php echo APP_URL; ?>category/load">Go to categories page</a>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php'; ?>
