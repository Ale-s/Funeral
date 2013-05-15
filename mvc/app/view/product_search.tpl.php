<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

    <h3>Search a product</h3>


<form action="<?php echo APP_URL; ?>product/searchProduct" method="post">
    <label>Search
        <input type="text" name="form[word]" />
    </label>
    <input type="submit" name="form[action]" />
    <?php
        foreach ($products_list as $row) {
            if($row === 'No products found!') {
                ?> <p><?php echo $row; ?></p>
                <?php
            }
            else {
    ?>
        <li><a href="<?php echo APP_URL ?>product/view/<?php echo $row['product_id']; ?>"><?php echo $row['product_name']; ?></a></li>
    <?php
            }
        }
    ?>
</form>

    <a href = "<?php echo APP_URL ?>home/">&laquo;Back to home page</a>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php'; ?>