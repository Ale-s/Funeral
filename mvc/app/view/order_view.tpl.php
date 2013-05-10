<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

<h2> Order information : </h2>
    <li>Order ID: <?php echo $order->id; ?></li>
    <li>Client ID: <?php echo $order->client_id; ?></li>
    <li>Contract ID: <a href = "<?php echo APP_URL; ?>contract/view/<?php echo $order->contract_id ?>"><?php echo $order->contract_id; ?> <a/></li>
    <a href = "<?php echo APP_URL; ?>order/list/">&laquo;Back</a>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php';