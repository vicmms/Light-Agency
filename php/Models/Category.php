<?php
class Category
{
    private $db;
    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=store', "root", "pass");
    }

    public function fetchAll()
    {
        $categories = [];
        $query = "SELECT * FROM categories;";
        $result = $this->db->query($query);
        while ($filas = $result->FETCHALL(PDO::FETCH_ASSOC)) {
            $categories[] = $filas;
        }
        return $categories[0];
    }

    public function fetchParents()
    {
        $categories = [];
        $query = "
            SELECT cats.name
            FROM categories cats
            LEFT JOIN category_has_subcategory chs on chs.category_id = cats.id 
            WHERE parent_id IS NULL;
        ";
        $result = $this->db->query($query);
        while ($filas = $result->FETCHALL(PDO::FETCH_ASSOC)) {
            $categories[] = $filas;
        }

        return $categories[0];
    }

    public function fetchSubcategories($parent_id)
    {
        $subcategories = [];
        $condition = !isset($parent_id) ? ' IS NULL ' : ' = ' . $parent_id;
        $query = "
            SELECT cats.name, cats.id
            FROM categories cats
            LEFT JOIN category_has_subcategory chs on chs.category_id = cats.id 
            WHERE parent_id " . $condition . ";";

        $result = $this->db->query($query);
        while ($row = $result->FETCHALL(PDO::FETCH_ASSOC)) {
            $subcategories[] = $row;
        }
        return isset($subcategories[0]) ? $subcategories[0] : [];
    }

    // public function getCategoryChildren($category_id)
    // {
    //     $query = "SELECT `category_id` FROM category_has_subcategory WHERE parent_id = " . $category_id;
    //     $children = $this->db->query($query);

    //     $result = array();

    //     if ($row = $children->rowCount() > 0) {
    //         while ($row = $children->FETCHALL(PDO::FETCH_ASSOC)) {
    //             $row = $row[0];
    //             $result[$row['category_id']] = $this->getCategoryChildren($row['category_id']);
    //         }
    //     }

    //     return $result;
    // }
}
