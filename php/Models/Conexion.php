<?php
class Conexion
{
    public static function start()
    {
        $db = new PDO('mysql:host=localhost;dbname=store', "root", "pass");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }
}
