<?php

class Actor{

    private $nombre;
    private $anyoNacimiento;
    private $pais;
    private $id;

    function __construct($nombre,$anyoNacimiento,$pais,$id){
        $this->nombre=$nombre;
        $this->anyoNacimiento=$anyoNacimiento;
        $this->pais=$pais;
        $this->id=$id;
    }
    //hacemos las funciones get de los datos del usuario
    public function get_nombre(){
        return $this->nombre;
    }
    public function get_anyoNacimiento(){
        return $this->anyoNacimiento;

    }
    public function get_pais(){
        return $this->pais;

    }
    public function get_id(){
        return $this->id;

    }
}

?>