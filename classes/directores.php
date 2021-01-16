<?php

class Director{

    private $nombre;
    private $anyoNacimiento;
    private $pais;
    private $id;

    function __construct(){}
    //hacemos las funciones get de los datos del Director
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