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
        // require_once 'main/header.php';
        // require_once 'Views/Home.php';
        // require_once 'main/footer.php';
    }
    function fetchByCategory()
    {
        $category_id = isset($_REQUEST['category_id']) ? $_REQUEST['category_id'] : null;
        $featured_products = $this->product->featuredProducts($category_id);
        $best_selled_products = $this->product->bestSelledProducts($category_id);
        require_once 'Views/Products.php';
    }
}
