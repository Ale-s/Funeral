<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

<h2>Welcome!
    <a href = "<?php echo APP_URL; ?>login/login/"><font size="3">Log in /</a>
    <a href = "<?php echo APP_URL; ?>cart/view/"><font size="3"> View shooping cart </a>
</h2>
<p><a href = "<?php echo APP_URL; ?>category/list/"> Categories list </a></p>
<p><a href = "<?php echo APP_URL; ?>about/view/"> About us </a></p>
<p><a href = "<?php echo APP_URL; ?>contact/view/"> Contact </a></p>
<?php @include APP_PATH . 'view/snippets/footer.tpl.php'; ?>