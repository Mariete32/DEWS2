<?php
require_once "./lib/database.php";
require_once "./classes/usuarios.php";
require_once "./bbdd/usuarios_crud.php";
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
    <div class="alert alert-secondary d-flex">
        <a href="./peliculas.php" class="btn btn-dark">Películas</a>&nbsp;&nbsp;
    </div>
    <div class="cajetin">
        <?php
//mostramos las peliculas disponibles
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
    echo '<a class="borrado" href="peliculas_borrado.php?id=' . $fila['id'] . '">borrar</a>';
    echo '</div>';
}
?>
    </div>
</body>

</html>