<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

<h3>Login Page</h3>
<?php if ($form_error) { ?>
    <p>*Could not login.</p>
<?php } ?>

    <form action="<?php echo APP_URL; ?>login/login/<?php echo $category->id; ?>" method="post">
        <label>Username
            <input type="text" name="form[username]" value="" />
        </label>
        <br />
        <label>Password
            <input type="password" name="form[password]" value="" />
        </label>
        <br />

        <input type="submit" name="form[action]" value="Login" />

        <a href = "<?php echo APP_URL; ?>user/register/">Not registred yet?</a>
        <br /> <hr />
        <a href = "<?php echo APP_URL; ?>home/index">&laquo;Back to homepage</a>


    </form>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php';