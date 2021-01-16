<?php
require_once './classes/peliculas.php';
require_once './lib/database.php';

class CrudPeliculas{
function __construct(){}
public function obtenerPelicula($id){
    
    $conexion = database::conexion();
    $consulta = "SELECT * FROM peliculas WHERE id= $id";
    $consultaPreparada = $conexion->prepare($consulta);
    $consultaPreparada->execute();
    $resultado=$consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
foreach ($resultado as $value) {
    $titulo=$value["titulo"];
    $anyo=$value["anyo"];
    $duracion=$value["duracion"];
    $pelicula=new pelicula($id,$anyo,$duracion,$titulo);
}
return $pelicula;
}
public static function editarPelicula($id,$titulo,$anyo,$duracion){
    $conexion = database::conexion();
    $actualizacion="UPDATE peliculas SET titulo=:titulo, duracion=:duracion, anyo=:anyo WHERE id=$id";
    $actualizacion->bindParam(':titulo', $titulo);
    $actualizacion->bindParam(':anyo', $anyo);
    $actualizacion->bindParam(':duracion', $duracion);
    $actualizacion->execute();
}






}
?>