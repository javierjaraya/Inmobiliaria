<?php
class UsuarioDTO {
    public $run;
    public $clave;
    public $idPerfil;

    public function UsuarioDTO(){
    }

    function getRun() {
        return $this->run;
    }

    function setRun($run) {
        return $this->run = $run;
    }

    function getClave() {
        return $this->clave;
    }

    function setClave($clave) {
        return $this->clave = $clave;
    }

    function getIdPerfil() {
        return $this->idPerfil;
    }

    function setIdPerfil($idPerfil) {
        return $this->idPerfil = $idPerfil;
    }

}