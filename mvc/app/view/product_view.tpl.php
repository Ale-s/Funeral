<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>
<h1><a href = "<?php echo APP_URL; ?>">HOME</a><br /></h1>
    <h2>PRODUCT NAME: <?php echo $product->name; ?></h2>

    <?php if ($form_error) { ?>
         <p><em>Eroare.Nu ati reusit sa puneti comanda!</em></p>
    <?php } ?>

    <form action="<?php echo APP_URL; ?>product/view/<?php echo $product->id; ?>" method="post">

    <p>DESCRIPTION:<?php echo $product->description; ?></p>

    <p>PRICE:<?php echo $product->price; ?></p>

    <p>AMOUNT:<?php echo $product->amount; ?></p>

    <p>CATEGORY:<?php echo $product->category_id; ?></p>

    <br />
    <br />
    <br />


    <p>Alegeti cantitatea dorita</p>
    <input type="text" name="form[amount]" value="" />
    <input type="submit" name="form[action]" value="Add to cart!" /><br />

     <br />
     <br />
     <br />
    <?php    if ($_SESSION['user_type'] == 1) {?>
    <a href = "<?php echo APP_URL; ?>product/deleteProduct/<?php echo $product->id?>">Delete this product</a><br />
    <a href = "<?php echo APP_URL; ?>product/editProduct/<?php echo $product->id?>">Edit this product</a><br />
    <?php } ?>
    <a href = "<?php echo APP_URL; ?>product/listbycategory/<?php echo $product->category_id?>">Back</a><br />
    <a href = "<?php echo APP_URL; ?>category/list">Go to categories page</a>
    </form>
    <?php
        if($_SESSION['loggedin'] == 1) { ?>
            <h2>Comments:</h2>
            <ol>
                <?php  $comments = model_comment::load_by_product_id($product->id);
                foreach($comments as $comment) {  ?>
                    <li> <?php echo $comment['comment']; ?> </li>
                <?php } ?>
            </ol>
            <?php
            @include APP_PATH . 'view/comment_add.tpl.php';
        }
     ?>
<?php
if($_SESSION['loggedin'] != 1) { ?>
    <h2>Comments:</h2>
    <ol>
        <?php  $comments = model_comment::load_by_product_id($product->id);
        foreach($comments as $comment) {  ?>
            <li> <?php echo $comment['comment']; ?> </li>
        <?php } ?>
    </ol>
    <?php
    //@include APP_PATH . 'view/comment_add.tpl.php';
}
?>





<?php @include APP_PATH . 'view/snippets/footer.tpl.php'; ?>
