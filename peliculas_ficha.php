<?php
require_once "./bbdd/actores_crud.php";
require_once "./bbdd/directores_crud.php";
require_once "./bbdd/peliculas_crud.php";
require_once "./classes/actores.php";
require_once "./classes/directores.php";
require_once "./classes/peliculas.php";
session_start();

?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Películas | Ficha</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/estilos.css">
</head>

<body>
    <div class="alert alert-secondary d-flex">
        <a href="./peliculas.php" class="btn btn-dark">Películas</a>&nbsp;&nbsp;
    </div>
    <div class="container">
    <?php
if (isset($_GET["id"])) {
    $ID_pelicula = $_GET["id"];    
    //creamos la clase pelicula con sus datos desde el crudpeliculas
    $crudPelicula = new CrudPeliculas();
    $pelicula = $crudPelicula->obtenerPelicula($ID_pelicula);

    //imprimimos los datos de la pelicula
    $crudPelicula->imprimirDatos($pelicula);

    //creamos la clase director con los datos desde el cruddirector
    $crudDirector = new CrudDirector();
    $director=$crudDirector->obtenerDirector($ID_pelicula);
if (!empty($director)) {
    //imprimimos el nombre del director
    $crudDirector->imprimirNombreDirector($director);
}
    
    //creamos las clases de los actores
    $CrudActores = new CrudActores();
    echo '<p><strong>Actores:</strong></p>';
    $actor=$CrudActores->obtenerActor($ID_pelicula);
    
}
?>
    </div>
</body>

</html>