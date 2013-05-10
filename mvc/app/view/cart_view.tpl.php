<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

<h2>Your shopping cart :</h2>
<table border = 2>
    <?php
        $total_price = 0;
        foreach ($_SESSION['cart'] as $product_id => $quantity){
            $product = model_product::load_by_id($product_id);
            $price = $product->price * $quantity;
            $total_price +=$price;
     ?>
       <tr>
           <td>Product name: <?php echo $product->name ?> </td>
           <td>Quantity: <?php echo $quantity?></td>
           <td>Price: <?php echo $price?></td>
           <td>
               <input type ="button" name="form[action]" value = "Delete this product">
           </td>
       </tr>
   <?php }
?>
</table>
<h2> Your final price is : <?php echo $total_price ?></h2>
<a href = "<?php echo APP_URL ?>/home/">Back to home page</a>
<?php @include APP_PATH . 'view/snippets/footer.tpl.php'; ?>