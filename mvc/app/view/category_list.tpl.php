<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

    <h2><a href ="http://localhost/Funeral/mvc">Home</a></h2> <h2>Categories</h2>

        <form action="<?php echo APP_URL; ?>category/delete" method="post">
        <?php foreach($result as $category): ?>
            <p>
                <a href="<?php echo APP_URL; ?>product/listbycategory/<?php echo $category->id; ?>"><font size="5"><?php echo $category->name; ?></a>
                <a font size="3" href = "<?php echo APP_URL; ?>category/delete/<?php echo $category->id?>"><font size="3">Delete</a><br />

            </p>
        <?php endforeach; ?>
        </form>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php'; ?>