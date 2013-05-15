<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>
<h1><a href = "<?php echo APP_URL; ?>">HOME</a><br /></h1>
    <h2>PRODUCT NAME: <?php echo $product->name; ?></h2>

    <?php if ($form_error) { ?>
    <p><em>Eroare.Nu ati reusit sa puneti comanda!</em></p>
    <?php } ?>


    <p>DESCRIPTION:<?php echo $product->description; ?></p>

    <p>PRICE:<?php echo $product->price; ?></p>

    <p>AMOUNT:<?php echo $product->amount; ?></p>

    <p>CATEGORY:<?php echo $product->category_id; ?></p>

    <p>RATING:<?php echo $product->average; ?></p></br>
    <a href = "<?php echo APP_URL; ?>product/deleteProduct/<?php echo $product->id?>">Delete this product</a>
    <a href = "<?php echo APP_URL; ?>product/editProduct/<?php echo $product->id?>">Edit this product</a>
    <br />
    <br />
    <form action="<?php echo APP_URL; ?>cart/add/<?php echo $product->id; ?>" method="post">
     <p>Alegeti cantitatea dorita</p>
    <input type="text" name="form[amount]" value="" />
    <input type="submit" name="form[action]" value="Add to cart!" /><br />

     <br />
     <br />
     <br />
    </form>

   <form action="<?php echo APP_URL; ?>product/view/<?php echo $product->id; ?>" method="post">

    <?php    if ($_SESSION['user_type'] == 0) {?>
       <p>RATING:
       <input type="radio" name="form[rating]" value=1>1
       <input type="radio" name="form[rating]" value=2>2
       <input type="radio" name="form[rating]" value=3>3
       <input type="radio" name="form[rating]" value=4>4
       <input type="radio" name="form[rating]" value=5>5
       <input type="submit" name="form[add_rating]" value="Vote" /><br />
       </p>
  <?php } ?>

    </form>

<?php if ($error) { ?>
    <p><em>You have already added rating for this product. Thank you!!</em></p>
<?php } ?>
     <br />
    <a href = "<?php echo APP_URL; ?>product/listbycategory/<?php echo $product->category_id?>">Back</a><br />
    <a href = "<?php echo APP_URL; ?>category/list">Go to categories page</a>

    <?php
        if($_SESSION['loggedin'] == 1) { ?>
            <h2>Comments(<?php $comment = model_comment::count_comments($product->id); echo $comment;?>):</h2>
                <ul>
                    <?php  $comments = model_comment::load_by_product_id($product->id);

                    foreach($comments as $key => $value) {  ?>
                        <li> <?php echo $value['comment']; ?>  </li>
                                <?php
                               $m_comments = model_comment::load_by_comment_id($value['comment_id']); ?>
                        <ol>
                        <?php
                        foreach($m_comments as $key => $secondvalue) { ?>
                                <li> <?php echo $secondvalue->comment; ?>    </li>
                        <?php } ?>
                            </ol>

                <a href = "<?php echo APP_URL; ?>product/addMComments/<?php echo $value['comment_id'] ?>">Reply</a><br />
         <?php } ?>
     </ul>

     <?php
     @include APP_PATH . 'view/comment_add.tpl.php';
 }?>

<?php
if($_SESSION['loggedin'] != 1) { ?>
    <h2>Comments(<?php $comment = model_comment::count_comments($product->id); echo $comment;?>):</h2>
    <ul>
        <?php  $comments = model_comment::load_by_product_id($product->id);

        foreach($comments as $key => $value) {  ?>
            <li> <?php echo $value['comment']; ?>  </li>
            <?php
            $m_comments = model_comment::load_by_comment_id($value['comment_id']); ?>
            <ol>
                <?php
                foreach($m_comments as $key => $secondvalue) { ?>
                    <li> <?php echo $secondvalue->comment; ?>    </li>
                <?php } ?>
            </ol>


        <?php } ?>
    </ul>

    <?php
   
}?>



















<?php @include APP_PATH . 'view/snippets/footer.tpl.php'; ?>
