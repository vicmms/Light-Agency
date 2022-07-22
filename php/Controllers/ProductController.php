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
    function fetchProductById()
    {
        $product_id = $_REQUEST['product_id'];
        $product = $this->product->fetchProductById($product_id)[0];
        $comments = $this->product->fetchProductComments($product_id);

        require_once 'Views/Product.php';
    }
    function fetchByCategory()
    {
        $category_id = isset($_REQUEST['category_id']) ? $_REQUEST['category_id'] : null;
        $featured_products = $this->product->featuredProducts($category_id);
        $best_selled_products = $this->product->bestSelledProducts($category_id);
        require_once 'Views/Products.php';
    }
}
