<?php
class Category
{
    private $db;

    public function __construct()
    {
        try {
            $this->db = Conexion::start();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function fetch()
    {
        $result = [];
        $query = 'SELECT * FROM categories';
        $stm = $this->db->prepare($query);
        $stm->execute();

        return $stm->fetchAll(PDO::FETCH_OBJ);
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
SELECT cats.name, cats.id
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
}
