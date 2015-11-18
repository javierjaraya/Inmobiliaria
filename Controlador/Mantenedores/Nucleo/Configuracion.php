<?php

class Configuracion {
    public $user;
    public $password;
    public $host;
    public $bd;
    public $puerto;

    public function __construct() {
        $this->user = "root";
        $this->password = "";
        $this->host = "localhost";
        $this->db = "inmobiliaria";
        $this->puerto = "";
        
        /* WEB
        $this->user = "icibiobi_demo";
        $this->password = "local8080";
        $this->host = "localhost";
        $this->db = "icibiobi_inmobiliaria";*/
    }

    public function getUser() {
        return $this->user;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getHost() {
        return $this->host;
    }

    public function getBd() {
        return $this->bd;
    }

    public function getPuerto() {
        return $this->puerto;
    }
}
?>
