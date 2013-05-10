<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

    <h2><a href ="http://localhost/Funeral/mvc">Home</a> Categories</h2>

        <a href="<?php APP_URL ?>add">Add a new category</a><br/>
        <form action="<?php echo APP_URL; ?>category/delete" method="post">
        <?php foreach($result as $category): ?>
            <p>
                <a href="<?php echo APP_URL; ?>product/listbycategory/<?php echo $category->id; ?>"><font size="5"><?php echo $category->name; ?></a><br />
                <a font size="3" href = "<?php echo APP_URL; ?>category/delete/<?php echo $category->id?>"><font size="3">Delete</a>
                <a font size="3" href = "<?php echo APP_URL; ?>category/edit/<?php echo $category->id?>"><font size="3">Edit</a>
            </p>
        <?php endforeach; ?>
        </form>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php'; ?>