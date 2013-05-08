<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

<h2>PRODUCT NAME: <?php echo $product->name; ?></h2>

<p>DESCRIPTION:<?php echo $product->description; ?></p>

<p>PRICE:<?php echo $product->price; ?></p>

<p>AMOUNT:<?php echo $product->amount; ?></p>

<p>CATEGORY:<?php echo $product->category_id; ?></p>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php'; ?>

