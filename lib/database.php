<?php
class database{
    private static $dbName = 'videoclub'; 
    private static $dbHost = 'localhost'; 
    private static $dbUsername = 'root'; 
    private static $dbUserPassword = '';
    public function __construct() { 
        die('Init-Función no permitida'); 
    }
    public static function conexion()
    {
        try {
            $conexion = new PDO("mysql:host=".self::$dbHost.";dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);
            $conexion->exec("set names utf8");
        } catch (PDOException $e) {
            echo "error de conexion";
            
        }
        return $conexion;
    }
}
