<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

<?php
    $select1 = "";
    $select2 = "";
    $select3 = "";
    if ($order->order_status == model_order::NOTVALID) {
        $select1 = 'selected = "selected"';
    }
    else if ($order->order_status == model_order::VALID) {
        $select2 = 'selected = "selected"';
    }
    else if ($order->order_status == model_order::FINALISED) {
        $select3 = 'selected = "selected"';
    }

?>
<h2> Order information : </h2>
<form action="<?php echo APP_URL; ?>order/changeStatus/<?php echo $order->id; ?>" method="post">
    <li>Order ID: <?php echo $order->id; ?></li>
    <li>Client ID: <?php echo $order->client_id; ?></li>
    <li>Contract ID: <a href = "<?php echo APP_URL; ?>contract/view/<?php echo $order->contract_id ?>"><?php echo $order->contract_id; ?> <a/></li>
    <li><select name="form[option]">
            <option value="<?php echo model_order::NOTVALID; ?>"<?php echo $select1; ?>>Not Valid</option>
            <option value="<?php echo model_order::VALID; ?>"<?php echo $select2; ?>>Valid</option>
            <option value="<?php echo model_order::FINALISED; ?>"<?php echo $select3; ?>>Finalised</option>
        </select>
        <input type="submit" name="form[action]" value="Change"/>
    </li>
    <a href = "<?php echo APP_URL; ?>order/list/">&laquo;Back</a>
</form>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php';