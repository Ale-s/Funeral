

<h2>Add comment :</h2>

<?php if ($forms_error) { ?>
    <p><em>Eroare.</em></p>
<?php } ?>
<form action="<?php echo APP_URL; ?>product/addComment/<?php echo $product->id; ?>" method="post">
<input type="text" name="form[comment]" value="" />
<input type="submit" name="form[action]" value="Add comment!" /><br />

</form>