<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

    <h2>Add new product</h2>

<?php if ($form_error) { ?>
    <p><em>Nu ati reusit sa editati produsul dorit!</em></p>
<?php } ?>

    <form action="<?php echo APP_URL; ?>product/editProduct/<?php echo $product->id; ?>" method="post">
        <label>Name
            <input type="text" name="form[name]" value="<?php echo $product->name?>" />
        </label>
        <br />
        <label>Description
            <input type="text" name="form[description]" value="<?php echo $product->description?> " />
        </label>
        <br />
        <label>Price
            <input type="text" name="form[price]" value="<?php echo $product->price?>" />
        </label>
        <br />
        <label>Amount
            <input type="text" name="form[amount]" value="<?php echo $product->amount?>" />
        </label>
        <br />

        <input type="submit" name="form[action]" value="Edit" />
        <br />

        <a href = "<?php echo APP_URL; ?>product/view/<?php echo $product->id; ?>">Back to this product</a><br />

        <a href = "<?php echo APP_URL; ?>product/listbycategory/<?php echo $product->category_id; ?>">Back to the list</a>


    </form>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php'; ?>