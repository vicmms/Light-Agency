<?php
// require_once("../php/Models/Conexion.php");
$controller = 'Product';

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
    $controller->fetchByCategory();
}
