<label>Reply</label>

<?php if ($form_error) { ?>
    <p><em>Nu ati reusit sa adaugati un nou comentariu!</em></p>
<?php } ?>

<form action="<?php echo APP_URL; ?>product/addMComments/<?php echo $comment->id; ?>" method="post">

    <input type="text" name="form[comment]" value="" />
    <input type="submit" name="form[action]" value="Reply!" /><br />
</form>