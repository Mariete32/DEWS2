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
            if (isset($_GET["error"])) {
                echo '<div class="alert alert-danger d-flex"><p>datos incorrectos</p></div>';
            }
        ?>
            <form action="peliculas.php" method="POST">
                <p>
                    <label for="email">Usuario: </label>
                    <input type="text" name="email" >
                </p>
                <p>
                    <label for="password">Password</label>
                    <input type="password" name="password" >
                </p>
                <p> <input type="checkbox" name="recordatorio">guardar mis credenciales</p>
                </p>
                <p> <input type="submit" value="Enviar"> </p>
            </form>
        </div>

    </div>


</body>

</html>