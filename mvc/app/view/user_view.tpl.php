<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

<h2> Informatiile despre user: </h2>
<?php
    echo
         'Username :   ' . $user->name . '<br /> ' .
         'Password :  ' .$user->password. '<br />'.
         'Type:  '. $user->type. '<br /> ' .
         'Client id:  '. $user->client_id;
?>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php';