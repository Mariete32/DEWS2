<?php

class Pelicula{

    private $titulo;
    private $anyo;
    private $duracion;
    private $id;

    function __construct($id,$anyo,$duracion,$titulo){
        $this->id=$id;
        $this->anyo=$anyo;
        $this->duracion=$duracion;
        $this->titulo=$titulo;
    }
    //hacemos las funciones get de los datos de la pelicula
    public function get_titulo(){
        return $this->titulo;
    }
    public function get_anyo(){
        return $this->anyo;

    }
    public function get_duracion(){
        return $this->duracion;

    }
    public function get_id(){
        return $this->id;

    }
}

?>