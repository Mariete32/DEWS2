<?php
require_once "./bbdd/actores_crud.php";
require_once "./classes/actores.php";
session_start();

?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Directores | Ficha</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/estilos.css">
    <link rel="stylesheet" href="./css/entregable.css">
</head>

<body>
    <?php
    //si tenemos la variable idBorrar, borramos los datos del actor
    if (isset($_GET["idBorrar"])) {
        $idBorrar=$_GET["idBorrar"];
        $borrarActor=new CrudActores();
        $exito =$borrarActor->eliminarActor($idBorrar);
        if ($exito == 1) {
            echo '<div class="alert alert-success" role="alert">';
            echo "<h2>El actor ha sido borrado con éxito</h2></div>";
            echo '<a href="./peliculas.php">volver al inicio</a>';
        } else {
            echo '<div class="alert alert-danger" role="alert">';
            echo "<h2>El actor no ha sido borrado con éxito</h2></div>";
            echo '<a href="peliculas.php">volver al inicio</a>';
        }
    }else{
        ?>
    <div class="alert alert-secondary d-flex">
        <a href="./peliculas.php" class="btn btn-dark">Películas</a>&nbsp;&nbsp;
    </div>
    <div class="container">
        <?php
    $id_actor = $_GET["id"];
    $actorCrud=new CrudActores();
    $actor=$actorCrud->datosActor($id_actor);
    $actorCrud->imprimirDatos($actor);
    }
    ?>
    </div>
</body>

</html>