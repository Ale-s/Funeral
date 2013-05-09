<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

<h2>Administration</h2>

<p>Welcome,<strong> <?php echo $admin->name; ?> </strong>!</p>

<div id="admin_choice">
    <a href="/Funeral/mvc/client/list/" >View clients </a>
    <br />
    <a href="#" >View orders </a>
</div>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php'; ?>