<?php
require_once(dirname(__DIR__) . "/Models/Product.php");

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
        $all = isset($_REQUEST['all']) ? $_REQUEST['all'] : null;
        $featured_products = $this->product->featuredProducts($category_id, $all);
        $best_selled_products = $this->product->bestSelledProducts($category_id, $all);
        isset($all)
            ? require_once 'Views/ListAll.php'
            : require_once 'Views/Products.php';
    }
    function fetchAll()
    {
        $category_id = 1;
        $products = isset($_REQUEST['all'])
            ? $this->product->featuredProducts(null, 1)
            : $this->product->bestSelledProducts(null, 1);
        // $best_selled_products = $this->product->bestSelledProducts($category_id);
        require_once 'Views/ListAll.php';
    }
}
