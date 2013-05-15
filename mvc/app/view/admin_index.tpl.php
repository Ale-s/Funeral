<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>


<h2>Administration page:</h2>

<div id="admin_choice">
    <ol>
    <li><a href="<?php echo APP_URL; ?>client/list/" >View clients </a></li>
    <li><a href="<?php echo APP_URL; ?>order/list/" >View orders </a></li>
    <li><a href ="<?php echo APP_URL; ?>product/displayProductsName">Search products in orders</a></li>
    </ol>
</div>
<a href="<?php echo APP_URL; ?>home/index/">&laquo;Back</a>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php';