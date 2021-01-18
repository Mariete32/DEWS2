<?php
require_once './classes/actores.php';
require_once './lib/database.php';
class CrudActores{
    public function __construct(){}

//funcion que obtiene los actores y los muestra
public function obtenerActor($idPelicula){
    $conexion = database::conexion();
    $consulta = "SELECT id_actor FROM peliculas_actores WHERE id_pelicula= :idPelicula";
        $consultaPreparada = $conexion->prepare($consulta);
        $consultaPreparada->bindValue(':idPelicula', $idPelicula);
        $consultaPreparada->execute();
        //obtenemos un array con los id de los actores 
        $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
        //mostramos el nombre de los actores
        foreach ($resultado as $value) {
            $idActor = $value["id_actor"];
            $actor=$this->datosActor($idActor);
            $this->imprimirNombreActor($actor);
        }
        
}

//funcion que devuelve una clase actor con sus datos
public function datosActor($id_actor){
    $conexion = database::conexion();
    $consulta = "SELECT * FROM actores WHERE id= :id_actor";
    $consultaPreparada = $conexion->prepare($consulta);
    $consultaPreparada->bindValue(':id_actor', $id_actor);
        $consultaPreparada->execute();
        $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $value) {
            $nombre = $value["nombre"];
            $anyoNacimiento = $value["anyoNacimiento"];
            $pais = $value["pais"];
            $actor=new Actor($nombre,$anyoNacimiento,$pais,$id_actor);
        }
        return $actor;
}

//funcion que imprime los nombres de los actores
public function imprimirNombreActor($actor){
    $nombre=$actor->get_nombre();
    echo '<a href=actores_ficha.php?id='.$actor->get_id().'>'. $actor->get_nombre().'</a><br>';
}
//funcion que imprime los datos de los actores
public function imprimirDatos($actor){
    echo '<p><strong>Nombre: </strong>'.$actor->get_nombre().'</p><br>';
    echo '<p><strong>Año de nacimiento: </strong>'.$actor->get_anyoNacimiento().'</p><br>';
    echo '<p><strong>País: </strong>'.$actor->get_pais().'</p><br>';
    echo '<a class="editar" href="actores_form.php?id=' . $actor->get_id() . '">editar</a>';
    echo '<a class="borrado" href="actores_ficha.php?idBorrar=' . $actor->get_id() . '">borrar</a>';
}
//funcion que elimina el actor
public function eliminarActor($idActor){
    $conexion = database::conexion();
    $consulta="DELETE FROM actores WHERE  id=:idActor";
    $consultaPreparada = $conexion->prepare($consulta);
    $consultaPreparada->bindValue(':idActor', $idActor);
    $consulta="DELETE FROM peliculas_actores WHERE  id_actor=:idActor";
    $consultaPreparada = $conexion->prepare($consulta);
    $consultaPreparada->bindValue(':idActor', $idActor);
    $consultaPreparada->execute();
}

//funcion que actualiza los valores en la base de datos
public static function editarActor($actor){
    try {
        $conexion = database::conexion();
        $id = $actor->get_id();
        $actualizacion = "UPDATE actores SET nombre=:nombre, anyoNacimiento=:anyoNacimiento, pais=:pais, id=:id WHERE id=$id";
        $consultaPreparada = $conexion->prepare($actualizacion);
        $consultaPreparada->bindValue(':nombre', $actor->get_nombre());
        $consultaPreparada->bindValue(':anyoNacimiento', $actor->get_anyoNacimiento());
        $consultaPreparada->bindValue(':pais', $actor->get_pais());
        $consultaPreparada->bindValue(':id', $actor->get_id());
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