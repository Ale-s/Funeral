<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

<h2>Administration</h2>

<!-- <p>Welcome,<strong> <?php echo $admin->name; ?> </strong>!</p> -->
<p> Welcome admin ! </p>
<div id="admin_choice">
    <a href="<?php echo APP_URL; ?>client/list/" >View clients </a>
    <br />
    <a href="<?php echo APP_URL; ?>order/list/" >View orders </a>
</div>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php'; ?>