<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>
<h2>Contracte</h2>

<p>Contract ID: <?php echo $contract->id; ?></p>
<p>Contract date: <?php echo $contract->date; ?></p>
<p>Contract final price: <?php echo $contract->final_price; ?></p>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php';