<?php
class database{
    public static function conexion()
    {
        try {
            $conexion = new PDO('mysql:host=localhost;dbname=videoclub', 'root', '');
            $conexion->exec("set names utf8");
        } catch (PDOException $e) {
            echo "error de conexion";
        }
        return $conexion;
    }
}
