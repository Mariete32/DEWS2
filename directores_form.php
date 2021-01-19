<?php
require_once "./bbdd/directores_crud.php";
require_once "./classes/directores.php";
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
    <title>Edición de actores</title>
</head>

<body>
        <?php
        if (isset($_POST["nombre"]) & isset($_POST["anyoNacimiento"]) & isset($_POST["pais"])) {
            //si insertamos datos, actualizamos los datos de esa pelicula
            $CrudDirector = new CrudDirector();
            $director=new Director($_POST["nombre"], $_POST["anyoNacimiento"],$_POST["pais"],$_GET["id"]);
            $exito=$CrudDirector::editarDirector($director);
            if ($exito==1) {
                echo '<div class="alert alert-success" role="alert">';
                echo "<h2>La película ha sido guardada con éxito</h2></div>";
                echo '<a href="./peliculas.php">volver al inicio</a>';
            } else {
                echo '<div class="alert alert-danger" role="alert">';
                echo "<h2>La película no ha sido guardada con éxito</h2></div>";
                echo '<a href="peliculas.php">volver al inicio</a>';
            }
        }else{
        $id = $_GET["id"];
        $CrudDirector = new CrudDirector();
        $director = $CrudDirector->datosDirector($id);

        //extraemos las datos para insertalos por defecto en el formulario
        $nombre = $director->get_nombre();
        $anyoNacimiento = $director->get_anyoNacimiento();
        $pais = $director->get_pais();
        ?>

        <div class="alert alert-secondary d-flex">
            <a href="./peliculas.php" class="btn btn-dark">Películas</a>&nbsp;&nbsp;
        </div>
        <div class="container">
        <div class="container">
            <h1>Edición de directores</h1>
            <form action="directores_form.php?id=<?php echo $id ?>" method="POST">
                <p>
                    <label for="titulo">Nombre: </label>
                    <input type="text" name="nombre" value="<?php echo $nombre ?>">
                </p>
                <p>
                    <label for="anyo">Año:</label>
                    <input type="text" name="anyoNacimiento" value="<?php echo $anyoNacimiento ?>">
                </p>
                <p>
                    <label for="duracion">Pais:</label>
                    <input type="text" name="pais" value="<?php echo $pais ?>">
                    <input type="hidden" name="guardado" value="ok">
                </p>
                <p> <input type="submit" value="Guardar"> </p>
            </form>
        </div>

    </div>
    <?php
}
?>
    </div>

</body>

</html>