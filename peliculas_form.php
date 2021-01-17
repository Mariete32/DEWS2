<?php
require_once "./bbdd/peliculas_crud.php";
require_once "./classes/peliculas.php";
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Edición de películas</title>
</head>

<body>
    <?php
if (isset($_POST["titulo"]) & isset($_POST["anyo"]) & isset($_POST["duracion"])) {
    //si insertamos datos, actualizamos los datos de esa pelicula
    $crudPelicula = new CrudPeliculas();
    $exito=$crudPelicula::editarPelicula($_GET["id"], $_POST["titulo"], $_POST["anyo"], $_POST["duracion"]);
    if ($exito==1) {
        echo '<div class="alert alert-success" role="alert">';
        echo "<h2>La película ha sido guardada con éxito</h2></div>";
        echo '<a href="películas.php">volver al inicio</a>';
    } else {
        echo '<div class="alert alert-danger" role="alert">';
        echo "<h2>La película no ha sido guardada con éxito</h2></div>";
        echo '<a href="peliculas.php">volver al inicio</a>';
    }

}else{
$id = $_GET["id"];
$crudPelicula = new CrudPeliculas();
$pelicula = $crudPelicula->obtenerPelicula($id);
$titulo = $pelicula->get_titulo();
$anyo = $pelicula->get_anyo();
$duracion = $pelicula->get_duracion();

?>
    <div class="alert alert-secondary d-flex">
        <a href="./peliculas.php" class="btn btn-dark">Películas</a>&nbsp;&nbsp;
    </div>
    <div class="container">
        <h1>Edición de películas</h1>
        <form action="peliculas_form.php?id=<?php echo $id ?>" method="POST">
            <p>
                <label for="titulo">Titulo: </label>
                <input type="text" name="titulo" value="<?php echo $titulo ?>">
            </p>
            <p>
                <label for="anyo">Año</label>
                <input type="text" name="anyo" value="<?php echo $anyo ?>">
            </p>
            <p>
                <label for="duracion">duracion</label>
                <input type="text" name="duracion" value="<?php echo $duracion ?>">
                <input type="hidden" name="guardado" value="ok">
            </p>
            <p> <input type="submit" value="Guardar"> </p>
        </form>
    </div>

</body>
<?php
}
?>

</html>