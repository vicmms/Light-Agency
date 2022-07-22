<?php
require_once 'main/header.php';

echo "
    <div>
        <span class='title'>" . $product->name . "</span>
        <div class='row pt-1'>
            <div class='col-6'>
                <div class='img-card'><img src='assets/images/1.jpg' /></div>
            </div>
            <div class='col-6 info'>
                <span>Modelo: " . $product->model . "</span>
                <span>Descripción: " . $product->description . "</span>
                <span>Precio: $" . number_format($product->price, 2, '.', ',') . "</span>
                <div class='flex'>
                    <select id='opt' onchange='calculatePayment(" . $product->price . ")'>
                        <option value='1'>1</option>
                        <option value='6'>6</option>
                        <option value='12'>12</option>
                    </select>
                    <span id='lblPayment'> Pago de " . number_format($product->price, 2, '.', ',') . " sin intereses</span>
                </div><br/>
                <div class='flex justify-center'>
                    <button class='bttn bttn-primary mr-2'>Comprar</button>
                    <button class='bttn bttn-secondary'><a href='#'>Productos similares</a></button>
                </div>
            </div>
        </div>
        <div class='comments'>
                    <h3>Comentarios sobre este articulo</h3>
         ";
foreach ($comments as $key => $comment) {
    echo "<div class='flex justify-between mb-2'>
            <span>" . $comment->name . ": " . $comment->text . "</span>
            <span style='display:inline-flex;'>";
    for ($i = 0; $i < $comment->classification; $i++) {
        echo "<i class='material-icons color-yellow'>star</i>";
    }
    echo
    "</span>
        </div>";
}
echo "         
    </div>
";
?>
<script>
    function calculatePayment(product_price) {

        const options = {
            style: 'currency',
            currency: 'USD'
        };
        const numberFormat = new Intl.NumberFormat('en-US', options);
        months = document.getElementById("opt").value;
        payment = numberFormat.format(product_price / months);
        text = months > 1 ? 'Pagos de ' + payment : 'Pago de ' + payment;
        document.getElementById("lblPayment").innerHTML = text;
    }
</script>
<?php require_once 'main/footer.php';
