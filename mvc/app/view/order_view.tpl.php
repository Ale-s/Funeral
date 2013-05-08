<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

<h2> Informatiile despre order: </h2>
<?php
     echo
        'Order id :   ' . $order->id . '<br /> ' .
        'Client id :  ' .$order->client_id. '<br />'.
        'Contract id :  '. $order->contract_id ;
?>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php';