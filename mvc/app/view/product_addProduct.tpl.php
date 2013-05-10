<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

    <h2>Add new product</h2>

<?php if ($form_error) { ?>
    <p><em>Nu ati reusit sa adaugati un nou produs!</em></p>
<?php } ?>

    <form action="<?php echo APP_URL; ?>product/addProduct/<?php echo $category->id; ?>" method="post">
	<label>Name
        <input type="text" name="form[name]" value="" />
    </label>
	<br />
	<label>Description
        <input type="text" name="form[description]" value="" />
    </label>
	<br />
    <label>Price
         <input type="text" name="form[price]" value="" />
    </label>
	<br />
    <label>Amount
          <input type="text" name="form[amount]" value="" />
    </label>
	<br />
    <!--
    <label>Category
          <input type="text" name="form[category]" value="" />
    </label>
    -->
	<br />


	<input type="submit" name="form[action]" value="Add" />

    <a href = "<?php echo APP_URL; ?>product/listbycategory/<?php echo $category->id; ?>">Back to the list</a>


    </form>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php'; ?>