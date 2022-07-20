<?php
require_once("../php/Models/Product.php");

class ProductController
{

    private $product;

    function __construct()
    {
        $this->product = new Product();
    }
    // show products
    function index()
    {
        $products = $this->product->fetch();
        require_once("../public_html/Views/Home.php");
    }
}
