<?php
require_once "./bbdd/directores_crud.php";
require_once "./classes/directores.php";
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
    <div class="alert alert-secondary d-flex">
        <a href="./peliculas.php" class="btn btn-dark">Películas</a>&nbsp;&nbsp;
    </div>
    <div class="container">
    <?php
    //si tenemos la variable idBorrar, borramos los datos del director
    if (isset($_GET["idBorrar"])) {
        $idBorrar=$_GET["idBorrar"];
        $borrarDirector=new CrudDirector();
        $borrarDirector->eliminarDirector($idBorrar);
    }else{
    $id_director = $_GET["id"];
    $directorCrud=new CrudDirector();
    $director=$directorCrud->datosDirector($id_director);
    $directorCrud->imprimirDatosDirector($director);
    }
    ?>
    </div>
</body>

</html>