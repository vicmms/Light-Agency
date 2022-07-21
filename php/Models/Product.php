<?php
class Product
{
    private $db;
    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=store', "root", "pass");
    }

    public function fetch()
    {
        $products = [];
        $query = "SELECT * FROM products;";
        $result = $this->db->query($query);
        while ($filas = $result->FETCHALL(PDO::FETCH_ASSOC)) {
            $products[] = $filas;
        }
        return $products[0];
    }
}
