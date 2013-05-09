<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

<h2> User information: </h2>

    <p>Username: <?php echo $user->name; ?></p>
    <p>Password: <?php echo $user->password; ?></p>
    <p>Type: <?php echo $user->type; ?></p>
    <p>Client id: <?php echo $user->client_id; ?></p>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php';