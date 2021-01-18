<?php
require_once "./classes/usuarios.php";
class CrudUsuario{
public function __construct(){}

//funcion que extrae el id de la bbdd si existe el email y contraseña
public function obtenerIdUsuario($usuario){
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

//funcion que nos devuelve la clase usuario con el email y contraseña
public function obtenerEmailPassword($id){
    $conexion = database::conexion();
    $consulta="SELECT * FROM usuarios WHERE id=:id";
    $consulta_preparada=$conexion->prepare($consulta);
    $consultaPreparada->bindValue(':id', $id);
    $consulta_preparada->execute();
    $resultado = $consulta_preparada->fetchAll(PDO::FETCH_ASSOC);
    foreach ($resultado as $valor) {
        $email=$valor["email"];
        $password=$valor["password"];
        $usuario= new Usuario($email,$password);
}
return $usuario;
}

//funcion que elimina el usuario
public function eliminarUsuario($id){
    $conexion = database::conexion();
    $consulta="DELETE FROM usuarios WHERE  id=:id";
    $consultaPreparada = $conexion->prepare($consulta);
    $consultaPreparada->bindValue(':id', $id);
    $consultaPreparada->execute();
}
}
?>