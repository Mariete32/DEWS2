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

//funcion que inserta un usuario en la bbdd
public function insertarUsuario($usuario){
    $conexion=Database::conexion(); 
    $insertar=$conexion->prepare('INSERT INTO actores values(NULL,:email,:password,FALSE)');
    $insertar->bindValue(':email', $usuario->get_email());
    $insertar->bindValue(':password', $usuario->get_password());
    $insertar->bindValue(':pais', $actor->get_pais());
    $consultaPreparada->execute();
}

//funcion que actualiza los valores en la base de datos
public static function editarUsuario($usuario){
    try {
        $conexion = database::conexion();
        $id = $usuario->get_id();
        $actualizacion = "UPDATE usuarios SET email=:email, password=:password, id=:id WHERE id=$id";
        $consultaPreparada = $conexion->prepare($actualizacion);
        $consultaPreparada->bindValue(':email', $usuario->get_email());
        $consultaPreparada->bindValue(':password', $usuario->get_password());
        $consultaPreparada->bindValue(':id', $usuario->get_id());
        $consultaPreparada->execute();
        $exito = 1;
        return $exito;
    } catch (exception $e) {
        $exito = 0;
        return $exito;
    }
}
}
?>