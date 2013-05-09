<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

<h2>View products from  <?php echo $category->name; ?></h2>

<p>
    <?php
       foreach($products as $prods){
           ?>
           <p>Name:<?php echo $prods['product_name']; ?></p>

           <p>Price:<?php echo $prods['product_price']; ?></p>


           <?php }
           ?>

    <a href = "/Funeral/mvc/product/addProduct/<?php echo $category->id; ?>">Add a product</a>

</p>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php'; ?>