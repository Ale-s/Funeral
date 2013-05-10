<?php
?>
<h3>Clients List</h3>
<?php foreach ($clients as $client ) {
    $id = $client->id; ?>
<li>

    <a href=<?php echo "/Funeral/mvc/client/view/" .$id ?>>
        <?php
            echo $client->name . "</ br>";
        ?>
    </a>
</li>
<?php } ?>
    <a href="<?php echo APP_URL; ?>admin/index/">&laquo;Back</a>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php'; ?>