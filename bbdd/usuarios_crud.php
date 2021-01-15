<?php
require_once "./classes/usuarios.php";
class CrudUsuario{
public function __construct(){}
public function obtenerUsuario($usuario){

    $conexion = database::conexion();
    $consulta = 'SELECT * FROM usuarios WHERE email=:email AND password=:password';
    $consultaPreparada = $conexion->prepare($consulta);
    $consultaPreparada->bindvalue(":email",$usuario->get_email());
    $consultaPreparada->bindvalue(":password",$usuario->get_password());
    $consultaPreparada->execute();
    $id=0;
    $resultado = $consultaPreparada->fetchAll(PDO::FETCH_ASSOC);
    foreach ( $resultado as $fila) {
        $id=$fila["id"];
        
    }
    return $id;
}


}


?>