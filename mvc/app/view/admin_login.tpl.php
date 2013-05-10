<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

<h2>Autentificare admin</h2>

<?php if ($form_error) : ?>
	<p><em>Utilizator sau parola gresita. Reincercati.</em></p>
<?php endif ?>

<form action="<?php echo APP_URL; ?>admin/login" method="post">
	<label>Utilizator
		<input type="text" name="form[user]" value="" />
	</label>
	<br />
	<label>Parola
		<input type="password" name="form[password]" value="" />
	</label>
	<br />
	<input type="submit" name="form[action]" value="Trimite" />
</form>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php'; ?>