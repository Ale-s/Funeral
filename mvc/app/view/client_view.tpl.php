<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

    <h3>This is the client page</h3>
    <ul><strong><h4>Client details</h4></strong>

        <li>Name:<strong> <?php echo $client->name; ?></strong></li>
        <li>PIN:<strong> <?php echo $client->pin; ?></strong></li>
        <li>Address:<strong> <?php echo $client->address; ?></strong></li>
        <li>Phone:<strong> <?php echo $client->phone; ?></strong></li>

    </ul>
    <a href="<?php echo APP_URL; ?>client/list/">&laquo;Back</a>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php';
