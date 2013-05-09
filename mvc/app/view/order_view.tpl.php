<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

<h2> Order information : </h2>
    <p>Order ID: <?php echo $order->id; ?></p>
    <p>Client ID: <?php echo $order->client_id; ?></p>
    <p>Contract ID:<a href="<?php APP_PATH ?>/contract/view/ <?php echo $order->contract_id; ?>"><?php echo $order->contract_id; ?></a></p>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php';