<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

<h2> Order information : </h2>
<form action="<?php echo APP_URL; ?>order/changeStatus/<?php echo $order->id; ?>" method="post">
    <li>Order ID: <?php echo $order->id; ?></li>
    <li>Client ID: <?php echo $order->client_id; ?></li>
    <li>Contract ID: <a href = "<?php echo APP_URL; ?>contract/view/<?php echo $order->contract_id ?>"><?php echo $order->contract_id; ?> <a/></li>
    <?php if ($_SESSION['user_type'] == 1) {?>
    <li><select name="form[option]">
            <?php foreach (array(model_order::NOTVALID => 'Not Valid', model_order::VALID => 'Valid', model_order::FINALISED => 'Finalised') as $status => $status_name) : ?>
                <option value="<?php echo $status; ?>"<?php if ($status == $order->order_status) : ?> selected = "selected"<?php endif; ?>><?php echo $status_name; ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" name="form[action]" value="Change"/>
    </li>

    <a href = "<?php echo APP_URL; ?>order/list/">&laquo;Back</a>
    <?php }
          else if ($_SESSION['user_type'] == 0){ ?>
              <a href = "<?php echo APP_URL ?>home/">&laquo;Back to home page</a>
    <?php } ?>
</form>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php'; 