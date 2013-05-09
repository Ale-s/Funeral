<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

    <h2> List of orders : </h2>
    <table border = 2>
    <?php
        $index = 1;
        foreach($orders as $order) {
            $client = $order->get_client();
    ?>
        <tr>
            <td> Order <?php echo $index++; ?> : </td>
            <td><a href="<?php echo APP_URL; ?>order/view/<?php echo $order->id ?>"> <?php echo $order->id ?> </a> </td>
            <td> <?php echo $client->name; ?> </td>
            <td>Aici vine statusul comenzii</td>
         </tr>

    <?php } ?>
    </table>
    <a href="<?php echo APP_URL; ?>admin/index">&laquo;Back</a>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php';