<?php
require_once "./lib/database.php";
require_once "./classes/usuarios.php";
require_once "./bbdd/usuarios_crud.php";
require_once "./bbdd/peliculas_crud.php";
session_start();
    
     //si los campos estan rellenos
if (isset($_POST["email"]) && isset($_POST["password"])) {

    //creamos el objeto usuario con los datos introducidos
    $login = new Usuario($_POST["email"], $_POST["password"]);

    //creamos el objeto crudusuario para gestionar el login
    $crudUsuario = new CrudUsuario();
    $id = $crudUsuario->obtenerIdUsuario($login);

    //si el usuario o contraseña son incorrectos la bbdd no devuelve el id
    if ($id == 0 || $id == null) {
        header("Location: ./index.php?error=1");
    } else {
        //guardamos el email en la session para que no nos redirija a index una vez logueados
        $_SESSION["usuario"]=$_POST["email"];
        //si marca recordar credenciales, almacenamos el ID en la coockie
        if (isset($_POST["recordatorio"])) {
            setcookie("id", $id, time() + 60);
        }
    }

    //si ya estamos logueados no nos redirije a index.php
} else if (!isset($_SESSION["usuario"])){
    header("Location: ./index.php");
}
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Películas</title>
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
        //si tenemos la vairable idBorrar, borramos los datos de la pelicula
        if (isset($_GET["idBorrar"])) {
            $idBorrar=$_GET["idBorrar"];
            $borrarPelicula=new CrudPeliculas();
            $exito=$borrarPelicula->eliminarPelicula($idBorrar);
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
            ?>
    <div class="alert alert-secondary d-flex">
        <a href="./peliculas.php" class="btn btn-dark">Películas</a>&nbsp;&nbsp;
    </div>
    <div class="alert alert-light d-flex" role="alert">
        <?php
            //mostramos las peliculas existentes
            $peliculas=new CrudPeliculas();
            $peliculas->mostrarPeliculas();
        }
        ?>
    </div>
</body>

</html>