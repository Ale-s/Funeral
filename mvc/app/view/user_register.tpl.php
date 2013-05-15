<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

    <h2>Register user</h2>
<?php if ($form_error) { ?>
    <p><em>Reincercati.</em></p>

<?php } ?>
    <form action="<?php echo APP_URL; ?>user/register" method="post">
    <label>Name
        <input type="text" name="form[name]" value="" />
    </label>
    <br />
	<label>CNP
        <input type="text" name="form[cnp]" value="" />
    </label>
	<br />
<label>Address
    <input type="text" name="form[address]" value="" />
</label>
	<br />
<label>Telephone
    <input type="text" name="form[telephone]" value="" />
</label>
	<br />
<label>Username
    <input type="text" name="form[username]" value="" />
</label>
	<br />
	<label>Password
        <input type="password" name="form[password]" value="" />
    </label>
	<br />
	<input type="submit" name="form[action]" value="Register!" />
</form>
<hr />
<a href="<?php echo APP_URL; ?>home/index/">&laquo;Back to homepage</a>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php';