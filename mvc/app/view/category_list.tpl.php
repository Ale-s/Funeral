<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

    <h2><a href ="http://localhost/Funeral/mvc">Home</a></h2> <h2>Categories</h2>


        <?php foreach ($result as $value) : ?>
            <?php foreach($value as $category){ ?>
        <p>
        <a href="<?php echo APP_URL; ?>product/view/<?php echo $category->id; ?>"><?php echo $category->name; ?></a>
            <?php } ?>
        </p>
        <?php endforeach; ?>
        </a>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php'; ?>