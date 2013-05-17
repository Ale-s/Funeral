<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>
<?php if ($form_csv) { ?>
    <p><em>Ati trimis date in fisier csv!</em></p>
<?php } ?>



<?php if ($form_error) { ?>
    <script type="text/javascript">;
        alert('acest client nu are nicio comanda!');
    </script>
<?php } ?>



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
            <td> Status:
            <?php
                if ($order->order_status == model_order::NOTVALID) {
                    echo "not valid";
                }
                else if ($order->order_status == model_order::VALID) {
                    echo "valid";
                }
                else if ($order->order_status == model_order::FINALISED) {
                    echo "finalised";
                }
            ?>
            </td>


         </tr>


    <?php } ?>
    </table>




    <form action="<?php echo APP_URL; ?>order/list/" method="post">
        Name : <select name="form[name]">
        <?php
        foreach($clients as $c){
            ?>
            <option value="<?php echo $c->id;?>"><?php echo $c->name;?></option>




        <?php }
        ?>

            </select><br />


    <input type="submit" name="form[action]" value="Export CSV" />
    </form>





<a href="<?php echo APP_URL; ?>admin/index">&laquo;Back </a>
<?php @include APP_PATH . 'view/snippets/footer.tpl.php';