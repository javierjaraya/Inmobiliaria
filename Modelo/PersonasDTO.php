<?php
class PersonasDTO {
    public $run;
    public $nombres;
    public $apellidos;
    public $sexo;
    public $telefono;
    public $fechaNac;
    public $direccion;

    public function PersonasDTO(){
    }

    function getRun() {
        return $this->run;
    }

    function setRun($run) {
        return $this->run = $run;
    }

    function getNombres() {
        return $this->nombres;
    }

    function setNombres($nombres) {
        return $this->nombres = $nombres;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function setApellidos($apellidos) {
        return $this->apellidos = $apellidos;
    }

    function getSexo() {
        return $this->sexo;
    }

    function setSexo($sexo) {
        return $this->sexo = $sexo;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function setTelefono($telefono) {
        return $this->telefono = $telefono;
    }

    function getFechaNac() {
        return $this->fechaNac;
    }

    function setFechaNac($fechaNac) {
        return $this->fechaNac = $fechaNac;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function setDireccion($direccion) {
        return $this->direccion = $direccion;
    }

}