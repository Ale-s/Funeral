<?php
?>
<h3>Clients List</h3>
<?php foreach ($clients as $value ) {
    $id = $value['client_id']; ?>
<li>

    <a href=<?php echo "/Funeral/mvc/client/view/" .$id ?>>
        <?php
            echo $value['client_name'] . "</ br>";
        ?>
    </a>
</li>
<?php } ?>
    <a href="/Funeral/mvc/app/view/admin_index.tpl.php">&laquo;Back</a>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php'; ?>