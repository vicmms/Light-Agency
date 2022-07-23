<?php require_once 'main/header.php';
echo "<div class='justify-center'>";
foreach ($products as $key => $product) {
    $image = file_exists($product->image) ? $product->image : './assets/images/not-found.jpg';

    echo "
            
                <div class='card'>
                    <img src='" . $image . "' />
                    <div class='col-12'>
                        <span>" . $product->name . "</span>
                        <span>Modelo: " . $product->model . "</span>
                        <span>Precio: $" . $product->price . "</span>";
    echo isset($product->quantity)
        ?  "<span>Vendidos: " . $product->quantity . "</span>"
        : null;


    for ($i = 0; $i < $product->classification; $i++) {
        echo "<i class='material-icons color-yellow'>star</i>";
    }
    echo "  
                    <br><button class='bttn bttn-secondary'><a href='index.php?c=Product&a=fetchProductById&product_id=" . $product->id . "'>Ver producto</a></button>
                    </div>
                </div>
        ";
}
echo "</div>";

require_once 'main/header.php';
