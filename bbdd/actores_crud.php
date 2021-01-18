<?php
require_once './classes/actores.php';
require_once './lib/database.php';
class CrudActores{
    public function __construct(){}

//funcion que obtiene los actores y los muestra
public function obtenerActor($id){
    $conexion = database::conexion();
    $consulta = "SELECT id_actor FROM peliculas_actores WHERE id_pelicula= $id";
        $consultaPreparada = $conexion->prepare($consulta);
        $consultaPreparada->execute();
        //obtenemos un array con los id de los actores 
        $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
        //mostramos el nombre de los actores
        foreach ($resultado as $value) {
            $id = $value["id_actor"];
            $actor=$this->datosActor($id);
            $this->imprimirNombreActor($actor);
        }
        
}

public function datosActor($id_actor){
    $conexion = database::conexion();
    $consulta = "SELECT * FROM actores WHERE id= $id_actor";
    $consultaPreparada = $conexion->prepare($consulta);
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
}
}
?>