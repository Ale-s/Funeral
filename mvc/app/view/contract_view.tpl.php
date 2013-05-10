<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>
<h2>Contract</h2>

<p>Contract ID: <?php echo $contract->id; ?></p>
<p>Contract date: <?php echo $contract->date; ?></p>
<p>Contract final price: <?php echo $contract->final_price; ?></p>
<a href = "<?php echo APP_URL; ?>order/list/">&laquo;Back</a>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php';