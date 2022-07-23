<?php
require_once dirname(__DIR__, 2) . '\install\Conexion.php';

class Product
{
    private $db;
    private $category_id;

    public function __construct()
    {
        try {
            $this->db =  Conexion::start();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function fetchProductById($product_id)
    {
        $query = "
            SELECT * , c.name as category_name, c.id as category_id
            FROM products p 
            LEFT JOIN categories c on p.category_id = c.id
            WHERE p.id = " . $product_id . " limit 1;";
        $stm = $this->db->prepare($query);
        $stm->execute();

        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    public function featuredProducts($category_id, $all)
    {
        $result = isset($category_id)
            ? $this->fetchFeaturedByCategory($category_id)
            : $this->fetchFeatured($all);
        return $result;
    }

    public function bestSelledProducts($category_id, $all)
    {
        $result = isset($category_id)
            ? $this->fetchSelledByCategory($category_id)
            : $this->fetchSelled($all);

        return $result;
    }

    // public function all($category_id)
    // {
    //     $result = isset($category_id)
    //         ? $this->fetchAllByCategory($category_id)
    //         : $this->fetchAll();

    //     return $result;
    // }

    public function fetchAllByCategory($category_id)
    {
        $result = [];
        $query = '
        SELECT p.name,  p.id, p.image
        FROM products p 
        LEFT JOIN(
            SELECT category_id as id
            FROM category_has_subcategory
            where parent_id = ' . $category_id . '
        ) as parent on p.category_id = parent.id
        WHERE p.category_id = ' . $category_id . ' or p.category_id = parent.id
        ';
        $stm = $this->db->prepare($query);
        $stm->execute();

        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    public function fetchAll($category_id = null)
    {
        $query = '
        SELECT p.name,  p.id, p.image
        FROM products p ';
        $stm = $this->db->prepare($query);
        $stm->execute();

        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    public function fetchFeaturedByCategory($category_id)
    {
        $result = [];
        $query = '
        SELECT p.name,  p.id, p.image, c.name as category
        FROM products p
        LEFT JOIN categories c on p.category_id =  c.id
        LEFT JOIN(
            SELECT category_id as id
            FROM category_has_subcategory
            where parent_id = ' . $category_id . '
        ) as parent on p.category_id = parent.id
        WHERE p.category_id = ' . $category_id . ' or p.category_id = parent.id
        LIMIT 10';
        $stm = $this->db->prepare($query);
        $stm->execute();

        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    public function fetchFeatured($all = false)
    {
        $limit_condition = $all ? '' : 'LIMIT 10';
        $query = '
        SELECT p.*, rate.classification
        FROM products p
        LEFT JOIN (
            SELECT AVG(classification) as classification, product_id
            FROM comments 
            GROUP BY product_id
        ) as rate on rate.product_id = p.id
        '
            . $limit_condition;
        $stm = $this->db->prepare($query);
        $stm->execute();

        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    public function fetchSelledByCategory($category_id)
    {
        $result = [];
        $query = '
        SELECT p.name, p.id, p.image
        FROM products p 
        LEFT JOIN(
            SELECT SUM(quantity) as quantity, product_id
            FROM orders
            GROUP BY product_id
        ) as sales on p.id = sales.product_id
        LEFT JOIN(
            SELECT category_id as id
            FROM category_has_subcategory
            where parent_id = ' . $category_id . '
        ) as parent on p.category_id = parent.id
        WHERE p.category_id = ' . $category_id . ' or p.category_id = parent.id
        ORDER BY sales.quantity DESC
        LIMIT 10';
        $stm = $this->db->prepare($query);
        $stm->execute();

        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    public function fetchSelled($all = false)
    {
        $limit_condition = $all ? '' : 'LIMIT 10';
        $query = '
        SELECT p.*, rate.classification, sales.quantity
        FROM products p 
        LEFT JOIN (
            SELECT AVG(classification) as classification, product_id
            FROM comments 
            GROUP BY product_id
        ) as rate on rate.product_id = p.id
        LEFT JOIN(
            SELECT SUM(quantity) as quantity, product_id
            FROM orders
            GROUP BY product_id
        ) as sales on p.id = sales.product_id
        ORDER BY sales.quantity DESC '
            . $limit_condition;
        $stm = $this->db->prepare($query);
        $stm->execute();

        return $stm->fetchAll(PDO::FETCH_OBJ);
    }
    public function fetchProductComments($product_id)
    {
        $query = "SELECT * FROM comments WHERE product_id = " . $product_id;
        $stm = $this->db->prepare($query);
        $stm->execute();

        return $stm->fetchAll(PDO::FETCH_OBJ);
    }
}
