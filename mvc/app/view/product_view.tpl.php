<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

    <h2>PRODUCT NAME: <?php echo $product->name; ?></h2>

    <p>DESCRIPTION:<?php echo $product->description; ?></p>

    <p>PRICE:<?php echo $product->price; ?></p>

    <p>AMOUNT:<?php echo $product->amount; ?></p>

    <p>CATEGORY:<?php echo $product->category_id; ?></p>


     <input type="submit" name="form[action]" value="Add to cart!" />

    <a href = "<?php echo APP_URL; ?>product/deleteProduct/<?php echo $product->id?>">Delete this product</a><br />
    <a href = "<?php echo APP_URL; ?>product/editProduct/<?php echo $product->id?>">Edit this product</a><br />

    <a href = "<?php echo APP_URL; ?>product/listbycategory/<?php echo $product->category_id?>">Back</a><br />
    <a href = "<?php echo APP_URL; ?>category/list">Go to categories page</a>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php'; ?>
