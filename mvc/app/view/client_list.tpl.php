<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>
<h2>Clients List:</h2>
<ol>

<?php foreach ($clients as $client ) {
    $id = $client->id; ?>
    <li>
        <a href = "<?php echo APP_URL ?>client/view/<?php echo $id ?>">
            <?php
                echo $client->name . "</ br>";
            ?>
        </a>
    </li>
<?php } ?>
</ol>
<a href="<?php echo APP_URL; ?>admin/index/">&laquo;Back</a>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php';