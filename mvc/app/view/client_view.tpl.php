<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

    <h2>This is the client page</h2>
    <ul><strong>&raquo;Client details</strong>

        <li>Name:<strong> <?php echo $client->name; ?></strong></li>
        <li>PIN:<strong> <?php echo $client->pin; ?></strong></li>
        <li>Address:<strong> <?php echo $client->address; ?></strong></li>
        <li>Phone:<strong> <?php echo $client->phone; ?></strong></li>

    </ul>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php'; ?>