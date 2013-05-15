<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

    <h2>My account details</h2>

<?php if ($form_error) { ?>
    <p><em>Nu ati reusit sa editati contul!</em></p>
<?php } ?>

    <form action="<?php echo APP_URL; ?>user/my_account/<?php echo $client->id; ?>" method="post">
        <label>Name
            <input type="text" name="form[name]" value="<?php echo $client->name?>" />
        </label>
        <br />
        <label>CNP
            <input type="text" name="form[cnp]" value="<?php echo $client->pin?> " />
        </label>
        <br />
        <label>Address
            <input type="text" name="form[address]" value="<?php echo $client->address?>" />
        </label>
        <br />
        <label>Telephone
            <input type="text" name="form[telephone]" value="<?php echo $client->phone?>" />
        </label>
        <br />
        <label>Username
            <input type="text" name="form[username]" value="<?php echo $user->name?>" />
        </label>
        <br />
        <label>Password
            <input type="text" name="form[password]" value="<?php echo $user->password?>" />
        </label>
        <br />

        <input type="submit" name="form[action]" value="Edit" />
        <br />

        <a href = "<?php echo APP_URL; ?>home/index/">Home</a><br />



    </form>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php';