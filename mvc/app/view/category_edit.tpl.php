<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

<h2>Edit category</h2>
<?php if ($form_error) : ?>
    <p><em>Error!</em></p>
<?php endif ?>
    <form action="<?php echo APP_URL; ?>category/edit/<?php echo $category->id; ?>" method="post">
        <label>Category name
            <input type="text" name="form[name]" value="<?php echo $category->name; ?>" />
        </label>
        <br />
        <input type="submit" name="form[action1]" value="Ok" />
        <input type="submit" name="form[action2]" value="Cancel" />
        </p>
    <a href = "<?php echo APP_URL; ?>category/list">Back</a><br />
    </form>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php';