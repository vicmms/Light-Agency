<?php require_once 'main/header.php'; ?>
<h2><?php echo isset($_REQUEST['category_name']) ? $_REQUEST['category_name'] : 'Todos los productos' ?></h2>
<br>
<div class="flex justify-between">
    <span class="text-xl">Productos destacados</span>
    <a href="index.php?c=Product&a=fetchAll&all=1">Ver todos</a>
</div>
<div class="slider">
    <?php
    foreach ($featured_products as $key => $product) {
        $image = file_exists($product->image) ? $product->image : './assets/images/not-found.jpg';
        echo "
                <a href='index.php?c=Product&a=fetchProductById&product_id=" . $product->id . "'>
                    <img src='./" . $image . "'>
                    <span>" . $product->name . "</span>
                </a>
            ";
    }
    ?>
</div>
<br><br>
<div class="flex justify-between">
    <span class="text-xl">Productos mas vendidos</span>
    <a href="index.php?c=Product&a=fetchAll">Ver todos</a>
</div>
<div class="slider">
    <?php
    foreach ($best_selled_products as $key => $product) {
        $image = file_exists($product->image) ? $product->image : './assets/images/not-found.jpg';
        echo "
                <a href='index.php?c=Product&a=fetchProductById&product_id=" . $product->id . "'>
                <img src='./" . $image . "'>
                    <span>" . $product->name . "</span>
                </a>
            ";
    }
    ?>
</div>
<?php require_once 'main/header.php'; ?>