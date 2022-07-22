<?php
class Product
{
    private $db;
    private $category_id;
    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=store', "root", "pass");
    }

    public function fetch()
    {
        $products = [];
        $query = "select * from products;";
        $result = $this->db->query($query);
        while ($filas = $result->FETCHALL(PDO::FETCH_ASSOC)) {
            $products[] = $filas;
        }
        return $products[0];
    }

    public function featuredProducts($category_id)
    {
        $result = isset($category_id)
            ? $this->fetchFeaturedByCategory($category_id)
            : $this->fetchFeatured();
        return $result;
    }

    public function bestSelledProducts($category_id)
    {
        $result = isset($category_id)
            ? $this->fetchSelledByCategory($category_id)
            : $this->fetchSelled();

        return $result;
    }

    public function fetchFeaturedByCategory($category_id)
    {
        $result = [];
        $query = '
        SELECT * FROM products p 
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

    public function fetchFeatured()
    {
        $result = [];
        $query = '
        SELECT * FROM products p 
        LIMIT 10';
        $stm = $this->db->prepare($query);
        $stm->execute();

        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    public function fetchSelledByCategory($category_id)
    {
        $result = [];
        $query = '
        SELECT p.name, p.id 
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

    public function fetchSelled()
    {
        $result = [];
        $query = '
        SELECT p.name, p.id 
        FROM products p 
        LEFT JOIN(
            SELECT SUM(quantity) as quantity, product_id
            FROM orders
            GROUP BY product_id
        ) as sales on p.id = sales.product_id
        ORDER BY sales.quantity DESC
        LIMIT 10';
        $stm = $this->db->prepare($query);
        $stm->execute();

        return $stm->fetchAll(PDO::FETCH_OBJ);
    }
}
