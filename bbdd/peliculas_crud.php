<?php
require_once './classes/peliculas.php';
require_once './lib/database.php';

class CrudPeliculas{
function __construct(){}
//funcion que nos devuelve la clase pelicula con sus datos
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

//funcion que actualiza los valores en la base de datos
public static function editarPelicula($id,$titulo,$anyo,$duracion){
    $conexion = database::conexion();
    $actualizacion="UPDATE peliculas SET titulo=:titulo, duracion=:duracion, anyo=:anyo WHERE id=$id";
    $consultaPreparada=$conexion->prepare($actualizacion);
    $consultaPreparada->bindparam(':titulo', $titulo);
    $consultaPreparada->bindparam(':anyo', $anyo);
    $consultaPreparada->bindparam(':duracion', $duracion);
    $consultaPreparada->execute();
}






}
?>