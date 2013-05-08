<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

    <h2>Categorii</h2>
    <p>
    <a href="<?php echo "www.tralala" ?>">
        <?php foreach ($result as $value) {

                echo $value['category_name'] . "<br>";
         }
        ?>
    </a>
    </p>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php'; ?>