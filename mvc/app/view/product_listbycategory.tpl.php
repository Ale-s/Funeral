<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>


<h2> Products from:  <?php echo $category->name; ?></h2>

    <table border = 2>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Details</th>
        </tr>
    <?php
       foreach($products as $prods){
           ?>

           <tr>
           <td><?php echo $prods['product_name']; ?></td>

           <td><?php echo $prods['product_price']; ?></td>

           <td><a href = "<?php echo APP_URL ?>product/view/<?php echo $prods['product_id']; ?>">View details</a></td>
            </tr>

           <?php }
           ?>
    </table>
    <?php    if ($_SESSION['user_type'] == 1) {?>
    <h3><a href = "<?php echo APP_URL ?>/product/addProduct/<?php echo $category->id; ?>">Add a new product</a></h3><br />
    <?php } ?>
    <a href = "<?php echo APP_URL ?>category/list">&laquo;Back</a>


<hr>
<a href = "<?php echo APP_URL; ?>/home/index">&laquo;Back to homepage</a>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php';