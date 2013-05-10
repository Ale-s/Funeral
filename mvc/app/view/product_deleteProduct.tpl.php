<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>
<h1><a href = "<?php echo APP_URL; ?>">HOME</a><br /></h1>

<form action="<?php echo APP_URL; ?>product/deleteProduct/<?php echo $product->id; ?>" method="post">

    <label>sigur stergeti produsul <?php echo $product->name ?></label></ br>

    <input type="submit" name="form[action]" value="Delete" />

    <a href = "<?php echo APP_URL; ?>product/listbycategory/<?php echo $product->category_id?>">Back</a><br />
</form>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php'; ?>
