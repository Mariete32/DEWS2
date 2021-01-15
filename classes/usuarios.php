<?php

class Usuario{

    private $email;
    private $password;
    private $id;

    function __construct($email,$password){
        $this->email=$email;
        $this->password=$password;
    }
    function set_id($id){
        $this->id=$id;
    }
    //hacemos las funciones get de los datos del usuario
    public function get_email(){
        return $this->email;
    }
    public function get_password(){
        return $this->password;

    }
    public function get_id(){
        return $this->id;

    }
}

?>