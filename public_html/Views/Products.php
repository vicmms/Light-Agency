<?php require_once 'main/header.php'; ?>
<div class="flex justify-between">
    <span class="text-xl">Productos destacados</span>
    <a href="#">Ver todos</a>
</div>
<div class="slider">
    <?php
    foreach ($featured_products as $key => $product) {
        echo "
                <a href='#'>
                    <img src='./assets/images/laptop.jpg'>
                    <span>" . $product->name . "</span>
                </a>
            ";
    }
    ?>
</div>
<br><br>
<div class="flex justify-between">
    <span class="text-xl">Productos mas vendidos</span>
    <a href="#">Ver todos</a>
</div>
<div class="slider">
    <?php
    foreach ($best_selled_products as $key => $product) {
        echo "
                <a>
                    <img src='./assets/images/laptop.jpg'>
                    <span>" . $product->name . "</span>
                </a>
            ";
    }
    ?>
</div>
<?php require_once 'main/header.php'; ?>