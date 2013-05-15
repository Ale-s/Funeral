<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>
<h3>Categories :</h3>

        <form action="<?php echo APP_URL; ?>category/delete" method="post">
        <?php foreach($result as $category): ?>
            <p>
                <a href="<?php echo APP_URL; ?>product/listbycategory/<?php echo $category->id; ?>"><?php echo $category->name; ?></a><br />
                <?php if ($_SESSION['user_type'] == 1) {?>
                <a href = "<?php echo APP_URL; ?>category/delete/<?php echo $category->id?>">Delete</a>
                <a href = "<?php echo APP_URL; ?>category/edit/<?php echo $category->id?>">Edit</a>
                <?php } ?>
            </p>
        <?php endforeach; ?>
        </form>
    <hr>
<?php if ($_SESSION['user_type'] == 1) {?>
    <a href="<?php APP_URL ?>add">Add a new category</a><br/>
<?php } ?>
<hr>
<a href ="<?php echo APP_URL ?>home/index">&laquo;Back to homepage</a>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php';