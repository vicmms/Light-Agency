<?php
// require_once("config.php");
require_once("../php/Controllers/ProductController.php");
// if(isset($_GET['m'])):
//     $metodo =   $_GET['m'];
//     if(method_exists(modeloController,$metodo)):
//         modeloController::{$metodo}();
//     endif;
// else:
//     modeloController::index();
// endif;
$product = new ProductController;
$product->index();
// require_once("main/header.php");
// require_once("main/footer.php");
