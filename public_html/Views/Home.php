<?php require "main/header.php" ?>
<h2>Productos destacados</h2>
<ul>
    <?php
    foreach ($products as $key => $product) {
        echo "<li>" . $product['name'] . "</li>";
    }
    ?>
</ul>
<?php require "main/footer.php" ?>