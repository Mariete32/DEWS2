<?php
require_once './classes/directores.php';
require_once './lib/database.php';
class CrudDirector{
    public function __construct(){}
public function obtenerDirector($id_pelicula){
    $conexion = database::conexion();
    //consultamos el id del director correspondiente con la id_pelicula en la tabla peliculas_directores
    $consulta = "SELECT id_director FROM peliculas_directores WHERE id_pelicula= $id_pelicula";
        $consultaPreparada = $conexion->prepare($consulta);
        $consultaPreparada->execute();
        $resultado = $consultaPreparada->fetch(PDO::FETCH_OBJ);
        $id_director= $resultado->id_director;
        /*una vez tenemos el id del director correspondiente a la pelicula, extraemos los datos 
        del director en la tabla directores*/
        return $this->datosDirector($id_director);
        
}
//funcion que imprime el nombre del director
public function imprimirDirector($director){
    echo '<p><strong>Director:</strong></p>';
    echo '<a href=directores_ficha.php?id='.$director->get_id().'>'. $director->get_nombre().'</a>';
}

//funcion que imprime los datos del director
public function imprimirDatosDirector($director){
    echo '<p><strong>Nombre: </strong>'.$director->get_nombre().'</p><br>';
    echo '<p><strong>Año de nacimiento: </strong>'.$director->get_anyoNacimiento().'</p><br>';
    echo '<p><strong>País: </strong>'.$director->get_pais().'</p><br>';
}

//funcion que crea una clase director con los datos de la bbdd
public function datosDirector($id_director){
    $conexion = database::conexion();
    $consulta = "SELECT * FROM directores WHERE id= $id_director";
        $consultaPreparada = $conexion->prepare($consulta);
        $consultaPreparada->execute();
        $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $value) {
            $nombre = $value["nombre"];
            $anyoNacimiento = $value["anyoNacimiento"];
            $pais = $value["pais"];
            $id = $value["id"];
            $director = new Director($nombre, $anyoNacimiento, $pais, $id);
        }
        return $director;
}
//funcion que actualiza los valores en la base de datos
public static function editarDirector($director)
{
    try {
        $conexion = database::conexion();
        $id=$director->get_id();
        $actualizacion = "UPDATE directores SET nombre=:nombre, anyoNacimiento=:anyoNacimiento, pais=:pais, id=:id WHERE id=$id";
        $consultaPreparada = $conexion->prepare($actualizacion);
        $consultaPreparada->bindValue(':nombre', $director->get_nombre());
        $consultaPreparada->bindValue(':anyoNacimiento', $director->get_anyoNacimiento());
        $consultaPreparada->bindValue(':pais', $director->get_pais());
        $consultaPreparada->bindValue(':id', $director->get_id());
        $consultaPreparada->execute();
        $exito = 1;
        return $exito;
    } catch (exception $e) {
        $exito = 0;
        return $exito;
    }

}

}
?>