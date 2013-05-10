<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>
<h2>Delete Category</h2>
<?php if ($form_error) : ?>
    <p><em>You can't delete this category because it contains products!</em></p>
<?php endif ?>
<form action="<?php echo APP_URL; ?>category/delete/<?php echo $category->id; ?>" method="post">
    <label>Doriti sa stergeti categoria <?php echo $category->name . "?" ?></label></ br>
    <input type="submit" name="form[action]" value="Delete" />
    <a href = "<?php echo APP_URL; ?>category/list">Back</a><br />
</form>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php'; ?>
