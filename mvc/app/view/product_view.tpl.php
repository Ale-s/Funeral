<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

    <h2> Informatiile despre produs: </h2>
<?php
echo
    'Product id :   ' . $product->id . '<br /> ' .
    'Product name :  ' .$product->name. '<br />'.
    'Product description :  '. $product->description. '<br />'.
    'Product price :  ' .$product->price. '<br />'.
    'Product amount :  ' .$product->amount. '<br />'.
    'Product category :  ' .$product->category_id. '<br />';
?>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php';