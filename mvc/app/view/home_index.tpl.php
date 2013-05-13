<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

<h2>

    <?php
    if (!isset($_SESSION['loggedin'])) { ?>
        Welcome!
        <a href = "<?php echo APP_URL; ?>login/login/"><font size="3">Log in /</a>
    <?php
    }
    else {
    ?>  Welcome, <?php echo $_SESSION['user_name']; ?> !
        <a href = "<?php echo APP_URL; ?>login/logout/"><font size="3">Log Out</a>
        <a href = "<?php echo APP_URL; ?>order/myOrders"><font size="3">My orders</a>
    <?php } ?>
    <?php if ($_SESSION['user_type'] == 1) { ?>
        <a href = "<?php echo APP_URL;?>admin/index"><font size="3">Admin page</a>
    <?php } ?>
    <a href = "<?php echo APP_URL; ?>product/searchProduct"><font size="3">Search a product</a>
    <a href = "<?php echo APP_URL; ?>cart/view/"><font size="3"> View shooping cart </a>
</h2>
<p><a href = "<?php echo APP_URL; ?>category/list"> Categories list </a></p>
<p><a href = "<?php echo APP_URL; ?>about/view/"> About us </a></p>
<p><a href = "<?php echo APP_URL; ?>contact/view/"> Contact </a></p>
<?php @include APP_PATH . 'view/snippets/footer.tpl.php'; ?>