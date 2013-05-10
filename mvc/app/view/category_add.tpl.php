<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

    <h2>Add a new category</h2>
<?php if ($form_error) : ?>
    <p><em>Error!</em></p>
<?php endif ?>

    <form action="<?php echo APP_URL; ?>category/add" method="post">
	<label>Category name
        <input type="text" name="form[name]" value="" />
    </label>
	<br />
	<input type="submit" name="form[action]" value="Add" />
    </p>
    <a href = "<?php echo APP_URL; ?>category/list">Back</a><br />
</form>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php'; ?>