<?php
class Db{
    function __construct()
    {

    }
    public static function getConnect()
    {   
        try {
            $conexion = new PDO('mysql:host=localhost;dbname=test;user=root;password='); // cambiar la fuente de datos
            return $conexion;
        } catch (Exception $e) {
            echo "Mensaje de error: " . $e->getMessage();
        }
        
    }
}