<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

<h3>Orders for client <?php echo $_SESSION['user_name']; ?> :</h3>
        <?php foreach($orders as $row) { ?>
    <li>Order: <a href="<?php echo APP_URL;?>order/view/<?php echo $row['order_id'];?>"><?php echo $row['order_id'];?></a>,
        Status: <?php if ($row['status'] == 1) {
                          echo 'Not Valid';
                      }
                      else if ($row['status'] == 2) {
                          echo 'Valid';
                      }
                      else if ($row['status'] == 3) {
                          echo 'Finalised';
                      }?></li>
        <?php } ?>
    <br />
    <a href = "<?php echo APP_URL ?>home/">&laquo;Back to home page</a>
<?php @include APP_PATH . 'view/snippets/footer.tpl.php'; ?>