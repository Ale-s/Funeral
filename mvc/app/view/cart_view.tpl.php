<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

<h2>Your shopping cart :</h2>
<form action="<?php echo APP_URL; ?>cart/deleteProduct/" method="post">
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
               <input type ="submit" name="form[delete]" value = "Delete this product">
               <input type="hidden" name='form[id]' value='<?php echo $product_id ?>'/>
               <input type="hidden" name='form[quantity]' value='<?php echo $quantity ?>' />
           </td>
       </tr>
   <?php }
?>
</table>
</form>

<h3> Your final price is : <?php echo $total_price ?></h3>
<a href = "<?php echo APP_URL ?>home/index">&laquo;Back to home page</a>
<?php @include APP_PATH . 'view/snippets/footer.tpl.php';