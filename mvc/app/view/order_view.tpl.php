<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

<h2> Order information : </h2>
    <p>Order ID: <?php echo $order->id; ?></p>
    <p>Client ID: <?php echo $order->client_id; ?></p>
    <p>Contract ID: <?php echo $order->contract_id; ?></p>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php';