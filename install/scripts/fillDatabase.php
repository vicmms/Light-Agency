<?php
require_once dirname(__DIR__, 2) . '\install\Conexion.php';

class fillDatabase
{
    private $db;
    private $log_time;
    private $log_name;
    private $parents = [1, 2, 4, 9];
    private $categories = [3, 5, 6, 7, 8, 10, 11, 12, 13, 14, 15];
    private $names = [0 => 'Juan', 1 => 'Rocio', 2 => 'Luis', 3 => 'Rodrigo', 4 => 'Vero', 5 => 'Luci', 6 => 'Vic'];

    public function __construct()
    {
        try {
            $this->db =  Conexion::start();
        } catch (Exception $e) {

            die($e->getMessage());
        }
        $this->insertCategories();
        $this->insertCategoryHasSubcategory();
        $this->insertProducts();
        $this->insertComments();
        $this->insertOrders();

        $this->log_time = date('Y-m-d h:i:s');
        $this->log_name = 'log';
    }

    public function addLog($message)
    {
        $date = "[" . $this->log_time . "] =>";
        $dir = dirname(__DIR__, 2);

        file_put_contents($dir . '/log', $date . " " . $message . "\n", FILE_APPEND);
    }

    public function insertCategories()
    {
        $total_rows = 10;
        $table_name = 'Categories';
        try {
            $query = "INSERT INTO categories(`name`) VALUES";
            for ($i = 1; $i <= $total_rows; $i++) {
                $query .= "('CAT_" . $i . "')";
                $query .= $i == $total_rows ? '' : ',';
            }
            $stm = $this->db->prepare($query);
            $stm->execute();
        } catch (Exception $e) {
            $this->addLog('[' . $table_name . ']' . $e->getMessage());
            return;
        }

        $message = $total_rows . " registros agregados correctamente en la tabla " . $table_name;

        $this->addLog($message);
    }
    public function insertCategoryHasSubcategory()
    {
        $total_rows = 10;
        $table_name = 'category_has_subcategory';
        try {


            $query = "INSERT INTO category_has_subcategory(category_id, parent_id) VALUES";
            for ($i = 1; $i <= $total_rows; $i++) {
                $query .= "(" . ($i + 9) . ", " . $this->parents[array_rand($this->parents)] . ")";
                $query .= $i == $total_rows ? '' : ',';
            }
            $stm = $this->db->prepare($query);
            $stm->execute();
        } catch (Exception $e) {
            $this->addLog('[' . $table_name . ']' . $e->getMessage());
            return;
        }

        $message = $total_rows . " registros agregados correctamente en la tabla " . $table_name;

        $this->addLog($message);
    }

    public function insertProducts()
    {
        $brands = ['hp', 'Dell', 'Asus', 'Toshiba'];
        $types = ['15"', 'Portatil', 'All in one', 'Enterprises', 'XTR'];

        $total_rows = 10;
        $table_name = 'Products';
        try {
            $query = "INSERT INTO products(`name`,model,`description`,price, category_id) VALUES";
            for ($i = 1; $i <= $total_rows; $i++) {
                $query .= "('" . $brands[array_rand($brands)] . " " . $types[array_rand($types)] . "', '" . $this->generateRandomString() . "', '" . $this->generateRandomString(100) . "', " . rand(3000, 19000) . ", " . $this->categories[array_rand($this->categories)] . ")";
                $query .= $i == $total_rows ? '' : ',';
            }
            $stm = $this->db->prepare($query);
            $stm->execute();
        } catch (Exception $e) {
            $this->addLog('[' . $table_name . ']' . $e->getMessage());
            return;
        }

        $message = $total_rows . " registros agregados correctamente en la tabla " . $table_name;

        $this->addLog($message);
    }

    public function insertComments()
    {
        $total_rows = 10;
        $table_name = 'Comments';
        try {
            $query = "INSERT INTO comments(`text`, classification, `name`, product_id) VALUES";
            for ($i = 1; $i <= $total_rows; $i++) {
                $query .= "('" . $this->generateRandomString(rand(10, 80)) . "', " . rand(1, 5) . ", '" . $this->names[array_rand($this->names)] . "', " . rand(1, 20) . ")";
                $query .= $i == $total_rows ? '' : ',';
            }
            $stm = $this->db->prepare($query);
            $stm->execute();
        } catch (Exception $e) {
            $this->addLog('[' . $table_name . ']' . $e->getMessage());
            return;
        }

        $message = $total_rows . " registros agregados correctamente en la tabla " . $table_name;

        $this->addLog($message);
    }
    public function insertOrders()
    {
        $total_rows = 10;
        $table_name = 'Orders';
        try {
            $query = "INSERT INTO orders(product_id, quantity, total_sale) VALUES";
            for ($i = 1; $i <= $total_rows; $i++) {
                $query .= "(" . rand(1, 20) . ", " . rand(1, 6) . ", " . rand(3000, 100000) . ")";
                $query .= $i == $total_rows ? '' : ',';
            }
            $stm = $this->db->prepare($query);
            $stm->execute();
        } catch (Exception $e) {
            $this->addLog('[' . $table_name . ']' . $e->getMessage());
            return;
        }

        $message = $total_rows . " registros agregados correctamente en la tabla " . $table_name;

        $this->addLog($message);
    }
    function generateRandomString($length = 7)
    {
        return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
    }
}

$obj = new fillDatabase();
