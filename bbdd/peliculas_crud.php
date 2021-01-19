<?php
require_once './classes/peliculas.php';
require_once './lib/database.php';

class CrudPeliculas{
    public function __construct(){}

    //funcion que nos devuelve la clase pelicula con sus datos
    public function obtenerPelicula($id){
        $conexion = database::conexion();
        $consulta = "SELECT * FROM peliculas WHERE id=:id";
        $consultaPreparada = $conexion->prepare($consulta);
        $consultaPreparada->bindValue(':id', $id);
        $consultaPreparada->execute();
        $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $value) {
            $titulo = $value["titulo"];
            $anyo = $value["anyo"];
            $duracion = $value["duracion"];
            $pelicula = new pelicula($id, $anyo, $duracion, $titulo);
        }
        return $pelicula;
    }

//funcion que actualiza los valores en la base de datos
    public static function editarPelicula($pelicula)    {
        try {
            $conexion = database::conexion();
            $id = $pelicula->get_id();
            $actualizacion = "UPDATE peliculas SET titulo=:titulo, duracion=:duracion, anyo=:anyo, id=:id  WHERE id=$id";
            $consultaPreparada = $conexion->prepare($actualizacion);
            $consultaPreparada->bindValue(':titulo', $pelicula->get_titulo());
            $consultaPreparada->bindValue(':anyo', $pelicula->get_anyo());
            $consultaPreparada->bindValue(':duracion', $pelicula->get_duracion());
            $consultaPreparada->bindValue(':id', $pelicula->get_id());
            $consultaPreparada->execute();
            $exito = 1;
            return $exito;
        } catch (exception $e) {
            $exito = 0;
            return $exito;
        }
    }

    //funcion que imprime los datos de la pelicula
    public function imprimirDatos($pelicula){
        //extraemos los datos de las peliculas
        $titulo = $pelicula->get_titulo();
        $duracion = $pelicula->get_duracion();
        $anyo = $pelicula->get_anyo();
        //mostramos por pantalla los datos
        echo '<p><strong>Titulo:</strong> ' . $titulo . '</p>';
        echo '<p><strong>Año: </strong>' . $anyo . '</p>';
        echo '<p><strong>Duración: </strong>= ' . $duracion . '</p>';
    }

    //funcion que muestra las peliculas existentes con la caratula y los botones editar y borrar
    public function mostrarPeliculas(){
        $conexion = database::conexion();
        $consulta = 'SELECT * FROM peliculas';
        $consultaPreparada = $conexion->prepare($consulta);
        $consultaPreparada->execute();
        foreach ($resutado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC) as $fila) {
            echo '<div>';
            echo '<a href="peliculas_ficha.php?id=' . $fila['id'] . '">';
            echo '<img class="ficha" src="./imgs/peliculas/' . $fila['id'] . '.jpg"/></a>';
            echo '<p class="titulo">' . $fila['titulo'] . '</p>';
            echo '<a class="editar" href="peliculas_form.php?id=' . $fila['id'] . '">editar</a>';
            echo '<a class="borrado" href="peliculas.php?idBorrar=' . $fila['id'] . '">borrar</a>';
            echo '</div>';
        }
    }

    //funcion que elimina la pelicula
    public function eliminarPelicula($id){
        $conexion = database::conexion();
        $consulta="DELETE FROM peliculas WHERE  id=:id";
        $consultaPreparada = $conexion->prepare($consulta);
        $consultaPreparada->bindValue(':id', $id);
        $consultaPreparada->execute();
    }

    //funcion que inserta un director en la bbdd
    public function insertarPelicula($peliculas){
    $conexion=Database::conexion(); 
    $insertar=$conexion->prepare('INSERT INTO peliculas values(NULL,:titulo,:anyo,:duracion)');
    $insertar->bindValue(':titulo', $peliculas->get_titulo());
    $insertar->bindValue(':anyo', $peliculas->get_anyo());
    $insertar->bindValue(':duracion', $peliculas->get_duracion());
    $consultaPreparada->execute();
}
}
