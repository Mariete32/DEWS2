<?php
require_once "./lib/database.php";
require_once "./bbdd/usuarios_crud.php";
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Gestión de películas</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/estilos.css">
</head>

<body>
    
    <div class="alert alert-secondary d-flex">
        <a href="./peliculas.php" class="btn btn-dark">Listar películas</a>&nbsp;&nbsp;
    </div>

    <div class="container">
        <div class="subcontainer">
            <img src="./imgs/portada.png" class="mx-autod-block" />
        </div>
        <div class="subcontainer">
        <?php
        $email="";
        $password="";
            if (isset($_GET["error"])) {
                echo '<div class="alert alert-danger d-flex"><p>datos incorrectos</p></div>';
            }
            if (isset($_COOKIE["id"])) {
                $ID=$_COOKIE["id"];
                $crudUsuario = new CrudUsuario();
                $usuario= $crudUsuario->obtenerEmailPassword($ID);
                $email=$usuario->get_email();
                $password=$usuario->get_password();
            }
        ?>
            <form action="peliculas.php" method="POST">
                <p>
                    <label for="email">Usuario: </label>
                    <input type="text" name="email" value="<?php echo $email ?>">
                </p>
                <p>
                    <label for="password">Password</label>
                    <input type="password" name="password" value="<?php echo $password?>">
                </p>
                <p> <input type="checkbox" name="recordatorio" <?php if (isset($ID)) {echo"checked";} ?>>guardar mis credenciales</p>
                </p>
                <p> <input type="submit" value="Enviar"> </p>
            </form>
        </div>

    </div>


</body>

</html>