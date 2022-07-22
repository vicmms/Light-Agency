<?php
require_once("../php/Models/Conexion.php");
$controller = 'Home';

if (isset($_REQUEST['c'])) {
    $controller = $_REQUEST['c']; //strlower
    $action = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'index';

    $controller = $controller . 'Controller';
    require_once "../php/Controllers/" . $controller . ".php";
    $controller = new $controller;

    call_user_func(array($controller, $action));
} else {
    require_once "../php/Controllers/" . $controller . "Controller.php";
    $controller = $controller . 'Controller';
    $controller = new $controller;
    $controller->index();
}
// if(isset($_GET['m'])):
//     $metodo =   $_GET['m'];
//     if(method_exists(modeloController,$metodo)):
//         modeloController::{$metodo}();
//     endif;
// else:
//     modeloController::index();
// endif;
// $product = new ProductController;
// $product->index();
// require_once("main/header.php");
// require_once("main/footer.php");
